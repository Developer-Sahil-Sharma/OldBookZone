<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    header( "Location: check_login.php");
}
?>


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
            <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-2" type="search" name="search_value" placeholder="Search" aria-label="Search" required/>
                <button class="btn btn-outline-success my-2 my-sm-0" name="search_submit" id="hideButton" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container my-4">
      
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

        if (isset($_POST['search_submit'])) {
            $search = $conn->real_escape_string($_POST['search_value']);
            $sqll = "SELECT * FROM donate_book WHERE b_name LIKE '%$search%' OR a_name LIKE '%$search%'";
            $resultt = $conn->query($sqll);

            if ($resultt->num_rows > 0) {
            while($rows = $resultt->fetch_assoc()) {

                echo '<div id="show_book" style="display: block; class="row mb-2">';
                echo '<div class="col-md-6">';
                echo '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                echo '<div class="col p-4 d-flex flex-column position-static">';
                echo '<p class="card-text mb-auto d-none">'.$rows["ID"].'</p>';
                echo '<strong class="d-inline-block mb-2 text-primary">'.$rows["b_name"].'</strong>';
                echo '<p class="card-text mb-auto">Author Name: '.$rows["a_name"].'</p>';
                echo '<p class="card-text mb-auto">'.$rows["b_des"].'</p>';
                //echo '<a href="buy_request_send.php" class="stretched-link" onclick="redirectToBuyRequest(\'' . $row["ID"] . '\')">'.$row["seller_email"].'</a>';
                echo "<a href=\"donate_request_send.php?bookId=" . $rows["ID"] . "\" class=\"stretched-link\">" . $rows["donater_email"] . "</a>";
                echo '</div>';
                echo '<div class="col-auto d-none d-lg-block">';
                echo '<img class="bd-placeholder-img" width="200" height="250" src="images/'.$rows["img_name"].'" alt="" />';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';            
            }
        }

        }
        else{
            $sql = "SELECT * FROM donate_book";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo '<div id="show_book" style="display: block; class="row mb-2">';
                echo '<div class="col-md-6">';
                echo '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                echo '<div class="col p-4 d-flex flex-column position-static">';
                echo '<p class="card-text mb-auto d-none">'.$row["ID"].'</p>';
                echo '<strong class="d-inline-block mb-2 text-primary">'.$row["b_name"].'</strong>';
                echo '<p class="card-text mb-auto">Author Name: '.$row["a_name"].'</p>';
                echo '<p class="card-text mb-auto">'.$row["b_des"].'</p>';
                //echo '<a href="buy_request_send.php" class="stretched-link" onclick="redirectToBuyRequest(\'' . $row["ID"] . '\')">'.$row["seller_email"].'</a>';
                echo "<a href=\"donate_request_send.php?bookId=" . $row["ID"] . "\" class=\"stretched-link\">" . $row["donater_email"] . "</a>";
                echo '</div>';
                echo '<div class="col-auto d-none d-lg-block">';
                echo '<img class="bd-placeholder-img" width="200" height="250" src="images/'.$row["img_name"].'" alt="" />';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';            
            }
        } else {
            echo "0 results";
        }

        }
    
        
        ?>

    </div>

    

   






    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2024 OldBookZone, inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <script>
            
            document.getElementById("hideButton").addEventListener("click", function() {
            let nodeList = document.querySelectorAll('#show_book');
            let i=0;
            for (var index = 0; index < nodeList.length; index++) {
                      //alert(nodeList[index]);
                    nodeList[index].style.display="none";
                }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
