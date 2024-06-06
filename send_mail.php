<?php
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $buy_name = $_POST['buyname'];
    $buy_no = $_POST['buyno'];
    $buy_msg = $_POST['buymsg'];
    $buy_email = $_POST['buyemail'];

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP(); //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth   = true; //Enable SMTP authentication
            $mail->Username   = 'sahilsharma93685@gmail.com'; //SMTP username
            $mail->Password   = 'fxmrdccfhnfacqmz'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('sahilsharma93685@gmail.com', 'OldBookZone');
            $mail->addAddress('sahilsharma93939@gmail.com', 'OldBookZone'); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Book Buying Request from OldBookZone';
            $mail->Body    = "Dear sir/ma'am, <br> Your book rich dad poor dad :- want to buy this person name:-<strong> $buyname </strong><br> so please contect this person. Contact deatails of this person are given below<br> Name :- $buyname <br> Phone no :- $buyno <br> email :- $buyemail  <br> Message for you from buyer :- $buymsg   ";

            $mail->send();
            echo 'Message has been sent';
            header('Location: buy.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
   
?>
