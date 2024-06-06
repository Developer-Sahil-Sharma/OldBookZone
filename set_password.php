<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();
if(isset($_SESSION['session_email'])) {
    $email = $_SESSION['session_email'];
} else {
    echo "Session email not set.";
    exit;
}

$pass1 = $_POST['pass1']; 


$sql = "UPDATE signup SET conpass='$pass1' WHERE emails='$email'";

if ($conn->query($sql) === TRUE) {
    echo "Password for user '$email' has been successfully updated.";
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
    title: "Updated !",
    text: "Password has been change successfully !",
    icon: "success",
    }).then(function() {
        window.location = "index.php";
    });
</script>

    </body>
    </html>
    ';
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
