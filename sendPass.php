<?php

include("authentication.php");
include("database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_GET['action']) && $_GET['action'] == 'sendPass') {
    $id = $_GET['id'];

    $sql = "
    SELECT * 
    FROM forget_password
    WHERE forgetPassID = '" . $id . "'
    ";


    $result = $conn->query($sql);
    if (!$result) {
        echo "wrong sql command";
        exit;
    }



    $memberForgetPass = $result->fetch_assoc();

    try {
        //Server setting
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTp server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'akoreanup@gmail.com'; //SMTP username
        $mail->Password = "bajw tcpv vuhc eeuj"; //SMTP password
        // gmail password :: 1qazxsw2
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_START
        $mail->SMTPSecure = "ssl";

        //Recipients
        $mail->setFrom('akoreanup@gmail.com', 'Admin KoreanUp');
        $mail->addAddress($memberForgetPass['email'], 'Send Email'); //add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Confirm Password'; //Set email format to HTML
        $mail->Body = 'This is your confirm password: ' . $memberForgetPass['confirmPass'];

        $mail->send();
        header("location: memberForgetPass.php");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>