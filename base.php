<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
        // Render meta code.
        $contentLoader->renderMeta();
    ?>
    <link rel="shortcut icon" href="<?php echo ServerBase(); ?>/assets/favicon.png" type="image/png">
    <?php
        $contentLoader->renderPageTitle();
        
        // Render CSS / Javascript.
        $contentLoader->renderCss();
        $contentLoader->renderJavascript();
    ?>
</head>
<body>
    <?php $contentLoader->renderPage(); ?>
</body>
</html>