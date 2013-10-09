<section class="info <?php echo $slug ?>">

	<div class="wrap">
		<h2>
			Descubra <br /><?php echo ($company['id'] == 1) ? 'o' : 'a'  ?> 
			<strong><?php echo $company['page_title'] ;?></strong>
		</h2>

		<div class="left">
			<?php echo $this->element('Companies/menu') ?>
		</div>

		<div class="right">
			<div class="video">
				<iframe src="http://player.vimeo.com/video/<?php echo $company['video_code']; ?>?byline=0&amp;portrait=0&amp;autoplay=0" width="600" height="335" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</div>
			<?php echo $this->element('social'); ?>

			<br class="clear" />

			<div class="description">
				<p><?php echo $company['description'] ;?></p>
				<?php echo $this->Html->link('Expertise', '../expertises/'.$slug, array('class' => 'expertise')); ?>
			</div>
		</div>

		<?php echo $this->element('products') ?>
		
	</section>

</section>

<section class="team">

	<header>
		<h3>Universo Digital</h3>
		<h2>
			Conecte-se ao <br />
			<strong>Grupo Focusnetworks</strong>
		</h2>
		<h3 class="title">Equipe Focusnetworks</h3>
	</header>

	<ul>
		<?php foreach ($team as $key => $person) { ?>
			<li>
				<?php if(isset($person['TeamImage'])){ ?>
					<figure>
						<?php foreach ($person['TeamImage'] as $k => $image) { ?>
							<?php echo $this->Html->image('../files/' . $image['image'], array('alt' => $person['name'])); ?>
						<?php } ?>
					</figure>
				<?php } ?>
				<div class="info">
					<!--<?php if(isset($person['TeamImage'])){ ?>
						<figure>
							<?php foreach ($person['TeamImage'] as $k => $image) { ?>
								<?php echo $this->Html->image('../files/' . $image['image'], array('alt' => $person['name'])); ?>
							<?php } ?>
						</figure>
					<?php } ?>-->
					<?php if($person['facebook'] || $person['twitter'] || $person['instagram'] || $person['linkedin']) { ?>
						<ul>
							<?php if($person['facebook']){ ?>
								<li class="facebook">
									<?php echo $this->Html->link('', $person['facebook'], array('target' => '_blank', 'title' => 'Facebook')); ?>
								</li>
							<?php } ?>
							<?php if($person['twitter']){ ?>
								<li class="twitter">
									<?php echo $this->Html->link('', $person['twitter'], array('target' => '_blank', 'title' => 'Twitter')); ?>
								</li>
							<?php } ?>
							<?php if($person['instagram']){ ?>
								<li class="instagram">
									<?php echo $this->Html->link('', $person['instagram'], array('target' => '_blank', 'title' => 'Instagram')); ?>
								</li>
							<?php } ?>
							<?php if($person['linkedin']){ ?>
								<li class="linked-in">
									<?php echo $this->Html->link('', $person['linkedin'], array('target' => '_blank', 'title' => 'LinkedIn')); ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
					<h4><?php echo $person['name'] ?></h4>
					<span class="position"><?php echo $person['position'] ?></span>
					<span class="description"><?php echo $person['description'] ?></span>
				</div>
			</li>
		<?php } ?>
	</ul>

	<div class="social">
		<h3>Outros Canais</h3>
		<ul>
			<li class="google"><a href="<?php echo Configure::read('Site.google'); ?>" title="Google +" target="_blank"></a></li>
			<li class="delicious"><a href="<?php echo Configure::read('Site.delicious'); ?>" title="Delicious" target="_blank"></a></li>
			<li class="pinterest clear"><a href="<?php echo Configure::read('Site.pinterest'); ?>" title="Pinterest" target="_blank"></a></li>
			<li class="youtube"><a href="<?php echo Configure::read('Site.youtube'); ?>" title="Youtube" target="_blank"></a></li>
		</ul>

		<div class="fb-like-box" data-href="https://www.facebook.com/focusnetworks" data-width="720" data-height="190" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	</div>

</section>

<?php echo $this->element('news-feed'); ?>