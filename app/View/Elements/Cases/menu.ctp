<nav class="menu-brands">
	<h4 >Marcas</h4>
	<ul>
		<?php $active = ''; ?>

		<?php foreach ($menus as $i => $menu) { ?>

			<?php if(!empty($brand)) : ?>		

				<?php if($brand['Brand']['slug'] == $menu['Brand']['slug']) { $active = 'active'; } else { $active = '';} ?>

			<?php endif ?>

			<li>
				<?php echo $this->Html->link($menu['Brand']['title'], '../marcas/' . $menu['Brand']['slug'], array('title' => $menu['Brand']['title'], 'class' => $active)); ?>
			</li>

		<?php } ?>

		<?php if(empty($brand)){ $active = 'active'; } ?>

		<li class="all">
			<?php echo $this->Html->link('Todas <br/> as Marcas', '../marcas/', array('title' => 'Todas as Marcas', 'class' => $active, 'escape' => false)); ?>
		</li>	
	</ul>
	
	<?php echo $this->Html->link($this->Html->image('btn_pinterest.png'), '../imagens-dos-cases/', array('escape' => false, 'title' => 'Imagem dos Cases', 'class' => 'btn-pinterest')); ?>
</nav>