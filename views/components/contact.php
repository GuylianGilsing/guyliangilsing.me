<?php
    StartSession();

    // Capture the contact submit event, this get's checked before the form get's loaded.
    if(isset($_POST['contact-submit']) && $_POST['contact-submit'] == "form")
    {
        // Will hold the empty field names, these will be put into a session to later check for errors.
        $emptyFields = [];

        // check if the required fields are set.
        if(isset($_POST['contact-firstname']) == false || empty($_POST['contact-firstname']))
            $emptyFields['contact-firstname'] = "empty";

        if(isset($_POST['contact-lastname']) == false || empty($_POST['contact-lastname']))
            $emptyFields['contact-lastname'] = "empty";

        if(isset($_POST['contact-email']) == false || empty($_POST['contact-email']))
            $emptyFields['contact-emailaddress'] = "empty";

        if(isset($_POST['contact-subject']) == false || empty($_POST['contact-subject']))
            $emptyFields['contact-subject'] = "empty";

        // Redirect the user back when there are errors found.
        if(count($emptyFields) > 0)
        {
            // Start a session and put the $emptyFields variable in there.
            StartSession();
            $_SESSION['contact-form-errors'] = $emptyFields;
            
            // Redirect the user to the same page to clear the $_POST request.
            RedirectRelative($_GET['page']);
        }

        // Send an email to gilsingguylian@gmail.com
        $firstname = $_POST['contact-firstname'];
        $lastname = $_POST['contact-lastname'];
        $email = $_POST['contact-email'];
        $subject = $_POST['contact-subject'];
    }
?>
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
            <input type="text" name="contact-firstname" id="contact-firstname">
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
            <input type="text" name="contact-lastname" id="contact-lastname">
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
            <input type="email" name="contact-email" id="contact-email">
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
            <input type="text" name="contact-subject" id="contact-subject">
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