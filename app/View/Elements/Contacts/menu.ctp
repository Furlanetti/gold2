<section class="menu-contatos">

	<nav class="<?php echo $page ?>">	
		<ul class="first-menu">
			<li class="business-li <?php echo ($page == 'business' ? 'active' : '') ?>"><?php echo $this->Html->link('', array('controller' => 'contacts', 'action' => 'business'), array('title' => 'Fale sobre o seu negócio')); ?></li>
			<li class="questions-li <?php echo ($page == 'questions' ? 'active' : '') ?>"><?php echo $this->Html->link('', array('controller' => 'contacts', 'action' => 'questions'), array('title' => 'Alguma pergunta?')); ?></li>
			<li class="hi-li <?php echo ($page == 'hi' ? 'active' : '') ?>"><?php echo $this->Html->link('', array('controller' => 'contacts', 'action' => 'hi'), array('title' => 'Diga um Oi')); ?></li>
		</ul>
	</nav>
	<nav>
		<ul class="second-menu">
			<li>
				<a href="<?php echo Configure::read('Site.e-service'); ?>" target="_blank" title="Suporte ao cliente">Suporte ao cliente <span>E-Service</span></a>
			</li>
			<li>
				<a href="<?php echo Configure::read('Site.linked-in'); ?>" target="_blank" title="Carreira">Junte-se a nós <span>Carreira</span></a>
			</li>
		</ul>
	</nav>

</section>