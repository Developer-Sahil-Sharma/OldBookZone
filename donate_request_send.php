
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="Website Icon" type="png" href="oldbookzone-favicon-color.png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Welcome to iCoder. A blog for coding enthusiasts" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Sell or Buy Old books</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="oldbookzone-high-resolution-logo-white-transparent.png" alt="" style="max-height: 25px;" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-4">
        <?php
 $servername = "localhost";
 $username = "root"; 
 $password = ""; 
 $database = "books"; 

 // Create connection
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 $id = $_GET['bookId'];
 // SQL query to select all data
 $sql = "SELECT * FROM donate_book where ID=$id";
 $result = $conn->query($sql);

 // Check if any rows are returned
 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bname = $row["b_name"];
        $aname = $row["a_name"];
        $bdes = $row["b_des"];
        $donaters_emails = $row["donater_email"];
        $imgname = $row["img_name"];
        
    }
 } else {
    echo "0 results";
}

// Close connection
$conn->close();
    
                echo '<div class="row mb-2">';
                echo '<div class="col-md-6">';
                echo '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                echo '<div class="col p-4 d-flex flex-column position-static">';
                echo '<strong class="d-inline-block mb-2 text-primary">'.$bname.'</strong>';
                echo '<p class="card-text mb-auto">Author Name: '.$aname.'</p>';
                echo '<p class="card-text mb-auto">'.$bdes.'</p>';
                echo $donaters_emails;
                echo '</div>';
                echo '<div class="col-auto d-none d-lg-block">';
                echo '<img class="bd-placeholder-img" width="200" height="250" src="images/'.$imgname.'" alt="" />';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
 ?>
    </div>
    <div class="container my-4">
      <h2>Send request to Donater</h2>
      <form  method="post" >
        <div class="form-group">
          <label>Full Name</label>
          <input
            type="text"
            class="form-control"
            name="buyname"
            placeholder="john doe"
            required
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Phone Number</label>
          <input
            type="phone"
            class="form-control"
            name="buyno"
            placeholder="+91 "
            maxlength="10"
            required
          />
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Message for Seller</label>
          <textarea class="form-control" name="buymsg" rows="3" required>I'm interested on your book. Is this book available? so please contact me </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea2">Email</label>
          <input
            type="email"
            class="form-control"
            name="buyemail"
            placeholder="john@gmail.com"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary" name="send_mail">
          Submit
        </button>
      </form>
    </div>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2024 OldBookZone, inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send_mail'])) {
    $buy_name = $_POST["buyname"];
    $buy_no = $_POST["buyno"];
    $buy_msg = $_POST["buymsg"];
    $buy_email = $_POST["buyemail"];

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
            $mail->addAddress($donaters_emails, 'OldBookZone'); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Book Donating Request from OldBookZone';
            $mail->Body = "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Book Inquiry</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
    }
    p {
        margin-bottom: 15px;
        line-height: 1.6;
    }
    strong {
        color: #007bff;
    }
    .footer {
        margin-top: 20px;
        text-align: center;
    }
</style>
</head>
<body>

<div class='container'>
    <h2>Book Inquiry</h2>
    <p>Dear sir/ma'am,</p>
    <p>Your Donated book <strong>$bname</strong> is want to be take by:</p>
    <ul>
        <li><strong>Name:</strong> $buy_name</li>
        <li><strong>Phone no:</strong> $buy_no</li>
        <li><strong>Email:</strong> $buy_email</li>
    </ul>
    <p><strong>Message for you from someone:</strong> $buy_msg</p>
    <p>Please contact this person at your earliest convenience.</p>
</div>
<div class='footer'>
    <p>Thank you for your attention.</p>
</div>

</body>
</html>";




            $mail->send();
            echo '<!DOCTYPE html>
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
            title: "Requast sent!",
            text: "Wait for donators reply!",
            icon: "success",
            }).then(function() {
                window.location = "get_donate.php";
            });
        </script>
        
            </body>
            </html>
            ';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>