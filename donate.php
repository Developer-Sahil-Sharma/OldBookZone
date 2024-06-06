<?php

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "books"; 

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['donate'])) {
    
    $book_name =  $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $book_des = $_POST['book_des'];
    $image_name = $_FILES["images_name"]["name"];
    $seller_email = $_POST[ 'seller_email' ];

    move_uploaded_file($_FILES["images_name"]["tmp_name"],"images\\".$_FILES["images_name"]["name"]);

    
    $sql = "INSERT INTO donate_book (b_name, a_name, b_des, img_name, donater_email) VALUES (?, ?, ?, ?, ?) ";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssss", $book_name, $author_name, $book_des, $image_name, $seller_email);

        
        if ($stmt->execute()) { 
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
            title: "Thank you !",
            text: "For being part of OldBookZone !",
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


// Close connection
$conn->close();
?>



