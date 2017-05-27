<?php

require_once "vendor/autoload.php";
$resp = '';
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
    $resp = 'Please fill all fields.';
}

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  if($resp==''){
    $resp = "Please enter a valid email.";
  }
}

if($resp ==''){
    $mail = new PHPMailer;

    //From email address and name
    $mail->From = $email;
    $mail->FromName = $_POST['name'];

    //To address and name
    $mail->addAddress("contactus@wissen.com", "Wissen");

    //Address to which recipient will reply
    $mail->addReplyTo($email, "Reply");

    //CC and BCC

    //Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    $mail->AltBody = $_POST['message'];

    if(!$mail->send())
    {
        $resp = "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        $resp = "Message has been sent successfully";
    }
}
echo $resp;