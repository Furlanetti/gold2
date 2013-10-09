<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo Configure::read('Admin.name') ?></title>

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
	</head>
	<body class="login-layout">
		<div class="container-fluid" id="main-container">
			<div id="main-content">
				<div class="row-fluid">
					<div class="span12">						
						<?php echo $this->fetch('content'); ?>
					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->

		<!--basic scripts-->

		<?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery-1.9.1.min.js'>"+"<"+"/script>");
		</script>

		<!--page specific plugin scripts-->

		<?php echo $this->Html->script('bootstrap.min'); ?>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
	</body>
</html>
