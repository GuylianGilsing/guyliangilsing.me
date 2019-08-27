<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="projects-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <a href="<?php echo RelativeURL('/projects'); ?>" class="icon-previous"><i class="far fa-arrow-alt-circle-left"></i></a>    
    <div class="content">
        <h1>Fluidify</h1>
        <p><?php echo $_GET['translation']['fluidify-shortdetails']; ?></p>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['the-project']; ?></h4>
        <p><?php echo $_GET['translation']['fluidify-theproject']; ?></p>
    </div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-login.png" alt="">    
    </div>
    <div class="clear"></div>
    <div class="col-100 text-center indent-medium">
        <h4><?php echo $_GET['translation']['technologies']; ?></h4>
        <p><?php echo $_GET['translation']['fluidify-technologies']; ?></p>
    </div>
    <div class="clear"></div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-content.png" alt="">
    </div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['features']; ?></h4>
        <p><?php echo $_GET['translation']['fluidify-features-pre']; ?></p>
        <ul class="with-bullets">
            <?php
                if(count($_GET['translation']['fluidify-features']) > 0)
                {
                    foreach($_GET['translation']['fluidify-features'] as $feature)
                    {
                        echo '<li>'.$feature.'</li>';
                    }
                }
            ?>
        </ul>
    </div>
    <div class="clear"></div>
    <h2 class="text-center"><?php echo $_GET['translation']['more-pictures']; ?></h2>
    <div class="clear-15"></div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-frontend.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-builder.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-plugins.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/fluidify/fluidify-dashboard.png" alt="">
        <div class="clear-20"></div>
    </div>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>