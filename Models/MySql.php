<?php
	
	namespace Models;

	class MySql{
		
		private static $pdo;
		
		public static function conect(){
			if(self::$pdo == null){
				try{
					self::$pdo = new \PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
					echo '<h2>Erro ao conectar</h2>';
				}
			}
			return self::$pdo;
		}

		public static function selectAll($table,$query='',$arr=[]){
			$sql = self::conect()->prepare("SELECT * FROM `$table` $query");
			$sql->execute($arr);

			$list = $sql->fetchAll();

			return $list;
		}

		public static function select($table,$query='',$arr=[]){
			$sql = self::conect()->prepare("SELECT * FROM `$table` $query");
			$sql->execute($arr);

			$list = $sql->fetch();
			
			return $list;
		}

		public static function update($table,$arr,$where='',$arr2=[]){
			$query = "UPDATE `$table` SET ";
			$el = [];

			foreach ($arr as $key => $value) {
				static $first = true;

				if ($first) {
					$query.=$key.' = ?';
					$first = false;
				}else{
					$query.=' , '.$key.' = ?';
				}

				$el[] = $value; 
			}

			foreach ($arr2 as $key => $value) {
				$el[] = $value; 
			}
			
			$sql = self::conect()->prepare("$query $where");
			if($sql->execute($el))
				return true;
			else
				return false;
		}

		public static function insert($table,$arr){
			$query = "INSERT INTO `$table` VALUES (null";

			foreach ($arr as $key => $value) {
				$query.=',?';
			}

			$sql = self::conect()->prepare("$query)");
			if($sql->execute($arr))
				return true;
			else
				return false;
		}

		public static function delete($table,$where=''){
			if(self::conect()->exec("DELETE * FROM `$table` $where"))
				return true;
			else
				return false;
		}
	}

?>
