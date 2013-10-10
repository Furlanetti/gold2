<div class="row-fluid">

	<?php echo $this->Form->create('CategoryPointSale', array('class' => 'form-horizontal', 'type' => 'file'));?>
	<?php echo $this->Form->hidden("CategoryPointSale.id"); ?>

	<div class="span5">
			<div class="control-group">
				<label for="CategoryPointSaleTitle">Nome da Categoria</label>
				<?php echo $this->Form->input('CategoryPointSale.title', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Nome', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
			<label>Status</label>
			<?php echo $this->Form->checkbox('CategoryPointSale.status', array('class' => 'ace-switch'));?>
			<span class="lbl"></span>
		</div>
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
