<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['sign'])) {
    
    $email =  $_POST['email'];
    $conpass = $_POST['cpassw'];


    
    $sql = "INSERT INTO signup (emails, conpass) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ss", $email, $conpass);

            if ($stmt->execute()) {
                session_start();
        $_SESSION["loggedin"]= $email;
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
        title: "Good job!",
        text: "sign in successful!",
        icon: "success",
        }).then(function() {
            window.location = "index.php";
        });
    </script>
    
        </body>
        </html>
        ';
     
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
             $stmt->close();
    } else {
                echo "Prepare statement failed.";
    }
}


$conn->close();
?>
