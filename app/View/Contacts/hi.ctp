<style type="text/css">



input[type="submit"].submit {
		background: url("../img/bg_btn.png") no-repeat scroll center center transparent;
		color: #535353;
		display: block;
		font-family: 'Trade Bold';
		font-size: 14.5px;
		height: 50px;
		letter-spacing: -1px;
		padding: 24px 22px 48px 38px;
		text-align: center;
		text-transform: uppercase;
		width: 120px;
		border: 0px;
		float: right;
	}
	

input[type="text"].input_field, input[type="email"].input_field {
	background: #e9e9e9;
	border: 1px solid #cccccc;	
}

input[type="text"].name_field{
	width: 350px;
}

input[type="email"].email_field{
	width: 220px;
}

div.submit{
	margin-right: 62px;
	padding-top: 330px;
}

.form-diga-um-oi label{
	font-family: 'Trade Bold';
	font-size: 15px;	
	text-transform: uppercase;
	color: #818181;
}


.control-email{
	padding-left: 65px;
}

.form-diga-um-oi{
	width: 705px;
}

.text_field {
	background: #e9e9e9;
	border: 1px solid #cccccc;
	height: 205px;
}


section.diga-um-oi{
	background: url('../img/bg_cases.jpg') center 0 no-repeat;
	width: 100%;		
	margin-top: -120px;
	padding-top: 120px;
}


section.diga-um-oi > .wrap{	
	width: 980px;
	margin: 0 auto;
	min-height: 500px;
}

section.diga-um-oi > .wrap > .left {
		float: left;
		width: 30%;		
	}
section.diga-um-oi > .wrap > .right {
	width: 68%;
	float: right;
	padding-top: 45px;
}

section.diga-um-oi > .wrap > .right h2 {
	letter-spacing: -3px;
	font-family: 'Dillenia';
	font-weight: normal;
	font-size: 60px;
	text-transform: uppercase;
	color: black;
	margin: -10px 0 20px 20px;
}


.recuar {
	margin-left: -50px;
}


</style>

<section class="content diga-um-oi">

	<section class="wrap">

		<section class="left">
			<div class="recuar">
				<?php echo $this->element('Contacts/menu'); ?>		
			</div>
		</section>

		<section class="right">

			<h2><?php echo $title; ?></h2>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->Form->create('ContactHi', array('class' => 'form-diga-um-oi')); ?>

				<div class="controls">
					<div class="controls-row span4">
						<?php echo $this->Form->label('name', 'Nome*'); ?>
						<?php echo $this->Form->text('name', array('class' => 'span4 input_field name_field', 'required' => true, 'div' => false)); ?>
					</div>

					<div class="controls-row span4 control-email">
						<?php echo $this->Form->label('email', 'E-mail*'); ?>
						<?php echo $this->Form->email('email', array('class' => 'span4 input_field email_field', 'required' => true, 'div' => false)); ?>
					</div>
				</div>

				<div class="controls span8">
					<?php echo $this->Form->label('description', 'Mensagem*'); ?>
					<?php echo $this->Form->textarea('description', array('class' => 'span8 text_field', 'required' => true, 'div' => false)); ?>
				</div>

				<?php echo $this->Form->submit('Enviar', array('class' => 'submit')); ?>

			<?php echo $this->Form->end(); ?>

		</section>

	</section>

</section>