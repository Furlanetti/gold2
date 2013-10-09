<?php
		echo $this->Html->script('jquery.customSelect.min.js');
		echo $this->Html->css('ace.min');		
		echo $this->Html->css('ace-skins.min');
		echo $this->Html->css('font-awesome.min');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#ContactBusinessInit").customSelect();
	});
</script>

<section class="content business-content">

		<section class="wrap">

			<section class="left">
				
				<?php // echo $this->element('Contacts/menu'); ?>
				<div class="recuar">
				<?php echo $this->element('Contacts/menu'); ?>
				</div>

			</section>

			<section class="center contatos">

				<h2><?php echo $title; ?></h2>

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->Form->create('ContactBusiness', array('type' => 'file')); ?>

					<div class="controls controls_fix">
						<div class="controls-row span4">
							<?php echo $this->Form->label('name', 'Nome*', array('class' => 'upper')); ?>
							<?php echo $this->Form->text('name', array('class' => 'span4 input_text1', 'required' => true)); ?>
						</div>

						<div class="controls-row span4">
							<?php echo $this->Form->label('email', 'E-mail*', array('class' => 'upper')); ?>
							<?php echo $this->Form->email('email', array('class' => 'span4 input_text1', 'required' => true)); ?>
						</div>
					</div>

					<div class="controls controls_fix">
						<div class="controls-row span4">
							<?php echo $this->Form->label('company', 'Empresa*', array('class' => 'upper')); ?>
							<?php echo $this->Form->text('company', array('class' => 'span4 input_text1', 'required' => true)); ?>
						</div>

						<div class="controls-row span4">
							<?php echo $this->Form->label('phone', 'Telefone*', array('class' => 'upper')); ?>
							<?php echo $this->Form->tel('phone', array('class' => 'span4 input_text1', 'required' => true)); ?>
						</div>
					</div>
					
					<div class="clearfix"></div>
					
					<br/>

					<div class="span3 controls_fix2">
						<h3 class="upper">Informações sobre o projeto</h3>

						<div class="controls">
							<?php echo $this->Form->label('init', 'Quando você quer iniciar o projeto?', array('class' => 'upper')); ?>
							<?php $options = Configure::read('Contact.init'); ?>
							<?php echo $this->Form->select('init', $options, array('class' => 'span3', 'empty' => 'Selecione...')); ?>
						</div>

						<div class="clearfix"></div>
						<br/>

						<a href="javascript:void(0);" class="why">Porque nós precisamos saber o seu orçamento?</a>

						<label class="upper">Budget</label>		
					</div>
					
					<div class="span5">
						<p class="text box1"></p>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="controls currency-div">
						<ul class="currency active-left">
							<li><a class="real active" href="javascript:void(0);" title="Reais" data-value="R$"></a></li>
							<li><a class="dollar" href="javascript:void(0);" title="Dólar Americano" data-value="U$"></a></li>	
						</ul>
						<?php echo $this->Form->hidden('currency'); ?>
					</div>

					<div class="controls budget-fix-position">
						<ul class="budget">
							<span class="title upper">Selecione</span>
							<li><a href="javascript:void(0);" title="até 20.000"></a></li>
							<li><a href="javascript:void(0);" title="até 50.000"></a></li>
							<li><a href="javascript:void(0);" title="até 100.000"></a></li>
							<li><a href="javascript:void(0);" title="ainda não sei"></a></li>
						</ul>
						<?php echo $this->Form->hidden('budget'); ?>
					</div>

					<h3 class="upper">Descrição do Projeto</h3>

					<div class="controls">
						<?php echo $this->Form->label('description', 'Descreva em poucas palavras as características mais importantes do projeto *', array('class' => 'upper')); ?>
						<?php echo $this->Form->textarea('description', array('class' => 'text_field', 'required' => true)); ?>
					</div>

					<h3 class="upper">Adicionar Arquivo</h3>
					
					<!--[if IE 8]><h4 class="upper text-file-fix">Você pode anexar um arquivo<br />(DOC, PDF, ODT, JPG, PNG, BMP, GIF, ZIP, RAR) até 2MB cada</h4><![endif]-->
					
					<![if !(IE 8)]><h4 class="upper text-file-fix">Você pode anexar no máximo 3 arquivos<br />(DOC, PDF, ODT, JPG, PNG, BMP, GIF, ZIP, RAR) até 2MB cada</h4><![endif]>

					<div class="controls div-file-fix">						
						<?php echo $this->Form->file('ContactBusinessFiles.file', array('class' => 'span5', 'name' => 'data[ContactBusinessFiles][][file]', 'id' => 'file_upload', 'multiple' => 'multiple')); ?>				
					</div>

					<?php echo $this->Form->submit('Enviar', array('class' => 'submit upper')); ?>

				<?php echo $this->Form->end(); ?>
		</section>
	</section>

</section>

<div class="clearfix"></div>

<script type="text/javascript">

	$(function(){
		$('.currency').customCheck({'default': 0, 'from': 'data'});
		$('.budget').customCheck({'default': 3, 'from': 'title'});

		$('.real').click(function() {
			$('.currency').addClass('active-left');
			$('.currency').removeClass('active-right');
		});

		$('.dollar').click(function() {
			$('.currency').addClass('active-right');
			$('.currency').removeClass('active-left');
		});

		$('.budget li').click(function() {
			$('.budget li').removeClass('budget-active');
			$(this).addClass('budget-active');
		});

		$('#file_upload').ace_file_input({
				style:'well',
				btn_choose:'Solte os arquivos aqui ou clique para escolher',
				btn_change:'Selecionar mais arquivos...',
				no_icon:'icon-cloud-upload',
				droppable:true,
				thumbnail:'small',
				before_change:function(files, dropped) {

					var limit = 3;

					if (files.length > limit){
						alert('Erro! É permitido upload de até ' + limit +' arquivos');
						return false;
					}
					else{
						return true;
					}				

								}
			}).on('change', function(){
		});

		$('.why').click(function(event){
			event.preventDefault();
			$('.box1').toggleClass('bg');
		});

	});

</script>