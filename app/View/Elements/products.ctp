<section class="products-list">

	<ul class="products">
		<li class="title">				
			<strong>Inove sua Comunicação</strong>
			Produtos Focusnetworks
		</li>
		<li class="icons"><i class="idea"></i><span>focusnetworks</span><br/><strong>IDEA<br/>STORM</strong></li>
		<li class="icons"><i class="innovation"></i><span>focusnetworks</span><br/><strong>INNOVATION<br/>STORM</strong></li>
		<li class="icons"><i class="corporate"></i><span>focusnetworks</span><br/><strong>CORPORATE<br/>SOCIAL NETWORK</strong></li>
		<li class="icons"><i class="predict"></i><span>focusnetworks</span><br/><strong>PREDICT<br/>MARKET</strong></li>	
	</ul>

</section>

<style type="text/css">

section.products-list .products{
	background: url('<?php echo $this->webroot ?>img/bg_products.png');
	width: 980px;
	height: 195px;
	margin: 60px 0 0 -10px;
	display: inline-block;
}

section.products-list .products li{
	float: left;
	text-transform: uppercase;	
}

section.products-list .products li.title{
	width: 210px;
	color: #999999;
	font-family: 'Trade Bold';
	font-weight: bold;
	font-size: 30px;
	line-height: 30px;
	letter-spacing: -2px;
	margin-left: 30px;
	margin-top: 37px;
}

section.products-list .products li.title strong{
	color: white;
}

section.products-list .products li.icons{
	text-align: center;
	width: 180px;
	height: 187px;
	cursor: pointer;
	line-height: 15px;
}

section.products-list .products li.icons i{
	background: url('<?php echo $this->webroot ?>img/bg_icon_products.png') center no-repeat;
	text-align: center;
	width: 180px;
	height: 110px;
	display: block;
}

section.products-list .products li.icons span, section.products-list .products li.icons strong{
	color: #666666;
}

section.products-list .products li.icons span{
	font-family: 'Trade Italic';
	font-weight: normal;
	font-style: italic;
	font-size: 12px;
}

section.products-list .products li.icons i:hover{
	/*background: url('<?php echo $this->webroot ?>img/bg_icon_products_hover.png') center no-repeat;*/
}

section.products-list .products li.icons i.idea{
	background-position: 68px 30px;
	
}

section.products-list .products li.icons:hover span, section.products-list .products li.icons:hover strong{
	color: white;
}

section.products-list .products li.icons:hover i.idea{
	background: url('<?php echo $this->webroot ?>img/icn_lampada.gif') center no-repeat;
	background-position: 48.5px 15px;
}

section.products-list .products li.icons i.innovation{
	background-position: -104px 30px;
}

section.products-list .products li.icons:hover i.innovation{
	background: url('<?php echo $this->webroot ?>img/icn_atomo.gif') center no-repeat;
	background-position: 55px 29px;
}

section.products-list .products li.icons i.corporate{
	background-position: -293px 30px;
}

section.products-list .products li.icons:hover i.corporate{
	background: url('<?php echo $this->webroot ?>img/icn_celular.gif') center no-repeat;
	background-position: 49px 23px;
}

section.products-list .products li.icons i.predict{
	background-position: -474px 30px;
}

section.products-list .products li.icons:hover i.predict{
	background: url('<?php echo $this->webroot ?>img/icn_grafico-seta-menu.gif') center no-repeat;
	background-position: 55px 30px;
}


</style>