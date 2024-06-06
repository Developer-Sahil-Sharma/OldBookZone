<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Sanitize user input to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM signup WHERE emails='$email' AND conpass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
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
        text: "Login successful!",
        icon: "success",
        }).then(function() {
            window.location = "index.php";
        });
    </script>
    
        </body>
        </html>
        ';
     
      
        exit; 
    } else {
        // Login failed
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
            title: "Oops...",
            text: "Invalid email or password!",
            icon: "error",
        }).then(function() {
            window.location = "index.php";
        });
    </script>
   
        </body>
        </html>
        ';
    
    }
}


$conn->close();
?>
