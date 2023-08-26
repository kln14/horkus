<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   // echo '<script>alert("Invalid!")</script>';
  http_response_code(500);
  exit();
}

// PHP program to pop an alert
// message box on the screen

// Display the alert box
//echo '<script>alert("Welcome to Geeks for Geeks")</script>';


ini_set( 'display_errors', 1 );
//ini_set("SMTP","mymail.brinkster.com");
//ini_set('smtp_port', "2525");587
ini_set("SMTP","smtp.gmail.com");
ini_set('smtp_port', "465");
ini_set('sendmail_from', "admin@horkusconstruction.com");
ini_set('auth_uername', "admin@horkusconstruction.com");
ini_set('auth_password', "horkuscpwd@1");

error_reporting( E_ALL );

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "admin@horkusconstruction.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
//$header .= "Reply-To: $email";


$from = '$email';
$to = 'admin@horkusconstruction.com"';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'admin@horkusconstruction.com',
        'password' => 'horkuscpwd@1'
    ));

$mail = $smtp->send($to, $headers, $body);

if(!$smtp->send($to, $headers, $body))
  http_response_code(500);
//if(!mail($to, $subject, $body, $header))
  //http_response_code(500);

?>
