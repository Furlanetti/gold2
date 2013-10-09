<?php $data = $vars['data']; ?>
<?php $files = $vars['files']; ?>
<?php $init = Configure::read('Contact.init'); ?>

<p>Uma mensagem foi enviada através do formulário: <strong>Fale sobre o seu negócio</strong>.</p>

<ul>
	<li><strong>Nome</strong>: <?php echo $data['name']; ?></li>
	<li><strong>E-mail</strong>: <?php echo $data['email']; ?></li>
	<li><strong>Empresa</strong>: <?php echo $data['company']; ?></li>
	<li><strong>Telefone</strong>: <?php echo $data['phone']; ?></li>
	<li><strong>Budget</strong>: <?php echo $data['budget']; ?> (<?php echo $data['currency']; ?>)</li>
	<li><strong>Quando você quer iniciar seu projeto?</strong>: <?php echo $init[$data['init']]; ?></li>
	<li><strong>Mensagem</strong>: <?php echo nl2br($data['description']); ?></li>
	<?php if(!empty($files)): ?>
		<li><strong>Arquivos</strong>: 
			<ul>
				<?php foreach ($files as $key => $file): ?>
					<li><?php echo $this->Html->link($file['file']['name'], $this->Html->url('/files/' . $file['file']['name'], true));?></li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endif; ?>
</ul>

