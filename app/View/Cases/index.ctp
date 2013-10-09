<style type="text/css">

section.cases .video{
    background: url('<?php echo $this->webroot ?>img/img_loader.gif') center center no-repeat;
}

</style>

<section class="cases custom">
	<section class="wrap">
		<section class="left">
			<?php echo $this->element('Cases/menu'); ?>
		</section>

		<section class="center">

			<h2>Nossos Cases</h2>

			<div class="featured">				
				<div class="video"><iframe src="http://player.vimeo.com/video/61932518?byline=0&amp;portrait=0&amp;autoplay=0" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
			</div>

			<?php echo $this->element('Cases/others') ?>

		</section>

		<section class="right">
			<?php echo $this->element('social'); ?>
		</section>

	</section>

</section>