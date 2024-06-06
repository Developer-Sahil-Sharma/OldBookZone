<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    header( "Location: check_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    .star {
      font-size: 3em;
      cursor: pointer;
      color: rgb(156, 150, 150); /* Set initial color to white */
    }
    .star:hover {
      color: orange; /* Change color to orange on hover */
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Feedback</h2>
    <div class="row">
      <div class="col-md-6">
        <h3 id="averageRating">Average Rating: 0</h3>
        <!-- Recent Reviews -->
        <div id="recentReviews"></div>
        <!-- Feedback Form -->
        <h3>Leave a Review</h3>
        <form action="submit_feedback.php" method="post">
          
          <input type="hidden" id="rating" name="rating" value="0">
          <div id="ratingStars">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
          </div>
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          </div>
          <button type="submit" name="Review" class="btn btn-primary mt-3 ">Submit</button>
        </form>
      </div>
    </div>
    <!-- Show all feedbacks -->
    <div class="pt-4"><a href="show_feedbacks.php" >Show all feedbacks</a></div>
    
  </div>
  

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JS -->
  <script>
    // Handle star click event
    document.querySelectorAll('.star').forEach(star => {
      star.addEventListener('click', function() {
        const value = parseInt(this.getAttribute('data-value'));
        document.getElementById('rating').value = value;
        document.querySelectorAll('.star').forEach(s => {
          const sValue = parseInt(s.getAttribute('data-value'));
          s.style.color = sValue <= value ? 'orange' : 'white'; // Change color to orange if value is less than or equal to clicked star, otherwise change it to white
        });
      });
    });

    // Handle form submission
    document.getElementById('feedbackForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      const formData = new FormData(this); // Get form data
      const rating = parseInt(formData.get('rating'));
      const comment = formData.get('comment');
      this.reset();
    });
  </script>
</body>
</html>
