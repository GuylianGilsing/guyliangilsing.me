<?php require_once(dirname(__FILE__).'/../inc/header.php'); ?>
<div id="success-banner" class="vertical-center text-center txt-color-white bg-color-purple">
    <div class="content text-center">
        <h3><?php echo $_GET['translation']['mail-success']; ?></h3>
        <div class="clear-10"></div>
        <a href="<?php echo RelativeURL('/'); ?>" class="btn btn-bordered btn-color-white"><?php echo $_GET['translation']['go-back-home']; ?></a>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<?php require_once(dirname(__FILE__).'/../inc/footer.php'); ?>