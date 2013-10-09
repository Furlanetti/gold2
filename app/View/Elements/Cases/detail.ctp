<section class="case-detail">
	<article>
		<div class="featured">
			<?php if($case['Cases']['video'] != '') { ?>

				<?php if($typeVideo == 'youtube'){ ?>
					<div class="video"><iframe width="640" height="360" src="//www.youtube.com/embed/<?php echo $videoCode; ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php } else if($typeVideo == 'vimeo') { ?>
					<div class="video"><iframe src="http://player.vimeo.com/video/<?php echo $videoCode; ?>?byline=0&amp;portrait=0&amp;autoplay=0" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<?php } ?>

			<?php } else { ?>
				<figure>
					<?php echo $this->Html->image('../files/'.$case['Cases']['image'], array('alt' => $case['Cases']['title'])); ?>								
				</figure>
			<?php } ?>	
		</div>

		<header>
			<span class="brand"><?php // echo $case['Brand']['title'] ?></a>		
			<h2><?php echo $case['Cases']['title'] ?></h2>
		</header>

		<div class="description">							
			<?php echo $case['Cases']['description']; ?>
			 <?php // echo $this->Html->image("../files/".$case['Brand']['image'], array(
			//     'alt' => $case['Brand']['title'],
			//     'url' => '../brands/'.$case['Brand']['slug'],
			//     'title' => 'Acessar Cases'.$case['Brand']['title'],
			//     'class' => 'logo'
			// )); ?>
		</div>	

		<?php if(!empty($case['CaseExpertise'][0]['description']) && !empty($case['CaseExpertise'][1]['description'])) : ?>

		<ul class="expertises">

			<?php if(!empty($case['CaseExpertise'][0]['description'])) : ?>
				<li>
					<h4 class="interactive"></h4>
					<p class="description"><?php echo nl2br($case['CaseExpertise'][0]['description']); ?></p>
				</li>
			<?php endif ?>
			<?php if(!empty($case['CaseExpertise'][1]['description'])) : ?>
				<li>
					<h4 class="midia-next"></h4>
					<p class="description midia-next-desc"><?php echo nl2br($case['CaseExpertise'][1]['description']); ?></p>
				</li>
			<?php endif ?>

		</ul>

		<?php endif; ?>

	</article>
</section>
<h3>Outros Cases</h3>
<?php echo $this->element('Cases/others') ?>