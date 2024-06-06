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


if (isset($_POST['sell'])) {
    
    $book_name =  $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $price = $_POST['price'];
    $book_des = $_POST['book_des'];
    $image_name = $_FILES["abc"]["name"];
    $seller_email = $_POST[ 'seller_email' ];

    move_uploaded_file($_FILES["abc"]["tmp_name"],"images\\".$_FILES["abc"]["name"]);

    
    $sql = "INSERT INTO sell_book (b_name, a_name,b_price, b_des, img_name, seller_email) VALUES (?, ?, ?, ?, ?, ?) ";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssss", $book_name, $author_name, $price, $book_des, $image_name, $seller_email);

        
        if ($stmt->execute()) {
            header('location:index.php');
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



