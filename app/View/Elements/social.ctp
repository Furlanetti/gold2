<ul class="social-vertical">
	<!--<li class="linked-in"><a href="<?php echo Configure::read('Site.linked-in'); ?>" target="_blank"><span>123</span></a></li>-->
	<li class="google"><a href="<?php echo Configure::read('Site.google'); ?>" target="_blank"><span><?php echo $google_plus_count ?></span></a></li>
	<li class="facebook"><a href="<?php echo Configure::read('Site.facebook'); ?>" target="_blank"><span><?php echo $likes['likes']; ?></span></a></li>
	<li class="twitter"><a href="<?php echo Configure::read('Site.twitter'); ?>" target="_blank"><span><?php echo $followers ?></span></a></li>	
</ul>