<section id="component-contact" class="bg-color-purple">
    <form autocomplete="off" id="form-contact" action="<?php echo ServerBase().$_GET['page']; ?>" method="POST">
        <div class="info">
            <h1><?php echo $_GET['translation']['contactform-title']; ?></h1>
            <p><?php echo $_GET['translation']['contactform-info']; ?></p>
        </div>
        <div class="form-field col-50 col-s-100 col-xs-100">
            <?php
                if(isset($_SESSION['contact-form-errors']['contact-firstname']) && $_SESSION['contact-form-errors']['contact-firstname'] == "empty")
                {
                    echo '<label for="contact-firstname" class="txt-color-red txt-color-dark">'.$_GET['translation']['form-firstname-error'].'</label>';
                }
                else
                {
                    echo '<label for="contact-firstname" class="txt-color-white">'.$_GET['translation']['form-firstname'].'</label>';
                }
            ?>
            <input required type="text" name="contact-firstname" id="contact-firstname">
        </div>
        <div class="form-field col-50 col-s-100 col-xs-100">
            <?php
                if(isset($_SESSION['contact-form-errors']['contact-lastname']) && $_SESSION['contact-form-errors']['contact-lastname'] == "empty")
                {
                    echo '<label for="contact-lastname" class="txt-color-red txt-color-dark">'.$_GET['translation']['form-lastname-error'].'</label>';
                }
                else
                {
                    echo '<label for="contact-lastname" class="txt-color-white">'.$_GET['translation']['form-lastname'].'</label>';
                }
            ?>
            <input required type="text" name="contact-lastname" id="contact-lastname">
        </div>
        <div class="form-field col-100">
            <?php
                if(isset($_SESSION['contact-form-errors']['contact-emailaddress']) && $_SESSION['contact-form-errors']['contact-emailaddress'] == "empty")
                {
                    echo '<label for="contact-emailaddress" class="txt-color-red txt-color-dark">'.$_GET['translation']['form-emailaddress-error'].'</label>';
                }
                else
                {
                    echo '<label for="contact-emailaddress" class="txt-color-white">'.$_GET['translation']['form-emailaddress'].'</label>';
                }
            ?>
            <input required type="email" name="contact-email" id="contact-email">
        </div>
        <div class="form-field col-100">
            <?php
                if(isset($_SESSION['contact-form-errors']['contact-subject']) && $_SESSION['contact-form-errors']['contact-subject'] == "empty")
                {
                    echo '<label for="contact-subject" class="txt-color-red txt-color-dark">'.$_GET['translation']['form-subject-error'].'</label>';
                }
                else
                {
                    echo '<label for="contact-subject" class="txt-color-white">'.$_GET['translation']['form-subject'].'</label>';
                }
            ?>
            <input required type="text" name="contact-subject" id="contact-subject">
        </div>
        <div class="form-field col-100">
            <label for="contact-message" class="txt-color-white"><?php echo $_GET['translation']['form-message'].' '.$_GET['translation']['form-optional']; ?></label>
            <textarea name="contact-message" id="contact-message" rows="5"></textarea>
        </div>
        <div class="col-100">
            <button type="submit" name="contact-submit" value="form" class="btn btn-color-purple btn-light"><?php echo $_GET['translation']['form-send']; ?></button>
        </div>
    </form>
</section>
<?php
    // Check if the error session is set, if so destroy the session.
    if(isset($_SESSION['contact-form-errors']))
        unset($_SESSION['contact-form-errors']);
?>