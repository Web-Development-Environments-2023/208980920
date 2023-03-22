<!-- $to = "abrahamt@post.bgu.ac.il";
$subject = "New form submission";
$headers = "From: webmaster@example.com\r\n";
$headers .= "Reply-To: ".$_POST["email"]."\r\n";
$headers .= "Content-type: text/html\r\n";
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$body = "<h2>New form submission</h2>";
$body .= "<p><strong>Name:</strong> ".$name."</p>";
$body .= "<p><strong>Email:</strong> ".$email."</p>";
$body .= "<p><strong>Message:</strong><br>".$message."</p>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message!";
    } else {
    echo "There was a problem sending your message. Please try again later.";
    }
}
else{
    echo "problem"
} -->

<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "abrahamt@post.bgu.ac.il";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";


    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>
