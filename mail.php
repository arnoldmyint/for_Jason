<?php
require_once ('vendor/autoload.php');
require_once ('vendor/swiftmailer/swiftmailer/lib/swift_required.php');

$transporter = new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl');
$transporter   ->setUsername('mtmtpaul@gmail.com');
$transporter   ->setPassword('paul123456');
$message = new Swift_Message($transporter);
$message->setTo(array(
    "blinkmonster@hotmail.com" => "aa"
));
$message->setSubject("This email is sent using Swift Mailer");
$message->setBody("I hate composer, i hate bcit");
$message->setFrom("mtmtpaul@gmail.com","Your Instructor");

$mailer = new Swift_Mailer($transporter);
$mailer->send($message);