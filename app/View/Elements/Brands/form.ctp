<div class="row-fluid">

	<?php echo $this->Form->create('Brand', array('class' => 'form-horizontal', 'type' => 'file'));?>
	<?php echo $this->Form->hidden("Brand.id"); ?>

		<div class="control-group">
			<label for="BrandName" class="control-label">Título</label>
			<?php echo $this->Form->input('Brand.title', array('label' => false, 'div' => array('class' => 'controls'), 'title' => 'Título', 'data-rule-required' => 'true', 'placeholder' => 'Título')); ?>
		</div>

		<div class="control-group">
			<label for="BrandImage" class="control-label">Imagem</label>
			<div class="controls" style="width: 300px">
				<?php echo $this->Form->file('Brand.image', array('label' => false, 'div' => array('class' => 'controls'), 'title' => 'Imagem', 'data-rule-required' => 'true', 'placeholder' => 'Imagem', 'class' => 'input_file_line')); ?>
				<?php if(!empty($brand['image'])) { ?>
					<?php echo $this->Html->link('Visualizar', '/files/' . $brand['image'], array('target' => '_blank')); ?> | 
					<?php echo $this->Html->link('Excluir', '/admin/brands/delete_image/' . $brand['id'], null, 'Tem certeza disso?'); ?>
				<?php } ?>
			</div>

			<script>
				// $(function(){
				// 	$("input[type=file]").ace_file_input({
				// 	   no_file:'Selecione uma imagem ...',
				// 	   btn_choose:'Selecione',
				// 	   btn_change:'Alterar'
				// 	}).on('change', function(){
				// 		var files = $(this).data('ace_input_files');
				// 		//upload files, etc ...
				// 	});				
				// })
			</script>
		</div>

		<div class="control-group">
			<div class="controls">
				<label>
					<?php echo $this->Form->checkbox('Brand.featured', array('hiddenField' => false)); ;?>
					<span class="lbl">&nbsp; Exibir na página de Cases?</span>
				</label>
			</div>
		</div>

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


	<?php echo $this->Form->end();?>

</div>
