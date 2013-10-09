<section class="mediabox">
	<ul class="slider">
		<li class="cuervo">
			<div class="content">
				<div class="logo"></div>
				<div class="title"><strong>1 milhão</strong> de CURTIDAS!</div>
				<div class="wrap">
					<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</div>
					<a href="" title="Ver Case" class="case">Ver Case</a>
				</div>
			</div>
		</li>
		<li class="testadores">
			<div class="content">
				<div class="logo"></div>
				<div class="title">Você é bom<br /> de cama?<strong>E onde mais?</strong></div>
				<div class="wrap">
					<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</div>
					<a href="" title="Ver Case" class="case">Ver Case</a>
				</div>
			</div>
		</li>
	</ul>

	<nav class="menu">
		<ul>
			<li class="cuervo"><a href="javascript:void(0);" title="Cuervo"></a></li>
			<li class="testadores"><a href="javascript:void(0);" title="Prudence"></a></li>
		</ul>
	</nav>
</section>

<section class="home company">
	<section class="wrap">

		<h2>Descubra<br /> o <strong>Grupo de Comunicação</strong></h2>	

		<div class="fix-position-menu-home">
			<?php echo $this->element('Companies/menu') ?>
		</div>

		<?php foreach ($companies as $key => $value): ?>
			<div class="video <?php echo $value['Company']['slug']; ?>">			
				<div class="embed"><iframe src="http://player.vimeo.com/video/<?php echo $value['Company']['video_code']; ?>?byline=0&amp;portrait=0&amp;autoplay=0" width="482" height="270" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<ul>
					<li><a href="<?php echo $this->webroot?>expertises/<?php echo $value['Company']['slug']; ?>/" title="Expertise">Expertise</a></li>
					<li><a href="<?php echo $this->webroot?>cases/" title="Cases">Cases</a></li>
				</ul>
			</div>
		<?php endforeach; ?>

	</section>
</section>

<?php echo $this->element('news-feed'); ?>

<script type="text/javascript">
	
	$(function(){
		home_mediabox();
		home_companies_menu();
	});

	function home_companies_menu(){
		var companies_section = $('.home.company');
		var menu_content = companies_section.find('.element_menu_companies');
		var menu_nav = menu_content.find('nav');
		var menu_link = menu_content.find('a');
		var menu_class = 'grupo-focusnetworks';

		companies_section.addClass(menu_class);
		home_companies_menu_video(companies_section, menu_class);

		menu_link.click(function(event){
			event.preventDefault();
			//item_class.removeClass('active');
			var item_class = $(this).parent().attr('class');
			
			companies_section.removeClass(menu_class);
			companies_section.addClass(item_class);
			home_companies_menu_video(companies_section, item_class);
			menu_class = item_class;

			menu_nav.attr('class', item_class);
			companies_menu();

			return false;
		})
	}

	function home_companies_menu_video(companies_section, video_class){
		companies_section.find('.video').hide();
		companies_section.find('.video.' + video_class).show();
	}

	function home_mediabox() {
		mediabox_animate();

		var activate_mediabox = mediabox_exec();
		var section = $('.mediabox');

		$('.menu .cuervo').click(function(){
			mediabox_cuervo_animate();
			section.data('item', 'testadores');
		});

		$('.menu .testadores').click(function(){
			mediabox_testadores_animate();
			section.data('item', 'cuervo');
		});

		$('.menu a').click(function(){
			$('.menu a').removeClass('active');
			$(this).addClass('active');
			clearInterval(activate_mediabox);
			activate_mediabox = mediabox_exec();
		});
	}

	function mediabox_exec(){
		return setInterval(function(){ mediabox_animate() }, 10000);
	}

	function mediabox_animate(){

		var section = $('.mediabox');
		var item = section.data('item');

		switch(item){
			case 'cuervo':
				mediabox_cuervo_animate();
				item = 'testadores';
				break;
			case 'testadores':
				mediabox_testadores_animate();
				item = 'cuervo';
				break;
			default:
				mediabox_cuervo_animate();
				item = 'testadores';
		}

		section.data('item', item);

	}

	function mediabox_cuervo_animate(){
		var name = 'cuervo';

		$('.menu a').removeClass('active');
		$('.menu li.'+name+' a').addClass('active');

		$('.slider li').hide();
		$('.slider li.'+name).show();

		var box = $('.'+name);
		var logo = box.find('.logo');
		var title = box.find('.title');
		var wrap = box.find('.wrap');

		box.animate({"background-position-y": '0'}, 0);
		logo.animate({"margin-top": '-100px', opacity: 0}, 0);
		title.animate({"margin-left": '-100px', opacity: 0}, 0);
		wrap.animate({"margin-top": '200px', opacity: 0}, 0);

		box.fadeIn();

		box.animate({
			"background-position-y": '-50'
			}, 1500);

		logo.animate({
			"margin-top": '0',
			opacity: 100
			}, 500, function() {

				title.animate({
					"margin-left": '0',
					opacity: 100
					}, 500);

				wrap.animate({
					"margin-top": '0',
					opacity: 100
					}, 500);
			});
	}

	function mediabox_testadores_animate(){
		var name = 'testadores';

		$('.menu a').removeClass('active');
		$('.menu li.'+name+' a').addClass('active');

		$('.slider li').hide();
		$('.slider li.'+name).show();

		var box = $('.testadores');
		var logo = box.find('.logo');
		var title = box.find('.title');
		var wrap = box.find('.wrap');

		box.animate({"background-position-y": '-50px'}, 0);
		logo.animate({"margin-left": '490px', opacity: 0}, 0);
		title.animate({"margin-left": '-100px', opacity: 0}, 0);
		wrap.animate({"margin-top": '200px', opacity: 0}, 0);

		box.animate({
			"background-position-y": '0'
			}, 1000);

		box.find('.logo').animate({
			"margin-left": '390px',
			opacity: 100
			}, 500, function() {

				box.find('.title').animate({
					"margin-left": '0',
					opacity: 100
					}, 500);

				box.find('.wrap').animate({
					"margin-top": '0',
					opacity: 100
					}, 500);
			});
	}

</script>