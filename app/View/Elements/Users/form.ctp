<div class="row-fluid">

	<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
	<?php echo $this->Form->hidden("User.id"); ?>

	<div class="span5">
		<div class="control-group">
			<label for="UserName">Nome</label>
			<?php echo $this->Form->input('User.name', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Nome', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label for="UserName">E-mail</label>
			<?php echo $this->Form->input('User.email', array('label' => false, 'title' => 'E-mail', 'data-rule-required' => 'true', 'placeholder' => 'E-mail', 'type' => 'email', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label>Status</label>
			<?php echo $this->Form->checkbox('User.status', array('class' => 'ace-switch'));?>
			<span class="lbl"></span>
		</div>
	</div>

	<div class="span5">
		<div class="control-group">
			<label for="UserName">Login</label>
			<?php echo $this->Form->input('User.username', array('label' => false, 'title' => 'Login', 'data-rule-required' => 'true', 'placeholder' => 'Login', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label for="UserName">Senha</label>
			<?php echo $this->Form->input('User.password', array('label' => false, 'title' => 'Senha', 'data-rule-required' => 'true', 'placeholder' => 'Senha', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">
			<label for="UserName">Confirmar de Senha</label>
			<?php echo $this->Form->input('User.password_confirm', array('label' => false, 'title' => 'Confirmação de Senha', 'placeholder' => 'Confirmação de Senha', 'type' => 'password', 'style' => 'width: 95%')); ?>
		</div>

		<div class="control-group">			
			<?php echo $this->Form->hidden('User.role', array('label' => false, 'title' => 'Role', 'data-rule-required' => 'true', 'value' => 'user')); ?>
		</div>
	</div>

	<div style="clear: both;"></div>

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
