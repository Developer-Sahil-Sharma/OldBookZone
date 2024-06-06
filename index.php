<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Welcome to OldBookZOne. But Or Sell Old Books"
    />

    <!-- Bootstrap CSS -->
    <link rel="Website Icon" type="png" href="oldbookzone-favicon-color.png">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />

    <!-- Font Awesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="scrollbar.css">

    <title>Sell or Buy Old books</title>
  </head>

  <body>
    <!-- Your HTML content here -->

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
          <li class="nav-item active">
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only"></span
            ></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        
        <?php
         if(!isset($_SESSION["loggedin"])) {
          echo '<div class="mx-2">
          <button
          class="btn btn-danger"
          data-toggle="modal"
          data-target="#loginModal"
          id="btn1"
        ><!---data-target="#loginModal"--->
          Login
        </button>
        <button
          class="btn btn-danger"
          data-toggle="modal"
          data-target="#signupModal"
          id="btn2"
        >
          SignUp
        </button>
        </div>';  // hide login button and show logout button
         }else{
          echo '<div class="mx-2">
          <button
          data-toggle="modal"
          data-target="#logoutModal"
          class="btn btn-danger"
          id="btn3"
        >
          Logout
        </button>
        </div>';   //hide logout button and show login button

         }

        ?>
      </div>
    </nav>

    <!-- logout popup -->

    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="logoutModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Are you sure for Logout?
            </h5>
          </div>
          <div class="modal-body text-center">
          
            <a href="logout.php"><button type="Logout" id="logout" class="btn btn-danger">Logout</button></a>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
          
        </div>
      </div>
    </div>
     

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="loginModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Login to OldBookZone
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  required
                />
                <small id="emailHelp" class="form-text text-muted"
                  >We'll never share your email with anyone else.</small
                >
              </div>
              <!-- Add Font Awesome CDN -->
              <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
              />
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <div class="input-group">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    required
                  />
                  <div class="input-group-append">
                    <button
                      class="btn btn-outline-secondary"
                      type="button"
                      id="showPasswordToggle"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>

              <script>
                document
                  .getElementById("showPasswordToggle")
                  .addEventListener("click", function () {
                    var passwordField = document.getElementById(
                      "exampleInputPassword1"
                    );
                    var showPasswordButton =
                      document.getElementById("showPasswordToggle");

                    if (passwordField.type === "password") {
                      passwordField.type = "text";
                      showPasswordButton.innerHTML =
                        '<i class="fas fa-eye-slash"></i>';
                    } else {
                      passwordField.type = "password";
                      showPasswordButton.innerHTML =
                        '<i class="fas fa-eye"></i>';
                    }
                  });
              </script>
              <div class="form-group">
                <a href="forgot_password.html">Forgot password?</a>
              </div>

              <button type="submit" id="bbttnn" class="btn btn-primary" onclick="login_handle()">
                Login
                <!--<script>
                  swal({
                      title: "Good Job!",
                      text: "Login successful!",
                      icon: "success",
                  }).then(function() {
                      window.location = "index.html";
                  });
              </script>-->
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sign Up Modal -->
    <div
      class="modal fade"
      id="signupModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="signupModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Get an OldBookZone Account
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="form.php" method="post" onsubmit="return validateForm()">
<div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                        <small id="emailError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <div class="input-group">
                            <input type="password" id="password1" class="form-control" name="passw" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="showPasswordToggle1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <small id="passwordError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="password2" class="form-control" name="cpassw" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="showPasswordToggle2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <small id="password2Error" class="form-text text-danger"></small>
                    </div>

                    <button type="submit" class="btn btn-primary" name="sign" >Create Account</button>
              </form>
          </div>

          <script>
    // Function to toggle password visibility
    function togglePasswordVisibility(inputId, buttonId) {
        var passwordField = document.getElementById(inputId);
        var showPasswordButton = document.getElementById(buttonId);

        // Toggle password visibility
        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.type = "password";
            showPasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }

    // Event listener for the first password toggle button
    document.getElementById("showPasswordToggle1").addEventListener("click", function () {
        togglePasswordVisibility("password1", "showPasswordToggle1");
    });

    // Event listener for the second password toggle button
    document.getElementById("showPasswordToggle2").addEventListener("click", function () {
        togglePasswordVisibility("password2", "showPasswordToggle2");
    });
</script>


          <script>
            function validateForm() {
    var email = document.getElementById("email").value;
    var password1 = document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var password2Error = document.getElementById("password2Error");
    var valid = true;

    emailError.textContent = "";
    passwordError.textContent = "";
    password2Error.textContent = "";

    // Email validation
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        emailError.textContent = "Invalid email address";
        valid = false;
    }

    // Password validation
    if (password1.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long";
        valid = false;
    }

    // Confirm password validation
    if (password1 !== password2) {
        password2Error.textContent = "Passwords do not match";
        valid = false;
    }

    return valid;
}

            
          </script>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      id="carouselExampleCaptions"
      class="carousel slide carousel-fade"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleCaptions"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="22.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h2 style="color: black">Welcome to OldBookZone</h2>
            <p style="color: black">You can Sell or Buy Old books here.</p>
            <a href="check_login.php" ><button type="submit" class="btn btn-danger">Buy Books</button></a>
            <a href="check_login1.php"><button class="btn btn-primary">Sell Books</button></a>
            <a href="donate.html"><button class="btn btn-success" >Donate Books</button></a>
            <a href="get_donate.php"><button class="btn btn-warning" >Donated book</button></a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="33.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h2 style="color: black">The Best Books Zone</h2>
            <p>You can Sell or Buy Old books here.</p>
            <a href="check_login.php"><button class="btn btn-danger">Buy Books</button></a>
            <a href="check_login1.php"><button class="btn btn-primary">Sell Books</button></a>
            <a href="donate.html"><button class="btn btn-success">Donate Books</button></a>
            <a href="get_donate.php"><button class="btn btn-warning" >Donated book</button></a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="44.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h2 style="color: black">Just like library</h2>
            <p style="color: black">You can Sell or Buy Old books here.</p>
            <a href="check_login.php"><button class="btn btn-danger">Buy Books</button></a>
            <a href="check_login1.php"><button class="btn btn-primary">Sell Books</button></a>
            <a href="donate.html"><button class="btn btn-success">Donate Books</button></a>
            <a href="get_donate.php"><button class="btn btn-warning" >Donated book</button></a>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container my-4">
      <div class="row mb-2">
        <div class="col-md-6">
          <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">BUY</strong>
              <h3 class="mb-0" style="font-size: 20px">
                Embark on Limitless Journeys
              </h3>
              <p class="card-text mb-auto">
                Each Book Purchase Unlocks Countless Journeys.
              </p>
              <a href="check_login.php" class="stretched-link"></a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img
                class="bd-placeholder-img"
                width="200"
                height="250"
                src="buy.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Sell</strong>
              <h3 class="mb-0" style="font-size: 20px">Empower Your Sales</h3>
              <p class="mb-auto">
                "Empower sales by fostering literary connections through each
                offered book, enriching readers' lives and fueling their passion
                for literature
              </p>
              <a href="check_login1.php" class="stretched-link"></a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img
                class="bd-placeholder-img"
                width="200"
                height="250"
                src="sell_image.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-danger"
                >Book Donate</strong
              >
              <h3 class="mb-0" style="font-size: 20px">
                Share the gift of knowledge
              </h3>
              <p class="card-text mb-auto">
                "Unlock minds with the power of books: donate and inspire
                lifelong learning
              </p>
              <a href="donate.html" class="stretched-link"></a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img
                class="bd-placeholder-img"
                width="200"
                height="250"
                src="donate_image.jpeg"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-warning">Donated Books</strong>
              <p class="mb-auto">
              "The greatest gift is the passion for reading.
               It is cheap, it consoles, it distracts, 
               it excites, it gives you knowledge of the world and experience
                of a wide kind. It is a moral illumination.
              </p>
              <a href="get_donate.php" class="stretched-link"></a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img
                class="bd-placeholder-img"
                width="200"
                height="250"
                src="donors.webp"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-warning">Thank You</strong>
              <p class="mb-auto">
                Thank you for visiting my OldBookZone website! Your interest and
                support mean a lot to me. If you have any questions or feedback,
                feel free to reach out. Happy browsing and reading!
              </p>
              <a href="feedback.php" class="stretched-link">feedback</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img
                class="bd-placeholder-img"
                width="200"
                height="250"
                src="thank_image.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>
        © 2024 OldBookZone, inc. · <a href="porivacy.html">Privacy</a> ·
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
    <script>
      session =  "<?php echo $session1?>";
      if (session == true) 
      {
        const login_handle= ()=>{
        if(localStorage.getItem('user')=='true'){
          ptr.innerHTML = '<button class="btn btn-danger" id="btn1"> Log out </button>';
          localStorage.setItem( 'user', false);
        }
      }
      } 
      else{
        localStorage.setItem("user", true);
        ptr.innerHTML='<button class="btn btn-danger" data-toggle="modal" data-target="#loginModal" id="btn1"> Login</button> <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal" id="btn2"> SignUp</button>';
      }
    



    </script>
  </body>
</html>