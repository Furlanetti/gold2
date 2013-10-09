<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo 'Admin - ' . Configure::read('Site.name'); ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('font-awesome.min');
		?>

		<!--[if IE 7]>
			<?php echo $this->Html->css('font-awesome-ie7.min'); ?>
		<![endif]-->

		<!--page specific plugin styles-->

		<?php
		echo $this->Html->css('jquery-ui-1.10.3.custom.min');
		echo $this->Html->css('chosen');
		echo $this->Html->css('datepicker');
		echo $this->Html->css('bootstrap-timepicker');
		echo $this->Html->css('daterangepicker');
		echo $this->Html->css('colorpicker');
		?>

		<!--fonts-->

		<?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400,300'); ?>

		<?php
		echo $this->Html->css('ace.min');
		echo $this->Html->css('ace-responsive.min');
		echo $this->Html->css('ace-skins.min');
		?>

		<!--ace styles-->

		<!--[if lte IE 8]>
			<?php echo $this->Html->css('ace-ie.min'); ?>
		<![endif]-->

		<?php echo $this->Html->css('style'); ?>

		<?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<?php echo $this->Html->image('icon-focus.png', array('alt' => 'Grupo Focusnetworks')); ?>
							<?php echo Configure::read('Site.name') ?>
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="grey"></li>
						<li class="purple"></li>
						<li class="green"></li>
						<li class="light-grey user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<!--<img class="nav-user-photo" src="avatars/user.jpg" alt="Jason's Photo" />-->
								<span id="user_info">
									<small>Bem Vindo,</small>
									<?php echo AuthComponent::user('name'); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<li>									
									<?php echo $this->Html->link("<i class='icon-off'></i>".'Sair', '../users/logout', array('escape' => false)); ?>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="container-fluid" id="main-container">
			<a id="menu-toggler" href="#">
				<span></span>
			</a>

			<div id="sidebar">
				<ul class="nav nav-list">
					<li <?php if(strpos($this->here, 'user') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Usuários</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<?php if($isAuthorized){ ?>
							<li <?php if(strpos($this->here, 'users/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/users/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>	
							<?php } ?>
							<li <?php if(strpos($this->here, 'users/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/users/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'categoryPointsSale') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-certificate"></i>
							<span>Categorias de Ponto de Venda</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'categoryPointsSale/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/categoryPointsSale/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'categoryPointsSale/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/categoryPointsSale/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'recipe') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-laptop"></i>
							<span>Pontos de Venda</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'recipes/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/recipes/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'recipes/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/recipes/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>				
					<li <?php if(strpos($this->here, 'team') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Categoria de Receita</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'categoryRecipe/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'teams/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'recipe') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Receita</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'recipes/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/recipes/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'recipes/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/recipes/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'team') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Gold Club</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'team/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'teams/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'team') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Contatos</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'team/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'teams/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'team') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Livro de Receitas</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'team/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'teams/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
					<li <?php if(strpos($this->here, 'team') == true) echo 'class="active"' ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Indicação Café Premium</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li <?php if(strpos($this->here, 'team/new') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/new/' ?>">
									<i class="icon-double-angle-right"></i>
									Adicionar
								</a>
							</li>
							<li <?php if(strpos($this->here, 'teams/index') == true) echo 'class="active"' ?>>
								<a href="<?php echo $this->webroot . 'admin/team/index/' ?>">
									<i class="icon-double-angle-right"></i>
									Gerenciar
								</a>
							</li>							
						</ul>
					</li>
				</ul><!--/.nav-list-->

				<div id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div id="main-content" class="clearfix">
				<div id="breadcrumbs">
					<ul class="breadcrumb">
						<?php 
						if(empty($breadcrumb)) $breadcrumb = array();
						foreach ($breadcrumb as $key => $value) {								
							if($key + 1 == count($breadcrumb)){
								?>
								<li class="active"><?php echo $value['name'] ?></li>
								<?php
							} else {
								?>
								<li>
									<a href="<?php echo $this->webroot . 'admin/' . $value['url'] ?>"><?php echo $value['name'] ?></a>
									<span class="divider"><i class="icon-angle-right"></i></span>
								</li>
								<?php									
							}
						}
						?>
					</ul><!--.breadcrumb-->

					<div id="nav-search">
						<!--<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small search-query" id="nav-search-input" autocomplete="off" />
								<i class="icon-search" id="nav-search-icon"></i>
							</span>
						</form>-->
					</div><!--#nav-search-->
				</div>

				<div id="page-content" class="clearfix">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>

				</div><!--/#page-content-->				
			</div><!--/#main-content-->
		</div><!--/.fluid-container#main-container-->

		<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>	<!--basic scripts-->

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="/js/"></script>
		<![endif]-->

		<?php
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery-ui-1.10.3.custom.min');
		echo $this->Html->script('jquery.ui.touch-punch.min');

		echo $this->Html->script('chosen.jquery.min');
		echo $this->Html->script('fuelux/fuelux.spinner.min');
		echo $this->Html->script('date-time/moment.min');
		echo $this->Html->script('date-time/bootstrap-datepicker.min');
		echo $this->Html->script('date-time/bootstrap-timepicker.min');
		echo $this->Html->script('date-time/daterangepicker.min');
		echo $this->Html->script('jquery.knob.min');
		echo $this->Html->script('jquery.autosize-min');
		echo $this->Html->script('jquery.inputlimiter.1.3.1.min');
		echo $this->Html->script('jquery.maskedinput.min');

		echo $this->Html->script('jquery.slimscroll.min');
		echo $this->Html->script('jquery.easy-pie-chart.min');
		echo $this->Html->script('jquery.sparkline.min.js');
		echo $this->Html->script('flot/jquery.flot.min');
		echo $this->Html->script('flot/jquery.flot.pie.min');
		echo $this->Html->script('flot/jquery.flot.resize.min');
		echo $this->Html->script('jquery.dataTables.min');
		echo $this->Html->script('jquery.dataTables.bootstrap');
		?>

		<!--ace scripts-->

		<?php
		echo $this->Html->script('ace-elements.min');
		echo $this->Html->script('ace.min');
		echo $this->Html->script('script');
		?>
	</body>
</html>
