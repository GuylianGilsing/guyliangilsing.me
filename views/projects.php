<?php require_once(dirname(__FILE__).'/inc/header.php'); ?>
<div id="projects-banner" class="vertical-center txt-color-white bg-color-purple">
    <div>
        <h1><?php echo $_GET['translation']['projects']; ?></h1>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
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
        <a href="<?php echo RelativeURL('/project/drakenvanger'); ?>" class="project-wrapper">
            <div class="thumbnail">
                <h4 class="logo">Drakenvanger</h4>
            </div>
            <div class="info">
                <h6>Drakenvanger</h6>
                <p><?php echo $_GET['translation']['drakenvanger-shortdetails']; ?></p>
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
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/inc/footer.php'); ?>