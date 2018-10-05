<?php
 require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail@gmail.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mail@gmail.com', 'Shruti');
$mail->addAddress('mail@gmail.com');     // Add a recipient
          // Name is optional
$mail->addReplyTo('mail@gmail.com');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'PHP Mailer';
$mail->Body= '<h3>This is the HTML message body</h3><a href="http://localhost/biotics/resetpassword.php?email=$femail&token=$token">http://localhost/biotics/resetpassword.php?email=$femail&token=$token</a>';

echo !extension_loaded('openssl')?"Not Available":"Available";
$mail->SMTPKeepAlive = true; 


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}