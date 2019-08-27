<?php require_once(dirname(__FILE__).'/inc/header.php'); ?>
<div id="page-notfound">
    <div>
        <h1>404</h1>
        <p><?php echo $_GET['translation']['page-not-found']; ?></p>
        <a href="<?php echo RelativeURL('/'); ?>"><?php echo $_GET['translation']['go-back-home']; ?></a>
    </div>
</div>
<?php require_once(dirname(__FILE__).'/inc/footer.php'); ?>