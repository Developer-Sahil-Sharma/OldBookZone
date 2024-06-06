<?php
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    session_start();
    $emails = $_SESSION['session_email'] = $_POST['email'];
    $optsend = $_SESSION['otp'] = rand(000000, 999999);

    $email = $conn->real_escape_string($emails);

    $sql = "SELECT * FROM signup WHERE emails='$emails'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP(); //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth   = true; //Enable SMTP authentication
            $mail->Username   = 'oldbookzone@gmail.com'; //SMTP username
            $mail->Password   = 'gvxrmrceulcuyecb'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('oldbookzone@gmail.com', 'OldBookZone');
            $mail->addAddress($emails, 'OldBookZone'); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'OTP';
            $mail->Body    = "Dear sir/ma'am, <br> Your One Time Password (OTP) is :- <b>$optsend</b> <br> Do not share your OTP with anyone including your depository participant(DP).";

            $mail->send();
            echo 'Message has been sent';
            header('Location: otp.html');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Use SweetAlert for showing the error message
        echo '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
                swal({
                    title: "Email does not exist!",
                    text: "Login successful!",
                    icon: "success",
                }).then(function() {
                    window.location = "index.html";
                });
            </script>';
    }
}
?>
