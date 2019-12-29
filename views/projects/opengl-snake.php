<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="projects-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <a href="<?php echo RelativeURL('/projects'); ?>" class="icon-previous"><i class="far fa-arrow-alt-circle-left"></i></a>    
    <div class="content">
        <h1>OpenGL Snake</h1>
        <p><?php echo $_GET['translation']['opengl_snake-shortdetails']; ?></p>
        <div class="clear-20"></div>
        <a href="https://github.com/GuylianGilsing/C-Snake" target="_BLANK" class="text-center btn-bordered btn-color-white">Project Preview</a>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="col-50 col-s-100 col-xs-100">
        <div class="indent-small-bottom">
            <h4><?php echo $_GET['translation']['the-project']; ?></h4>
            <p><?php echo $_GET['translation']['opengl_snake-theproject']; ?></p>
        </div>
        <div class="indent-small-bottom">
            <h4><?php echo $_GET['translation']['technologies']; ?></h4>
            <p><?php echo $_GET['translation']['opengl_snake-technologies']; ?></p>
        </div>
    </div>

    <div class="col-50 col-s-100 col-xs-100" style="margin: 0 auto;">
        <img src="<?php echo ServerBase(); ?>/assets/img/projects/opengl-snake/opengl-snake-application.png" alt="">
    </div>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>