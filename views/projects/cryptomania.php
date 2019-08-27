<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="projects-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <a href="<?php echo RelativeURL('/projects'); ?>" class="icon-previous"><i class="far fa-arrow-alt-circle-left"></i></a>    
    <div>
        <h1>Cryptomania</h1>
        <p><?php echo $_GET['translation']['cryptomania-shortdetails']; ?></p>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['the-project']; ?></h4>
        <p><?php echo $_GET['translation']['cryptomania-theproject']; ?></p>
        <div class="clear-20"></div>
    </div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-homepage.png" alt="Cryptomania homepage">
    </div>
    <div class="clear-100"></div>
    <div class="container text-center">
        <h2><?php echo $_GET['translation']['technologies']; ?></h2>
        <p><?php echo $_GET['translation']['cryptomania-technologies']; ?></p>
    </div>
    <div class="clear-100"></div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-coininfo.png" alt="Cryptomania homepage">
    </div>
    <div class="col-50 col-m-100 col-s-100 col-xs-100">
        <h4><?php echo $_GET['translation']['features']; ?></h4>
        <p><?php echo $_GET['translation']['cryptomania-features-pre']; ?></p>
        <div class="clear-10"></div>
        <ul class="with-bullets">
            <?php
                if(count($_GET['translation']['cryptomania-features']) > 0)
                {
                    foreach($_GET['translation']['cryptomania-features'] as $feature)
                    {
                        echo '<li>'.$feature.'</li>';
                    }
                }
            ?>
        </ul>
    </div>
    <div class="clear-100"></div>
    <h2 class="text-center"><?php echo $_GET['translation']['more-pictures']; ?></h2>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-homepage-loggedin.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-news.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-portfolio.png" alt="">
        <div class="clear-20"></div>
    </div>
    <div class="col-1-3 col-m-50 col-s-100 col-xs-100">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/cryptomania/cryptomania-coininfo-loggedin.png" alt="">
        <div class="clear-20"></div>
    </div>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>