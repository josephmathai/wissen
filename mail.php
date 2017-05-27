<?php

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "vvishnuraj58@gmail.com";
$mail->FromName = "Vishnuraj V";

//To address and name
$mail->addAddress("contactus@wissen.com", "Wissen");

//Address to which recipient will reply
$mail->addReplyTo("vvishnuraj58@gmail.com", "Reply");

//CC and BCC

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}