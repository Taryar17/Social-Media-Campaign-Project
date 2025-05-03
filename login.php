<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['attempt_again'])) {
  $now = time();
  if ($now >= $_SESSION['attempt_again']) {
    unset($_SESSION['attempt']);
    unset($_SESSION['attempt_again']);
    unset($_SESSION['msg']);
    unset($_SESSION['check']);
  }
}

include("dbconnect.php");
if (isset($_POST['btnSignUp'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $sub = $_POST['sub'];

  $sql = "INSERT INTO member (name,email,password,city,subscription,usertype) VALUES ('$name','$email','$password','$city','$sub',0) ";

  if ($conn->query($sql)) {
    session_start();
    $_SESSION['email'] = $email;
    header("location:home.php");
  }
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href=" font-css/all.min.css">
</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="images/SafeSurf.png" alt="Logo">
    </div>
    <ul>
      <li class="link"><a href="index.php">Home</a></li>
      <li class="link"><a href="binformation.php">Information</a></li>
      <li class="link"><a href="blegislation.php">Legislation</a></li>
      <li class="link"><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <script src="javascript/script.js"></script>
  <div class="login-body">
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="#" method="POST">
          <h1>Create Account</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <span>or use your email for registeration</span>
          <input id="name" name="name" type="text" placeholder="Name">
          <input id="email" name="email" type="email" placeholder="Email">
          <input id="password" name="password" type="password" placeholder="Password">
          <input id="city" name="city" type="text" placeholder="City">
          <div class="sub">
            <label for="sub">Newsletter Subscription:</label>
            <input type="radio" id="sub" name="sub" value="1" required />Yes
            <input type="radio" id="sub" name="sub" value="0" required />No
          </div>
          <button type="submit" name="btnSignUp" class="btn">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="login-success.php" method="POST">
          <h1>Sign In</h1>

          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <?php
          if (isset($_SESSION['msg'])) {
          ?>
            <div class="alert-msg">
              <?php
              echo $_SESSION['msg'];
              ?>
            </div>
          <?php
          }
          ?>

          <!-- Contact Form -->
          <?php
          if (isset($_SESSION['check']) != 1) {
          ?>
            <span>or use your email password</span>
            <input id="email" name="email" type="email" placeholder="Email">
            <input id="password" name="password" type="password" placeholder="Password">
            <a href="#">Forget Your Password?</a>
            <button class="btn">Sign In</button>
            <p>
              Before sending a message, please review our
              <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
            </p>
        </form>
      <?php

          }
      ?>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hello, Friend!</h1>
            <p>Register with your personal details to use all of site features</p>
            <button class="hidden" id="register">Sign Up</button>
          </div>

        </div>
      </div>
    </div>
  </div>
  <footer>
    <p class="here"><b>You are here: Login</b></p>
    <div class=" footer-content">
      <div class="footer-section quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li class="link"><a href="index.php">Home</a></li>
          <li class="link"><a href="binformation.php">Information</a></li>
          <li class="link"><a href="blegislation.php">Legislation</a></li>
          <li class="link"><a href="login.php">Login</a></li>
        </ul>
      </div>
      <div class="footer-section social-media">
        <h3>Follow Us On</h3>
        <ul>
          <li><a href="https://www.facebook.com/login" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></li>
          <li><a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
          <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
          <li><a href="https://www.linkedin.com/login" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
          <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
        </ul>
      </div>
      <div class="footer-section about-us">
        <h3>About Us</h3>
        <p>Contact us via email: info@example.com<br><br>
          Call us at: +1-123-456-7890<br><br>
          Visit us at: 123 Example St, City, Country
        </p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 SafeSurf. All rights reserved.</p>
    </div>
  </footer>
</body>
<script src="javascript/login.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the current URL path
    var path = window.location.pathname;
    var page = path.split("/").pop();

    // Get all navigation links
    var navLinks = document.querySelectorAll(".navbar .link a");

    // Loop through each navigation link
    navLinks.forEach(function(link) {
      // If the href of the link matches the current page, add the active class to the parent <li>
      if (link.getAttribute("href") === page) {
        link.parentElement.classList.add("active");
      }
    });
  });
</script>

</html>