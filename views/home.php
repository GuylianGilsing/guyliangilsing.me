<?php require_once(dirname(__FILE__).'/inc/header.php'); ?>
<div id="home-hero_welcome" class="bg-color-purple txt-color-white">
    <div class="content">
        <div class="col-50">
            <h2><?php echo $_GET['translation']['home-banner-welcome']; ?></h2>
            <p class="font-regular"><?php echo $_GET['translation']['home-banner-welcome_sub']; ?></p>
        </div>
        <img src="<?php echo ServerBase(); ?>/assets/img/meself.png" alt="" class="me">
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section id="home-projects" class="indent-medium-top">
    <h1 class="text-center"><?php echo $_GET['translation']['projects']; ?></h1>
    <div class="clear-20"></div>
    <div class="project-row">
        <div class="project-card col-1-3 col-m-50 center col-s-100 col-xs-100">
            <a href="<?php echo RelativeURL('/project/cryptomania'); ?>" class="project-wrapper">
                <div class="thumbnail">
                    <h4 class="logo">Cryptomania</h4>
                </div>
                <div class="info">
                    <h6>Cryptomania</h6>
                    <p><?php echo $_GET['translation']['cryptomania-shortdetails']; ?></p>
                </div>
            </a>
        </div>
        <div class="project-card col-1-3 col-m-50 center col-s-100 col-xs-100">
            <a href="<?php echo RelativeURL('/project/fluidify'); ?>" class="project-wrapper">
                <div class="thumbnail">
                    <h4 class="logo">Fluidify</h4>
                </div>
                <div class="info">
                    <h6>Fluidify</h6>
                    <p><?php echo $_GET['translation']['fluidify-shortdetails']; ?></p>
                </div>
            </a>
        </div>
        <div class="project-card col-1-3 col-m-50 center col-s-100 col-xs-100">
            <a href="<?php echo RelativeURL('/project/mt-unirepair'); ?>" class="project-wrapper">
                <div class="thumbnail">
                    <h4 class="logo">MT Unirepair</h4>
                </div>
                <div class="info">
                    <h6>MT Unirepair</h6>
                    <p><?php echo $_GET['translation']['mtunirepair-shortdetails']; ?></p>
                </div>
            </a>
        </div>
    </div>
    <div class="clear"></div>
    <div class="col-100 text-center indent-small-bottom">
        <a href="<?php echo RelativeURL('/projects'); ?>" class="btn-bordered"><?php echo $_GET['translation']['btn-more_projects']; ?></a>
    </div>
</section>
<?php require_once(dirname(__FILE__).'/components/contact.php'); ?>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/inc/footer.php'); ?>