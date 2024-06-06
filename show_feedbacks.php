<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .review {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .review h4 {
            margin-top: 0;
            color: #333;
        }
        .stars {
            font-size: 24px;
            color: #FFD700; /* Gold color for stars */
        }
        .comment {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        
<?php
// Database connection
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

// SQL query to select all data
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
// Generate stars
function generateStars($rating) {
    $stars = '';
    for ($i = 0; $i < $rating; $i++) {
        $stars .= '⭐';
    }
    return $stars;
}

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display book information
        echo '<div class="review">';
        echo '<h4>' . $row["uname"] . '</h4>';
        echo '<p>' . generateStars($row['rating']) . '</p>';
        echo '<p>' . $row['comment'] . '</p>';
        echo '</div>';
        echo '  ';
  
                      
    }
} else {
    echo "0 results";
}

// Close connection

?>
    </div>
</body>
</html>
