<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the OTP digits from the form
    $digit1 = $_POST["digit1"];
    $digit2 = $_POST["digit2"];
    $digit3 = $_POST["digit3"];
    $digit4 = $_POST["digit4"];
    $digit5 = $_POST["digit5"];
    $digit6 = $_POST["digit6"];
    

    $otp = $digit1 . $digit2 . $digit3 . $digit4 . $digit5 . $digit6;

    session_start();
    $expected_otp = $_SESSION['otp']; 

        if ($otp == $expected_otp) {
            header("Location: set_password.html");
            exit();
        } else {
            $error_message = "Invalid OTP. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
          <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increased shadow */
        }

        .input-group {
            width: 50px;
            margin-right: 10px;
        }

        .form-control {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enter OTP</h5>
                        <form action="verify_otp.php" method="post">
                            <div class="form-row justify-content-center">
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit1" maxlength="1"
                                        required>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit2" maxlength="1"
                                        required>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit3" maxlength="1"
                                        required>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit4" maxlength="1"
                                        required>
                                </div>
                                <!-- Two additional input groups -->
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit5" maxlength="1"
                                        required>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control digit" name="digit6" maxlength="1"
                                        required>
                                </div>
                            </div>
                            <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.querySelectorAll('.digit').forEach(item => {
        item.addEventListener('input', function (event) {
            const maxLength = parseInt(event.target.getAttribute('maxlength'));
            const currentLength = event.target.value.length;
            if (currentLength >= maxLength) {
                const next = item.parentElement.nextElementSibling.querySelector('.digit');
                if (next != null) {
                    next.focus();
                }
            }
        });

        item.addEventListener('keydown', function (event) {
            if (event.key === 'Backspace' && item.value.length === 0) {
                const previous = item.parentElement.previousElementSibling.querySelector('.digit');
                if (previous != null) {
                    previous.focus();
                } else {
                    const parent = item.parentElement.parentElement;
                    if (parent.previousElementSibling != null) {
                        const lastOfPrev = parent.previousElementSibling.lastElementChild.querySelector('.digit');
                        if (lastOfPrev != null) {
                            lastOfPrev.focus();
                            lastOfPrev.value = ''; // Clear the content
                        }
                    }
                }
            }
        });
    });
</script>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<!-- Custom script for moving focus to next or previous input field -->
<script>
    // JavaScript code for moving focus between OTP input fields
</script>
</body>
</html>
