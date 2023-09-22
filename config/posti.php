<?php

$pins = "pins.php";
if (!file_exists($pins)) {
    define('EMAIL_PORT', getenv('EMAIL_PORT'));
    define('EMAIL_HOST', getenv('EMAIL_HOST'));
    define('EMAIL_USERNAME', getenv('EMAIL_USERNAME'));
    define('EMAIL_PASSWORD', getenv('EMAIL_PASSWORD'));
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

function posti($email_to_name, $email_to, $email_from_name, $email_from,  $email_subject, $email_msg)
{
    $emailFrom = $email_from;
    $emailFromName = $email_from_name;
    $emailToName = $email_to_name;
    try {
        $mail = new PHPMailer();
        $mail->Timeout = 10;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = EMAIL_PORT;
        $mail->Host = EMAIL_HOST;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->SMTPSecure = 'tls';
        $mail->setFrom($emailFrom, $emailFromName);
        $mail->addAddress($email_to, $emailToName);
        $mail->Subject = $email_subject;
        $mail->msgHTML($email_msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        // $max_execution_time = ini_get('max_execution_time'); 
        // set_time_limit(0);    
        // ini_set('max_execution_time',10); 
        if (!$tulos = $mail->send()) {
            //$tulos = false;
            debugger("Viestiä ei lähetetty: " . $mail->ErrorInfo);
        } else {
            //$tulos = true;
            debugger("Viesti lähetetty: $email_to!");
        }
        // set_time_limit($max_execution_time); 
    } catch (Exception $e) {
        $tulos = false;
        debugger(__FUNCTION__ . ',' . $e->errorMessage());
        debugger(__FUNCTION__ . ',', $e->getMessage());
    }

    return $tulos;
}
