
<!DOCTYPE html>
<html class="no-js" lang="pt-br">
    <head>
        <?php echo $this->Html->charset(); ?>

        <meta name="robots" content="all" />
        <meta name="googlebot" content="index, follow" />
        <meta http-equiv="X-UA-Compatible" content="IE=8"/>

        <?php echo $this->Html->meta('favicon.ico', $this->webroot . 'favicon.ico', array('type' => 'icon'));
        ?>

        <meta name="keywords" content="" />
        <meta name="description" content="" />

        

        <title><?php echo $page_title . Configure::read('Site.name') ?></title>


        <?php
        echo $this->Html->css('reset');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('site');
        ?>

        <!--[if IE]>
           <?php echo $this->Html->css('ie'); ?>
        <![endif]-->

        <?php echo $this->Html->script('jquery-1.9.1.min'); ?>
        <?php echo $this->Html->script('bootstrap'); ?>
        <?php echo $this->Html->script('modernizr'); ?>
        <?php echo $this->Html->script('customCheck'); ?>
        <?php echo $this->Html->script('jquery.corner'); ?>        
        <?php echo $this->Html->script('jquery.wraplink-1.0.min'); ?> 
        <?php echo $this->Html->script('jquery.scrollTo-min'); ?>       
        <?php echo $this->Html->script('jquery.bpopup.min'); ?>        
        <?php echo $this->Html->script('site'); ?>        
    
        <?php        
        echo $this->Html->script('ace.min');
        echo $this->Html->script('jquery.knob.min');
        echo $this->Html->script('jquery.autosize-min');
        echo $this->Html->script('jquery.inputlimiter.1.3.1.min');
        echo $this->Html->script('jquery.maskedinput.min');        
        ?>
    <?php echo $this->Html->script('ace-elements.min'); ?>


        
    </head>
    <body class="<?php if(!empty($page_color)) echo $page_color ?>">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=489750967763190";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <header>
            <div class="blog">
                <a href="<?php echo Configure::read('Site.blog'); ?>" title="Acessar Blog" target="_blank">Blog</a>
            </div>
            <nav>
                <h1 class="logo">
                    <a href="<?php echo $this->webroot;?>" title="Acessar Página Inicial"></a>
                </h1>
                <ul class="menu">
                    <li class="active"><a href="<?php echo $this->base;?>/o-grupo/grupo-focusnetworks/" title="">O Grupo Focusnetworks</a></li>
                    <li><a href="<?php echo $this->base;?>/expertises/ux/" title="Expertise">Expertise</a></li>
                    <li><a href="<?php echo $this->base;?>/cases/" title="Cases">Cases</a></li>
                    <li><a href="<?php echo $this->base;?>/contatos/fale-sobre-o-seu-negocio/" title="Contatos">Contatos</a></li>
                    <?php echo $this->element('social-horizontal') ?>
                </ul>
            </nav>
        </header>

        <?php if(empty($layout)) { ?>

            <section class="middle">
                <section class="content">

                    <?php echo $this->fetch('content'); ?>
                    
                </section>
            </section>

        <?php } else { ?>

             <?php echo $this->fetch('content'); ?>
             
        <?php } ?>

        <footer>
            <nav>
                <ul class="sitemap">
                    <li class="descubra">
                        <h4>Descubra</h4>
                        <ul>
                            <li><a href="<?php echo $this->webroot ?>o-grupo/grupo-focusnetworks/" title="O Grupo Focusnetworks">O Grupo Focusnetworks</a></li>
                            <li><a href="<?php echo $this->webroot ?>o-grupo/interactive/" title="Interactive">Interactive</a></li>
                            <li><a href="<?php echo $this->webroot ?>o-grupo/midia-next/" title="Mídia Next">Mídia Next</a></li>
                            <li><a href="<?php echo Configure::read('Site.blog'); ?>" title="Blog" target="blank">Blog</a></li>
                            <li><a href="<?php echo Configure::read('Site.e-service'); ?>" title="e-Service" target="blank">e-Service</a></li>
                        </ul>
                    </li>
                    <li class="expertise">
                        <h4>Expertise</h4>
                        <ul>
                            <li><a href="<?php echo $this->webroot ?>expertises/interactive/" title="Interactive">Interactive</a></li>
                            <li><a href="<?php echo $this->webroot ?>expertises/midia-next/" title="Mídia Next">Mídia Next</a></li>
                            <li><a href="<?php echo $this->webroot ?>expertises/grupo-focusnetworks/" title="Todas as Expertises">Todas as Expertises</a></li>
                        </ul>
                    </li>
                    <li class="cases">
                        <h4>Cases</h4>
                        <ul>
                            <li><a href="<?php echo $this->webroot ?>cases/" title="Cases">Cases</a></li>
                            <li><a href="<?php echo $this->webroot ?>marcas/" title="Todas as Marcas">Todas as Marcas</a></li>
                            <li><a href="<?php echo Configure::read('Site.pinterest') . 'trabalhos-focusnetworks/'; ?>" title="Imagens dos Cases">Imagens dos Cases</a></li>
                        </ul>
                    </li>
                    <li class="buttons">
                        <a href="<?php echo $this->webroot ?>" class="logo"></a>
                        <ul class="social">
                            <li class="twitter"><a href="<?php echo Configure::read('Site.twitter'); ?>" title="Twitter" target="_blank"></a></li>
                            <li class="facebook"><a href="<?php echo Configure::read('Site.facebook'); ?>" title="Facebook" target="_blank"></a></li>
                            <li class="youtube"><a href="<?php echo Configure::read('Site.youtube'); ?>" title="Youtube" target="_blank"></a></li>
                            <li class="pinterest"><a href="<?php echo Configure::read('Site.pinterest'); ?>" title="Pinterest" target="_blank"></a></li>
                            <li class="google"><a href="<?php echo Configure::read('Site.google'); ?>" title="Google +" target="_blank"></a></li>
                        </ul>
                    </li>
                    <li class="info">
                        <address>
                            <span class="phone">+55 (12) 3302.6053</span>
                            <a href="mailto:comercial@focusnetworks.com.br" title="Entre em Contato" class="email">comercial@focusnetworks.com.br</a>
                            <p class="address">
                                Avenida Alfredo Ignácio<br />
                                Nogueira Penido, 305<br />
                                Aquarius Business Center,<br />
                                4º Andar - Jardim Aquárius.<br />
                                <a href="http://goo.gl/maps/QaYpb" title="Saiba Como Chegar" class="how-to-get" target="_blank">Como Chegar</a>
                                São José daos Campos - SP
                            </p>
                        </address>                        
                    </li>
                </ul>
            </nav>
        </footer>


        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
    </body>
</html>





