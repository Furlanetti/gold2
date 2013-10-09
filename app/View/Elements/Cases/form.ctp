<div class="row-fluid">

	<?php echo $this->Form->create('Cases', array('class' => 'form-horizontal', 'type' => 'file'));?>
	<?php echo $this->Form->hidden("Cases.id"); ?>

	<div class="span5">
		<div class="control-group">
			<label for="CasesTitle">Título</label>
			<?php echo $this->Form->input('Cases.title', array('label' => false, 'title' => 'Título', 'data-rule-required' => 'true', 'placeholder' => 'Título', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label for="CasesImage">Imagem</label>
			<?php echo $this->Form->file('Cases.image', array('label' => false, 'title' => 'Imagem', 'data-rule-required' => 'true', 'placeholder' => 'Imagem', 'class' => 'input_file_line')); ?>
			<?php if(!empty($case['image'])) { ?>
				<?php echo $this->Html->link('Visualizar', '/files/' . $case['image'], array('target' => '_blank')); ?> | 
				<?php echo $this->Html->link('Excluir', '/admin/cases/delete_image/' . $case['id'], null, 'Tem certeza disso?'); ?>
			<?php } ?>
		</div>

		<div class="control-group">
				<label for="CasesVideo">Vídeo <span class="green">(sem http://)</span></label>
				<?php echo $this->Form->input('protocol', array('label' => false, 'value' => 'http://', 'readonly' => 'readonly', 'style' => 'width:40px; float: left; margin-right: 10px;')); ?>
				<?php echo $this->Form->input('Cases.video', array('label' => false, 'title' => 'Vídeo', 'data-rule-required' => 'true', 'style' => 'width: 82%')); ?>
				<br>
				<h6 class="orange"><i class="icon-info-sign"></i> Modelos:</h6>
				<p class="muted">Youtube: <strong>youtu.be/xxxxxxxxxxx</strong></p>
				<p class="muted">Vímeo: <strong>vimeo.com/xxxxxxxx</strong></p>
		</div>
	</div>

	<div class="span6">
		<div class="control-group">
			<label for="CasesBrand">Marca</label>
			<?php echo $this->Form->input('Cases.brand_id', array('label' => false, 'title' => 'Marca', 'data-rule-required' => 'true', 'placeholder' => 'Marca', 'default' => 'Selecione...', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label for="CasesDescription">Descrição</label>			
			<?php echo $this->Form->input('Cases.description', array('label' => false, 'title' => 'Descrição', 'data-rule-required' => 'true', 'placeholder' => 'Descrição', 'style' => 'width:95%; height: 200px')); ?>
		</div>
	</div>

	<div class="span11">
		<?php foreach ($companies as $key => $company) { ?>
		<?php if($this->action == "admin_edit" && !empty($company['CaseExpertise'])) { $expertise = $company['CaseExpertise']; }?>
			<?php $company = $company['Company']; ?>
			<div class="span6">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="smaller">
							<?php echo $company['name']; ?>
						</h4>
					</div>
					<div class="widget-body">
						<div class="widget-main">		
						<?php if($this->action == "admin_edit" && !empty($expertise)) { ?>
							<?php echo $this->Form->hidden("CaseExpertise.{$key}.id", array('value' => $expertise['id'])); ?>
						<?php } else {?>
							<?php echo $this->Form->hidden("CaseExpertise.{$key}.company_id", array('value' => $company['id'])); ?>
						<?php } ?>
						<?php echo $this->Form->textarea("CaseExpertise.{$key}.description", array('label' => false, 'title' => 'Expertises', 'data-rule-required' => 'true', 'placeholder' => 'Expertises', 'style' => 'width:95%; height: 200px')); ?>
						</div>
					</div>
				</div>
			</div><!--/span-->				
		<?php } ?>
	</div><!--/span-->


	<div class="span11">
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
