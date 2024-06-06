<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 
session_start();
$uname = $_SESSION['loggedin'];
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['rating']) && isset($_POST['comment'])) {
    // Get form data
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Prepare and bind SQL statement
    $sql = "INSERT INTO reviews (uname, rating, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss",$uname, $rating, $comment);
        
        // Execute SQL statement
        if ($stmt->execute()) {
            
            $stmt->close();
            $conn->close();

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
            title: "Successfully completed!",
            text: "thank you for rating it is has been send successfully  !",
            icon: "success",
            }).then(function() {
                window.location = "show_feedbacks.php";
            });
        </script>
        
            </body>
            </html>
            ';
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Prepare statement failed.";
    }
} else {
    echo "Incomplete form submission.";
}

?>
