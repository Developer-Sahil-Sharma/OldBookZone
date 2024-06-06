<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    header( "Location: check_login1.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="Website Icon" type="png" href="oldbookzone-favicon-color.png">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <title>Sell or Buy Old books</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img src="oldbookzone-high-resolution-logo-white-transparent.png" alt="" style="max-height: 25px;" /></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only">(current)</span></a
            >
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
      <h2>Sell Book</h2>
      <form action="sell.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Book Name</label>
          <input
            type="text"
            class="form-control"
            name="book_name"
            placeholder="Rich Dad Poor Dad"
            required
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Author Name</label>
          <input
            type="text"
            class="form-control"
            name="author_name"
            placeholder="Robert Kiyosaki"
            required
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Price</label>
          <input
            type="number"
            class="form-control"
            name="price"
            placeholder="₹"
            required
          />
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description of Book</label>
          <textarea class="form-control" name="book_des" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Uplode Image:</label><br />
          <input type="file" id="abc" name="abc" required/> <br /><br />
        </div>
        

        <div class="form-group">
          <label for="exampleFormControlTextarea2">Email of Seller</label>
          <input
            type="email"
            class="form-control"
            name="seller_email"
            placeholder="john@gmail.com"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary" name="sell">
          Submit
        </button>
      </form>
    </div>

    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>
        © 2024 OldBookZone, Inc. · <a href="#">Privacy</a> ·
        <a href="#">Terms</a>
      </p>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
