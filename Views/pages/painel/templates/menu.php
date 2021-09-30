		</div><!--content-->
		<div class="clear"></div><!--clear-->

		<div class="menu">
			<div class="avatar">	
				<div class="img">
					<i class="fas fa-user"></i>
				</div><!--img-->
				<div class="info">
					<h2><?php echo $_SESSION['nome']; ?></h2>
				</div><!--info-->
			</div><!--avatar-->
			<div class="list">
				
				<?php  

					$page = (isset($par[0]) && $par[0] != '' ) ? $par[0] : 'home';
					$select = function($path) use ($page){
						if($page == $path)
							echo 'select';
					};
				?>

				<h3  aberto="false" ref="painel"><span>Painel de Controle</span> <span class="arrow">></span></h3>
				<div class="wraper-list" ref="painel">
					<ul>
						<a href="<?php echo INCLUDE_PATH_PAINEL; ?>home">
							<li class="<?php $select('home'); ?>" titulo="painel">
								<i class="fas fa-home"></i> Home
							</li>
						</a>
					</ul>
				</div><!--wraper-list-->

				
				<h3 aberto="false" ref="paginas"><span>Páginas</span> <span class="arrow">></span></h3>
				<div class="wraper-list" ref="paginas">
					<ul>
						<a href="<?php echo INCLUDE_PATH_PAINEL; ?>pagina-home">
							<li class="<?php $select('pagina-home'); ?>" titulo="paginas">
								<i class="fas fa-home"></i> Home
							</li>
						</a>
						<a href="<?php echo INCLUDE_PATH_PAINEL; ?>pagina-projeto">
							<li class="<?php $select('pagina-projeto'); ?>" titulo="paginas">
								<i class="fas fa-code"></i> Projeto
							</li>
						</a>
					</ul>
				</div><!--wraper-list-->
			</div><!--list-->
		</div><!--menu-->

		<!-- Scripts -->
		<script src="<?php echo INCLUDE_PATH_FULL; ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH_FULL; ?>pages/painel/js/functions.js"></script>
		<script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
		<!--  -->
	</body>
</html>