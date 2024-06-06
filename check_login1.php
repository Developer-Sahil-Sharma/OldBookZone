<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    echo '<!doctype html>
    <html lang="en">
        <head>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="text-center">
                    <p>Please login or sign up to continue:</p>
                    <button
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#loginModal"
                    ><!---data-target="#loginModal"--->
                        Login
                    </button>
                    <button
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#signupModal"
                    >
                        SignUp
                    </button>
                </div>
            </div>
            <!-- Rest of your code goes here -->
              
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
                />
                <small id="emailHelp" class="form-text text-muted"
                  >We will never share your email with anyone else.</small
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
                      showPasswordButton.innerHTML = `<i class="fas fa-eye-slash"></i>`;
                    } else {
                      passwordField.type = "password";
                      showPasswordButton.innerHTML = `<i class="fas fa-eye"></i>`;
                    }
                  });
              </script>
              <div class="form-group">
                <a href="forgot_password.html">Forgot password?</a>
              </div>

              <button type="submit" class="btn btn-primary">
                Login
                
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
            showPasswordButton.innerHTML = `<i class="fas fa-eye-slash"></i>`;
        } else {
            passwordField.type = "password";
            showPasswordButton.innerHTML = `<i class="fas fa-eye"></i>`;
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
 
        </body>
    </html>';
} else {
    header('Location: selll.php');
}
?>
