<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	$usersDay = \Models\MySql::selectAll('tb_admin.visitas',"WHERE ultima_acao > ?",
		[date('Y-m-d H:i:s',strtotime('-1 day'))]);
	$usersMonth = \Models\MySql::selectAll('tb_admin.visitas',"WHERE ultima_acao > ?",
		[date('Y-m-d H:i:s',strtotime('-30 days'))]);

?>
<section class="painel-visitas wraper-boxes">

	<div class="box w30" style="background: #ff4242;">
		<h3>Visitas Hoje<h3>
		<p><?php echo count($usersDay); ?></p>
	</div>

	<div class="box w30" style="background: #ffa142;">
		<h3>Visitas Este Mês<h3>
		<p><?php echo count($usersMonth); ?></p>
	</div>

	<div class="box w30" style="background: #42ff78;">
		<h3>Média de Visitas(Semanal)<h3>
		<p><?php echo ceil(count($usersMonth)/30); ?></p>
	</div>

</section><!--painel-visitas-->

