<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="projects-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <a href="<?php echo RelativeURL('/projects'); ?>" class="icon-previous"><i class="far fa-arrow-alt-circle-left"></i></a>    
    <div class="content">
        <h1>MT Unirepair</h1>
        <p><?php echo $_GET['translation']['mtunirepair-shortdetails']; ?></p>
        <div class="clear-20"></div>
        <a href="<?php echo ServerBase(); ?>/preview/project/mt-unirepair" target="_BLANK" class="text-center btn-bordered btn-color-white">Project Preview</a>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['the-project']; ?></h4>
        <p>
            <?php //echo $_GET['translation']['mtunirepair-theproject']; ?>
            MT Unirepair was een opdracht die ik gemaakt heb voor 
            <a href='https://influid.nl' target='_BLANK' class='txt-color-black'>Influid Creative Digital Agency</a>.
            Influid heeft mij het ontwerp aangeleverd voor een tijdelijke homepage, ik heb dit ontwerp gerealiseerd in HTML en CSS. 
            Het eindresultaat is een volledige responsive webpagina, ook is PHP in de code verwerkt om de pagina tijdelijk te maken.
        </p>
    </div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/mt-unirepair/design.jpg" alt="">    
    </div>
    <div class="clear"></div>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>