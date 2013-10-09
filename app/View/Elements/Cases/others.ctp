<ul class="cases-others">
	<?php foreach ($others as $i => $other) { ?>			
		<li>			
			<?php echo $this->Html->link($other['Cases']['title'], '../cases/'.$other['Cases']['slug'], array('title' => $other['Cases']['title'])) ?>
			<div class="wraplink">
				<figure>
					<?php $case_image = ($other['Cases']['video']) ? $other['Cases']['video_image'] : "../files/" . $other['Cases']['image']; ?>
					<?php echo $this->Html->Image($case_image, array('alt' => $other['Cases']['title'])) ?>					
					<span class="mask"></span>
					<figcaption><?=$other['Cases']['title']?></figcaption>
				</figure>
			</div>
		</li>
	<?php } ?>
</ul>