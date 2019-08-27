<section id="component-contact" class="bg-color-purple">
    <form autocomplete="off" id="form-contact" action="/formsubmittion/contact" method="POST">
        <div class="info">
            <h1><?php echo $_GET['translation']['contactform-title']; ?></h1>
            <p><?php echo $_GET['translation']['contactform-info']; ?></p>
        </div>
        <div class="form-field col-50 col-s-100 col-xs-100">
            <label for="contact-firstname" class="txt-color-white"><?php echo $_GET['translation']['form-firstname']; ?></label>
            <input type="text" name="contact-firstname" id="contact-firstname">
        </div>
        <div class="form-field col-50 col-s-100 col-xs-100">
            <label for="contact-lastname" class="txt-color-white"><?php echo $_GET['translation']['form-lastname']; ?></label>
            <input type="text" name="contact-lastname" id="contact-lastname">
        </div>
        <div class="form-field col-100">
            <label for="contact-email" class="txt-color-white"><?php echo $_GET['translation']['form-emailaddress']; ?></label>
            <input type="email" name="contact-email" id="contact-email">
        </div>
        <div class="form-field col-100">
            <label for="contact-subject" class="txt-color-white"><?php echo $_GET['translation']['form-subject']; ?></label>
            <input type="text" name="contact-subject" id="contact-subject">
        </div>
        <div class="form-field col-100">
            <label for="contact-message" class="txt-color-white"><?php echo $_GET['translation']['form-message'].' '.$_GET['translation']['form-optional']; ?></label>
            <textarea name="contact-message" id="contact-message" rows="5"></textarea>
        </div>
        <div class="col-100">
            <button type="submit" class="btn btn-color-purple btn-light"><?php echo $_GET['translation']['form-send']; ?></button>
        </div>
    </form>
</section>