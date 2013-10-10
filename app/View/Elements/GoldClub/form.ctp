<div class="row-fluid">

	<?php echo $this->Form->create('GoldClub', array('class' => 'form-horizontal', 'type' => 'file'));?>
	<?php echo $this->Form->hidden("GoldClub.id"); ?>

	<div class="span5">
			<div class="control-group">
				<label for="GoldClub">Nome</label>
				<?php echo $this->Form->input('GoldClub.name', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Nome', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<label for="GoldClub">Email</label>
				<?php echo $this->Form->input('GoldClub.email', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Email', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<?php echo $this->Form->input('GoldClub.sex', 
					array( 'type'=>'select', 
					'options' => array('M'=>'Masculino','F'=>'Feminino'), 
					'label' =>'Selecione o sexo' 
				) );
				?>

				<?php //echo $this->Form->input('GoldClub.sex', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Sex', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<?php //echo $this->Form->input('GoldClub.content', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Conteúdo', 'style' => 'width: 95%;')); ?>

				<?php echo $this->Form->input('GoldClub.content', 
					array( 'type'=>'select', 
					'options' => array('D'=>'Diabetes','P'=>'Perca de Peso', 'V'=>'Vida Saudável'), 
					'label' =>'Selecione o conteúdo' 
				) );
				?>
			</div>

			<div class="control-group">
				<label for="GoldClub">Data de Nascimento</label>
				<?php echo $this->Form->input('GoldClub.nasc_date', 
					array('label' => false, 'title' => 'Nome',
						'data-rule-required' => 'true',
						'placeholder' => '__/__/____',
						'style' => 'width: 95%;',
						'type' => 'text')); ?>
			</div>

			<div class="control-group">
				<?php //echo $this->Form->input('GoldClub.receive_inf', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Receber Informações?', 'style' => 'width: 95%;')); ?>

				<?php echo $this->Form->input('GoldClub.receive_inf', 
					array( 'type'=>'select', 
					'options' => array('S'=>'Sim','N'=>'Não'), 
					'label' =>'Deseja receber informações?' 
				) );
				?>
			</div>

			<div class="control-group">
				<label for="GoldClub">IP</label>
				<?php echo $this->Form->input('GoldClub.ip', array('label' => false, 'title' => 'ip', 'data-rule-required' => 'true', 'placeholder' => 'IP', 'style' => 'width: 95%;')); ?>
			</div>

			<div class="control-group">
				<label for="GoldClub">Data de Cadastro</label>
				<?php echo $this->Form->input('GoldClub.datetime', array('label' => false, 'title' => 'Nome', 'data-rule-required' => 'true', 'placeholder' => 'Data de Cadastro', 'style' => 'width: 95%;')); ?>
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
