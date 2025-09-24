<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$nom = '';
//....

    $mail = new PHPMailer(true); 
    try {
        $mail->SMTPOptions = array(
            'ssl' => array(    
                'verify_peer' => false,  
                'verify_peer_name' => false, 
                'allow_self_signed' => true  
            )
        );

        $mail->SMTPDebug = 0; 
        $mail->isSMTP();
        $mail->Host       = //host
        $mail->SMTPAuth   = true;
   
        $mail->Username   = 'xxx@gmail.com'; 
        $mail->Password   = 'xxxxx'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = //port

        $mail->setFrom($email, $nom); 
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $assumpte;
        $mail->Body    = $cosmissatge;


        $mail->send();
        echo "<script>alert('ENVIAT CORRECTAMENT')</script>";

    } catch (Exception $e) {
        return false;
    }