<?php $data = $vars['data']; ?>

<p>Uma mensagem foi enviada através do formulário: <strong>Alguma Pergunta?</strong>.</p>

<ul>
	<li><strong>Nome</strong>: <?php echo $data['name']; ?></li>
	<li><strong>E-mail</strong>: <?php echo $data['email']; ?></li>
	<li><strong>Empresa</strong>: <?php echo $data['company']; ?></li>
	<li><strong>Telefone</strong>: <?php echo $data['phone']; ?></li>
	<li><strong>Mensagem</strong>: <?php echo nl2br($data['description']); ?></li>
</ul>