<?php
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $query = $_POST['query'];
    $seller = isset($_POST['seller']) ? 'Yes' : 'No';
    $buyer = isset($_POST['buyer']) ? 'Yes' : 'No';
    $other = isset($_POST['other']) ? 'Yes' : 'No';
    $about = $_POST['about'];
    $concern = $_POST['concern'];

    $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP(); //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth   = true; //Enable SMTP authentication
            $mail->Username   = 'oldbookzone@gmail.com'; //SMTP username
            $mail->Password   = 'gvxrmrceulcuyecb'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('oldbookzone@gmail.com', 'OldBookZone');
            $mail->addAddress('sahilsharma93939@gmail.com', 'OldBookZone'); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Contact';
            $mail->Body    = "<!DOCTYPE html>
            <html lang='en'>
            <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Email Template</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    background-color: #f4f4f4;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                }
                h2 {
                    color: #333;
                    margin-bottom: 20px;
                }
                p {
                    margin-bottom: 10px;
                }
                .email-details {
                    margin-bottom: 30px;
                }
                .email-details h3 {
                    color: #666;
                }
            </style>
            </head>
            <body>
                <div class='container'>
                    <div class='email-details'>
                        <h3>Dear Sahil Sharma,</h3>
                        <p>This person wants to contact you:</p>
                        <p>Email: $email </p>
                        <p>Query: $query</p>
                        <p>Seller: $seller</p>
                        <p>Buyer: $buyer</p>
                        <p>Other: $other</p>
                        <p>About: $about</p>
                        <p>Concern: $concern</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
       
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
            <script>
            swal({
            title: "Contact Requast sent!",
            text: "The admin will contact you soon!",
            icon: "success",
            }).then(function() {
                window.location = "index.php";
            });
        </script>
        
            </body>
            </html>
            ';
            
      
        exit; // Terminate script execution after redirection
    
} else {
    // If someone tries to access this page directly without submitting the form,
    // you can redirect them back to the contact page or do something else.
    
    echo "contact failed......";
    exit();
}
?>
