<section class="element_menu_companies">
	<nav class="<?php echo $company['slug'] ?>">
		<ul class="first-menu">
			<?php foreach ($companies as $key => $value) { ?>
				<?php
				$this_slug = $value['Company']['slug'];
				$this_page_title = $value['Company']['page_title'];
				?>
				<li class="<?php echo $this_slug ;?>">
					<?php echo $this->Html->link('', '../' . ((!empty($custom_controller)) ? $custom_controller : $this->params['controller']) . '/' . $this_slug); ?>
				</li>
			<?php } ?>
		</ul>
	</nav>
</section>