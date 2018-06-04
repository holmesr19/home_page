<?php
if(isset($_POST['email'])) {
    // EDIT THE LINES BELOW AS REQUIRED BY YOUR FORM FIELDS
    $email_to = $_POST['email_to'];
    $email_subject = "Contact from website";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    // EDIT THE LINES BELOW AS REQUIRED BY YOUR FORM FIELDS
    $contact = $_POST['contact']; //required
    $email_from = $_POST['email']; // required
    $purpose = $_POST['purpose']; //required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
    // EDIT THE LINE BELOW AS REQUIRED BY YOUR FORM FIELDS
    $email_message = "Response from Home Page.\n\n";
 
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
 
    // EDIT THE LINES BELOW AS REQUIRED BY YOUR FORM FIELDS
    $email_message .= "Name:\t\t\t".clean_string($contact)."\n";
    $email_message .= "Email:\t\t\t".clean_string($email_from)."\n";
    $email_message .= "Purpose:\t\t".clean_string($purpose)."\n";
    $email_message .= "Message:\t\t".clean_string($message)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
 
    // THIS IS THE MESSAGE THAT WILL APPEAR TO THE USER IN THE BROWSER AFTER SUBMITTING THE FORM
    echo "<h1>Mail sent! Check your inbox.</h1>";
} else {
    echo "Come on...post some variables already!";
}
?>