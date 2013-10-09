<div class="login-container">
	<div class="row-fluid">
		<div class="center">
			<h1 class="white">
				<?php echo $this->Html->image('icon-focus.png', array('alt' => 'Grupo Focusnetworks', 'class' => 'logo')); ?>
				<?php echo Configure::read('Site.name') ?>
			</h1>
		</div>
	</div>

	<div class="space-6"></div>

	<div class="row-fluid">
		<div class="position-relative">
			<div id="login-box" class="visible widget-box no-border">
				<div class="widget-body">
					<div class="widget-main">
						<h4 class="header blue lighter bigger">
							Area Restrita
						</h4>

						<div class="space-6"></div>

						<?php echo $this->Form->create('User', array('class' => 'form-validate'));?>
							<fieldset>
								<label>
									<span class="block input-icon input-icon-right">										
										<?php echo $this->Form->input('username', array('label' => false, 'div' => false, 'class' => 'span12', 'title' => 'Login', 'data-rule-required' => 'true', 'placeholder' => 'Login')); ?>
										<i class="icon-user"></i>
									</span>
								</label>

								<label>
									<span class="block input-icon input-icon-right">										
										<?php echo $this->Form->input('password', array('label' => false, 'div' => false, 'class' => 'span12', 'title' => 'Senha', 'data-rule-required' => 'true', 'placeholder' => 'Senha')); ?>
										<i class="icon-lock"></i>
									</span>
								</label>

								<div class="space"></div>

								<div class="row-fluid">
									<label class="span8">
										<input type="checkbox" name="remember_me" id="remember_me" />
										<span class="lbl">&nbsp; Manter-me conectado</span>										
									</label>								
									<?php
									    echo $this->Form->submit(
									    'Entrar', 
									    array('class' => 'span4 btn btn-small btn-primary', 'title' => 'Entrar', 'div' => false));
								    ?>	
								</div>
								<?php echo $this->Session->flash(); ?>	
							</fieldset>
						<?php echo $this->Form->end();?>

					</div><!--/widget-main-->

					<div class="toolbar clearfix">
						<div>
							<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link white">
								<i class="icon-arrow-left"></i>
								Esqueci Minha Senha
							</a>
						</div>
					</div>
				</div><!--/widget-body-->
			</div><!--/login-box-->

			<div id="forgot-box" class="widget-box no-border">
				<div class="widget-body">
					<div class="widget-main">
						<h4 class="header red lighter bigger">
							Esqueci minha senha
						</h4>

						<div class="space-6"></div>
						<p>
							Você receberá um e-mail com informações para redefinição de senha.
						</p>

						<?php echo $this->Form->create('User', array('class' => 'form-validate', 'action' =>'recover_password' ));?>
							<fieldset>
								<label>
									<span class="block input-icon input-icon-right">										
										<?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'class' => 'span12', 'title' => 'E-mail', 'data-rule-required' => 'true', 'placeholder' => 'E-mail', 'type' => 'email')); ?>
										<i class="icon-envelope"></i>
									</span>
								</label>

								<div class="row-fluid">
									<?php
									    echo $this->Form->submit(
									    'Enviar', 
									    array('class' => 'span5 offset7 btn btn-small btn-danger', 'title' => 'Enviar', 'div' => false));
								    ?>
								</div>
							</fieldset>
						<?php echo $this->Form->end();?>
					</div><!--/widget-main-->

					<div class="toolbar center">
						<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link white">
							Voltar ao Login
							<i class="icon-arrow-right"></i>
						</a>
					</div>
				</div><!--/widget-body-->
			</div><!--/forgot-box-->	
		</div><!--/position-relative-->
	</div>
</div>