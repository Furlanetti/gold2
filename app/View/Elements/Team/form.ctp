<div class="row-fluid">

	<?php echo $this->Form->create('Team', array('class' => 'form-horizontal', 'type' => 'file'));?>
	<?php echo $this->Form->hidden("Team.id"); ?>

	<div class="span5">
		<h4>Dados Pessoais*</h4>
			<div class="control-group">
				<label for="TeamName">Nome</label>
				<?php echo $this->Form->input('Team.name', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Nome', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<label for="TeamCompany">Empresa</label>
				<?php echo $this->Form->input('Team.company_id', array('label' => false, 'title' => 'Empresa', 'data-rule-required' => 'true', 'options' => $companies, 'type' => 'select', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<label for="TeamPosition">Função</label>
				<?php echo $this->Form->input('Team.position', array('label' => false, 'title' => 'Função', 'data-rule-required' => 'true', 'placeholder' => 'Função', 'style' => 'width: 95%;')); ?>
			</div>

			<h4>Descricao</h4>
			<div class="control-group">
				<?php echo $this->Form->input('Team.description', array('label' => false, 'title' => 'Descrição', 'data-rule-required' => 'true', 'placeholder' => 'Descrição', 'type' => 'textarea', 'style' => 'width:95%; height: 200px')); ?>
			</div>

	</div>

	<div class="span5">
		<h4>Redes Sociais</h4>
			<div class="control-group">
				<label for="TeamFacebook" >Facebook</label>
				<?php echo $this->Form->input('protocol', array('label' => false, 'value' => 'http://', 'readonly' => 'readonly', 'style' => 'width:40px; float: left; margin-right: 10px;')); ?>
				<?php echo $this->Form->input('Team.facebook', array('label' => false, 'title' => 'Facebook', 'data-rule-required' => 'true', 'placeholder' => 'Facebook', 'style' => 'width: 82%;')); ?>
			</div>

			<div class="control-group">
				<label for="TeamTwitter" >Twitter</label>
				<?php echo $this->Form->input('protocol', array('label' => false, 'value' => 'http://', 'readonly' => 'readonly', 'style' => 'width:40px; float: left; margin-right: 10px;')); ?>
				<?php echo $this->Form->input('Team.twitter', array('label' => false, 'title' => 'Twitter', 'data-rule-required' => 'true', 'placeholder' => 'Twitter', 'style' => 'width: 82%;')); ?>
			</div>

			<div class="control-group">
				<label for="TeamInstagram" >Instagram</label>
				<?php echo $this->Form->input('protocol', array('label' => false, 'value' => 'http://', 'readonly' => 'readonly', 'style' => 'width:40px; float: left; margin-right: 10px;')); ?>
				<?php echo $this->Form->input('Team.instagram', array('label' => false, 'title' => 'Instagram', 'data-rule-required' => 'true', 'placeholder' => 'Instagram', 'style' => 'width: 82%;')); ?>
			</div>

			<div class="control-group">
				<label for="TeamInstagram" >Linkedin</label>
				<?php echo $this->Form->input('protocol', array('label' => false, 'value' => 'http://', 'readonly' => 'readonly', 'style' => 'width:40px; float: left; margin-right: 10px;')); ?>
				<?php echo $this->Form->input('Team.linkedin', array('label' => false, 'title' => 'Linkedin', 'data-rule-required' => 'true', 'placeholder' => 'Linkedin', 'style' => 'width: 82%;')); ?>
			</div>

			<h4>Fotos*</h4>
			<div class="control-group">
				<?php echo $this->Form->file('TeamImage.image', array('label' => false, 'title' => 'Imagem', 'data-rule-required' => 'true', 'placeholder' => 'Imagem', 'multiple' => 'multiple', 'name' => 'data[TeamImage][][image]')); ?>			
			</div>

	</div>

	<div class="span12">
		<?php if(isset($team)) : ?>	
			<h4>Fotos inseridas</h4>
					<ul class="ace-thumbnails">
					
						<?php foreach($team['TeamImage'] as $i => $image) : ?>
							<li>
								<div>
									<?php echo $this->Html->image('../files/'.$image['image'], array('width' => 150, 'height' => 150, 'class' => 'team_gallery_thumb')) ?>
									<?php echo $this->Form->hidden('TeamImage.'.$i.'.id'); ?>
									<div class="text">
										<div class="inner">
											<!--<a href="#" data-rel="colorbox" class="cboxElement"><i class="icon-zoom-in"></i></a>-->
											<?php echo $this->Html->link('<i class="icon-remove red"></i>', '/admin/team/delete_image/' . $image['id'], array('escape' => false), 'Tem certeza disso?'); ?>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
					
					</ul>
		<?php endif ?>	
	</div>

	<div class="span12">
			<div class="form-actions">			
				<?php
				    echo $this->Form->button(
				    "<i class='icon-ok bigger-110'></i>".'Salvar', 
				    array('type' => 'submit', 'class' => 'btn btn-info', 'div' => false, 'escape' => false));
			    ?>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset" id="reset">
					<i class="icon-undo bigger-110"></i>
					Reset
				</button>			
			</div>

	</div>
	<?php echo $this->Form->end();?>

</div>
