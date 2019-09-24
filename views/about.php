<?php require_once(dirname(__FILE__).'/inc/header.php'); ?>
<div id="about-banner" class="vertical-center txt-color-white bg-color-purple">
    <div>
        <h1><?php echo $_GET['translation']['about-me']; ?></h1>
    </div>
    <div class="container-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
</div>
<section class="indent-medium">
    <div class="container">
        <div class="col-50 col-s-100 col-xs-100 indent-left-5">
            <h3>My knowledge </h3>
            <p>
                This list displays all of the languages and frameworks that I have worked with. 
                There is basic knowledge in all these items and I'm able to use these languages 
                and frameworks to built almost anything I want.
            </p>
        </div>
        <div class="col-50 col-s-100 col-xs-100 indent-left-10">
            <ul class="with-bullets">
                <li>HTML</li>
                <li>CSS</li>
                <li>Javascript</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>Laravel</li>
            </ul>
        </div>
    </div>
</section>
<section class="indent-small">
    <h2 class="text-center">Testimonials</h2>
    <?php
        require(dirname(__FILE__).'/components/testimonials.php');

        $testimonials = new Testimonials;
        $testimonials->showPreview = true;

        $testimonials->Render();
    ?>
</section>
<div class="footer-push"></div>
<?php require_once(dirname(__FILE__).'/inc/footer.php'); ?>