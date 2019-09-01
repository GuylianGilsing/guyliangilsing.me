<?php
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

            RedirectRelative($_GET['page']);
        }
        else
        {
            // Send an email to gilsingguylian@gmail.com
            $firstname = $_POST['contact-firstname'];
            $lastname = $_POST['contact-lastname'];
            $email = $_POST['contact-email'];
            $subject = $_POST['contact-subject'];

            $headers =  "MIME-Version: 1.0\r\n".
                        "Content-type: text/html; charset=utf-8\r\n".
                        "To: gilsingguylian@gmail.com\r\n".
                        "From: ".$email."\r\n";

            $message =  "Firstname: ".$firstname."<br/>\r\n".
                        "Lastname: ".$lastname."<br/>\r\n".
                        "email: ".$email."<br/>\r\n";

            if(empty($_POST['contact-message']) == false)
                $message .= "Message: ".$_POST['contact-message'];
            else
                $message .= "Message: No message added.";

            if(mail("gilsingguylian@gmail.com", $subject, $message, "From: ".$email))
                RedirectRelative('/mail/success');
            else
                RedirectRelative('/mail/failed');
        }

    }
?>