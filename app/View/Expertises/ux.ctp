<section class="content ux custom">
	<section class="wrap">
		<section class="center">
			<h2>A <span>melhor <br/>
				experiência</span> com as pessoas</h2>
			<h3>Nosso dna é enriquecer<br/> a experiência
			 de comunicação<br/> com as pessoas</h3>	

			 <?php if($first_access): ?>	

				<div class="info">
					<div class="first">
						<?php echo $this->Html->image('img_circle_first.gif'); ?>
					</div>
					<div class="second">
						<?php echo $this->Html->image('img_circle_second.gif'); ?>
					</div>
					<div class="third">
						<?php echo $this->Html->image('img_circle_third.gif'); ?>
					</div>
					<div class="ux-center">
						<h4>UX</h4>
						<span>Clique<br /> e Entenda</span>
					</div>
					<div class="animation">
						
					</div>
				</div>

			<?php endif; ?>

			<div class="complete <?php if(!$first_access) { ?>show<?php } ?>">
				<div class="company grupo-focusnetworks" data-url="<?php echo $this->webroot ?>expertises/grupo-focusnetworks/" title="Clique para saber mais!">
					<div></div>
				</div>
				<div class="company interactive" data-url="<?php echo $this->webroot ?>expertises/interactive/" title="Clique para saber mais!">
					<div></div>
				</div>
				<div class="company midia-next" data-url="<?php echo $this->webroot ?>expertises/midia-next/" title="Clique para saber mais!">
					<div></div>
				</div>
				<div class="ux-center" title="Assista o vídeo!"></div>
			</div>

			<div class="video">
				<iframe src="http://player.vimeo.com/video/61932518?byline=0&amp;portrait=0&amp;autoplay=0" width="850" height="478" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><br/>
				<?php echo $this->Html->link('FECHAR', 'javascript:void(0);', array('class' => 'btn-close')); ?>
			</div>

			<!--<div class="lightbox">

				<div class="interactive">
					<h2>EXPERTISE DA INTERACTIVE</h2>
					<?php echo $this->element('social-horizontal') ?>
					<ul class="expertises">
						<li>
							<i></i><h3>Planejamento Estratégico</h3>		
							<ul>	        			
								<li>Estratégia de Sites</li>
								<li>Estratégia de Portais</li>
								<li>Estratégia de Hotsites e Microsites</li>
								<li>Estratégia de App para Facebook</li>
								<li>Estratégia de Intranets</li>
								<li>Estratégia de Extranets</li>
								<li>Estratégia de Redes Sociais Corporativas</li>        			
							</ul>  	
						</li>
						<li>
							<i></i><h3>Criação, UX e Conteúdo</h3>
							<ul>	        			
								<li>Guide Visual para Projetos Web</li>
								<li>Design de Interação</li>
								<li>Arquitetura de Informação</li>
								<li>Design de Interface</li>
								<li>Teste de Usabilidade</li>
							</ul>		  		    		    	
						</li>
						<li>
							<i></i><h3>Métricas e Análises</h3>
							<ul>	        			
								<li>Configuração de Web Analytics</li>
								<li>Configuração de Scripts de Conversão</li>
								<li>Criação de Tags para rastreamento</li>
								<li>Search Engine Optimization(SEO)</li>
								<li>Análise de Performance de Projetos Web</li>
							</ul>		
						</li>
					</ul>
					<a href="#">> Ver toda expertise</a>
					<div>
						<h2>ÚLTIMOS CASES</h2>
						<?php echo $this->element('Cases/others') ?>
					</div>
				</div>

				<div class="midia-next">
					<h2>EXPERTISE DA MIDIANEXT</h2>
					<?php echo $this->element('social-horizontal') ?>
					<ul class="expertises">
						<li>
							<i></i><h3>Planejamento Estratégico</h3>		
							<ul>	        			
								<li>Estratégia de Marca e Posicionamento</li>
								<li>Estratégia de Comunicação</li>
								<li>Estratégia de Conteúdo</li>
								<li>Estratégia de Engajamento</li>
								<li>Estratégia de Mídias Sociais</li>
								<li>Planejamento de Campanhas</li>
								<li>Planejamento de Mídia</li>         			
							</ul>  	
						</li>
						<li>
							<i></i><h3>Criação, UX e Conteúdo</h3>
							<ul>	        			
								<li>Identidade de Marca e Mensagem</li>
								<li>Criação de Conteúdo para Redes Sociais</li>
								<li>Criação de anúncios digitais(Banner, Emails, etc)</li>
								<li>Criação de Roteiros para vídeos</li>
								<li>Produção de Vídeos</li>
							</ul>		  		    		    	
						</li>
						<li>
							<i></i><h3>Métricas e Análises</h3>
							<ul>	        			
								<li>Monitoramento de Mídias Sociais, Relatório e Recomendações</li>
								<li>Análise de Performance de Campanhas Web, Relatório e Recomendações</li>
								<li>Análise de Engajamento de Mídias Sociais</li>
								<li>Análise de Métricas de Redes Sociais</li>	
							</ul>		
						</li>
					</ul>
					<a href="#">> Ver toda expertise</a>
					<div>
						<h2>ÚLTIMOS CASES</h2>
						<?php echo $this->element('Cases/others') ?>
					</div>
				</div>		

			</div>-->

		</section>

		<section class="right">
			<?php echo $this->element('social') ?>
		</section>

	</section>
</section>

<script type="text/javascript">

	$(ux_init);

	function ux_init(){

		$('.ux-center').click(function(){
			ux_first_animate();
		});

		$('.btn-close').click(function(){
			$('.ux .video').fadeOut(function(){
				$('body').scrollTo( 450, 800 );
				$('.complete').css({'display' : 'table'});
			});
		});

		$('.btn-close').click(function(){
			$('.ux .video').fadeOut(function(){
				$('body').scrollTo( 450, 800 );
				$('.complete').css({'display' : 'table'});
			});
		});

		$(".complete .ux-center").hover(function (){
			$('.complete .company').addClass('active');
		}, function () {
			$('.complete .company').removeClass('active');
		});

		$(".complete .ux-center").click(function (){
			$('.complete').fadeOut(function(){
				$('.complete .video').fadeIn();
			});
		});

		$(".complete .company").click(function (){
			window.location.href=$(this).data("url");
		});

	}

	function ux_first_animate(){

		$('.first').animate({
			"background-position-y": '-1000'
			}, 800);

		$('.second').animate({
			"background-position-x": '-1000',
			"background-position-y": '+1000',
			});

		$('.third').animate({
			"background-position-x": '+1000',
			"background-position-y": '+1000',
			});

		$('.info').fadeOut(function(){
			$('.video').fadeIn();
			$('body').scrollTo( 280, 800 );
		});

	}
</script>