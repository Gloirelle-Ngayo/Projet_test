<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = $affiche1;   //email
$mail->Password = 'xlyfyquaxnrpdntt';   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";


//sender information
$mail->setFrom($affiche1, "Ngayo");

//receiver address and name
$mail->addAddress($affiche2);
$mail->isHTML(true);

$mail->Subject = $affiche3;
$mail->Body = $affiche4;
// Send mail   
try {
    $mail->send();
    echo 'Message has been sent.';
} catch (Exception $e) {
    echo 'Email not sent an error was encountered: ' . $e->getMessage();
}

$mail->smtpClose();

