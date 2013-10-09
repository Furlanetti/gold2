<script type="text/javascript">
    
    $('section.expertises .items > li').corner("10px");

</script>


<section class="expertises <?php echo $slug ?>">

	<section class="content">
		<h2>
            Tornar <br />
            a comunicação <br />
            das empresas parte <br />
            da vida conectada <br />
            das pessoas. <span>Isto é onlife.</span> <br />
            <strong>Isto é focusnetworks.</strong>
        </h2>

        <div class="expertises-companies-menu">
            <?php echo $this->element('Companies/menu') ?>
        </div>

        <br class="clear" />
        
        <?php echo $this->element('social-horizontal') ?>
        
        <br class="clear" />

        <?php echo $this->element('Expertises/' . $slug) ?>

    <?php echo $this->element('products') ?>
    
	</section>
    

</section>
