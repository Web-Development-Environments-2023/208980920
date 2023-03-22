$to = "abrahamt@post.bgu.ac.il";
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
if(mail($to, $subject, $body, $headers)) {
  echo "Thank you for your message!";
} else {
  echo "There was a problem sending your message. Please try again later.";
}
