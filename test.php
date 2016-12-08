<?php
require_once ('vendor/autoload.php');
require_once ('vendor/swiftmailer/swiftmailer/lib/swift_required.php');


$transporter = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
    ->setUsername('smn.vancouver')
    ->getPassword('comp3975SMNam');

$message = \Swift_Message::newInstance($transporter);
$message -> setTo(array("info@sell-my-notes.com" => "Info SMN"));

$message -> setSubject("This is a test email");
$message -> setBody("This is the body of that test email");
$message -> setFrom ("arnold@me.com", "Your friend");

$mailer = \Swift_Mailer::newInstance($transporter);
$mailer->send($message);