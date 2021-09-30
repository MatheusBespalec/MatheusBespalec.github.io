<?php 

	namespace Models;

	class Online{

		private static function get_client_ip(){
		    $ipaddress = '';
		    if (isset($_SERVER['HTTP_CLIENT_IP']))
		        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED'];
		    else if(isset($_SERVER['REMOTE_ADDR']))
		        $ipaddress = $_SERVER['REMOTE_ADDR'];
		    else
		        $ipaddress = 'UNKNOWN';
		    return $ipaddress;
		    //Author: https://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
		}

		private static function updateUser(){
			\Models\MySql::update('tb_admin.visitas',['ultima_acao'=>date('Y-m-d H:i:s')],"WHERE token = ?",[$_SESSION['token']]);
		}

		private static function insertUser(){
			$ip = self::get_client_ip();
			$data = date('Y-m-d H:i:s');
			$token = $_SESSION['token'] = uniqid();
			
			\Models\MySql::insert('tb_admin.visitas',[$ip,$data,$token]);
		}

		public static function newLog(){
			if (isset($_SESSION['token'])) {
				//Update data
				self::updateUser();
			}else{
				//Inserir Usuário
				self::insertUser();
			}
		} 

	}

?>