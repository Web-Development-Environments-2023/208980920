<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $email = $_POST['email'];
  $message = $_POST['message'];
  $smiley = $_POST['smiley'];

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_message = 'Please enter a valid email address.';
  }

  // Validate message
  if (empty($message)) {
    $error_message = 'Please enter a message.';
  }

  // If there are no errors, send email
  if (empty($error_message)) {

    // Set recipient email address
    $to = 'abrahamt@post.bgu.ac.il';

    // Set email subject
    $subject = 'New message from contact form';

    // Set email message
    $email_message = "From: $email\n\n";
    $email_message .= "Message:\n$message\n\n";
    $email_message .= "Smiley: $smiley";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
      $success_message = 'Your message has been sent.';
    } else {
      $error_message = 'There was a problem sending your message. Please try again.';
    }
  }
}

?>

<!-- PHP code to display success or error message -->
<?php if (!empty($success_message)) { ?>
  <p class="success"><?php echo $success_message; ?></p>
<?php } ?>
<?php if (!empty($error_message)) { ?>
  <p class="error"><?php echo $error_message; ?></p>
<?php } ?>
