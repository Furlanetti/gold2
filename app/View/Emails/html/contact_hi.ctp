<?php $data = $vars['data']; ?>

<p>Uma mensagem foi enviada através do formulário: <strong>Diga um Oi</strong>.</p>

<ul>
	<li><strong>Nome</strong>: <?php echo $data['name']; ?></li>
	<li><strong>E-mail</strong>: <?php echo $data['email']; ?></li>
	<li><strong>Mensagem</strong>: <?php echo nl2br($data['description']); ?></li>
</ul>