<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->CharSet    = "utf-8";
$mail->Host       = 'SMTP';
$mail->SMTPAuth   = true;
$mail->Username   = 'MyEmail@mail.com';
$mail->Password   = 'Password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
$mail->SMTPDebug  = SMTP::DEBUG_OFF;
$mail->setFrom('MyEmail@mail.com', 'SA-MP Server');
$mail->isHTML(true);
$mail->Subject = 'Welcome to our server~';
if (isset($_GET['mail']) && isset($_GET['number']) && isset($_GET['name']))
{
    $mail->addAddress($_GET['mail'], mb_convert_encoding($_GET['name'], "UTF-8","auto"));
    $mail->Body = 'Dear' . mb_convert_encoding($_GET['name'], "UTF-8","auto") . '，<h1>Welcome</h1>!Your code is here:' .$_GET['number'];
    $mail->AltBody = 'Dear' . mb_convert_encoding($_GET['name'], "UTF-8","auto") . 'Welcome!Your code is here:' .$_GET['number'];
    if (!$mail->send())
    {
        echo 'ERROR:' . $mail->ErrorInfo;
    } 
    else 
    {
        echo 1;
    }
}