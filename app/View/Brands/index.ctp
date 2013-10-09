<section class="brands custom">
	<section class="wrap">

		<section class="left">

			<?php echo $this->element('Cases/menu'); ?>

		</section>

		<section class="center">
			<h2>Todas Marcas</h2>
			<ul>
				<?php foreach ($brands as $i => $brand) { ?>
					<li>
						<figure>
							<?php echo $this->Html->image('../files/'.$brand['Brand']['image'], array('alt' => $brand['Brand']['title'])) ?>					
						</figure>
					</li>
				<?php } ?>				
			</ul>
			<br class="clear"/>
			<!-- Paginação do CakePhp, o HTML pode ser alterado pelo options -->
			<?php echo $this->Paginator->numbers(); ?>				
		</section>

		<section class="right">
			<?php echo $this->element('social'); ?>
		</section>

	</section>
</section>