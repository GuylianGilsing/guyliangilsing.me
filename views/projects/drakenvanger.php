<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="projects-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <a href="<?php echo RelativeURL('/projects'); ?>" class="icon-previous"><i class="far fa-arrow-alt-circle-left"></i></a>    
    <div class="content">
        <h1>Drakenvanger</h1>
        <p><?php echo $_GET['translation']['drakenvanger-shortdetails']; ?></p>
        <div class="clear-20"></div>
        <a href="http://dragons.guyliangilsing.me" target="_BLANK" class="text-center btn-bordered btn-color-white">Project Preview</a>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['the-project']; ?></h4>
        <p><?php echo $_GET['translation']['drakenvanger-theproject']; ?></p>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['technologies']; ?></h4>
        <p><?php echo $_GET['translation']['drakenvanger-technologies']; ?></p>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['features']; ?></h4>
        <p><?php echo $_GET['translation']['drakenvanger-features-pre']; ?></p>
        <ul class="with-bullets">
            <?php
                if(count($_GET['translation']['drakenvanger-features']) > 0)
                {
                    foreach($_GET['translation']['drakenvanger-features'] as $feature)
                    {
                        echo '<li>'.$feature.'</li>';
                    }
                }
            ?>
        </ul>
    </div>
    <div class="col-100 indent-small">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/drakenvanger/drakenvanger.png" alt="">
    </div>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>