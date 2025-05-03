<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");

$sql = "SELECT * from howparenthelp;";
$resHelp = $conn->query($sql);
?>
<html lang="en">

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
      <li class="link"><a href="home.php">Home</a></li>
      <li class="link"><a href="information.php">Information</a></li>
      <li class="nav-campaign">
        Campaigns
        <ul>
          <li class="link">
            <a href="popular-apps.php">Popular Apps</a>
          </li>
          <li class="link">
            <a href="parents-help.php">Parents Help</a>
          </li>
          <li class="link">
            <a href="livestreaming.php">Livestreaming</a>
          </li>
        </ul>
      </li>

      <li class="link"><a href="contact.php">Contact</a></li>
      <li class="link"><a href="legislation.php">Legislation</a></li>
      <li class="link"><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
  <main>
    <section id="parents-help">
      <div class="section-overview overview">
        <h1>HOW PARENT CAN HELP</h1>
        <p>Discover top tips for parents to support healthy teen use of social
          media.</p>
      </div>
      <!-- Add more tips or content as needed -->
      <?php
      if ($resHelp->num_rows > 0) {
        while ($rowHelp = $resHelp->fetch_assoc()) {
      ?>
          <div class="phcontent-set">
            <h2><?php echo $rowHelp['title']; ?></h2>
            <p class="description"><?php echo $rowHelp['description']; ?></p>
            <div class="image-set">
              <div class="image-container">
                <img src="<?php echo "images\\" . $rowHelp['image1']; ?>" alt=" Image 1">
              </div>
              <div class="image-container">
                <img src="<?php echo "images\\" . $rowHelp['image2']; ?>" alt="Image 2">
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </section>

  </main>
  <footer>
    <p class="here"><b>You are here: Parent-Help</b></p>
    <div class=" footer-content">
      <div class="footer-section quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li class="link"><a href="home.php">Home</a></li>
          <li class="link"><a href="information.php">Information</a></li>
          <li class="link"><a href="contact.php">Contact</a></li>
          <li class="link"><a href="legislation.php">Legislation</a></li>
          <li class="link"><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <div class="footer-section social-media">
        <h3>Follow Us On</h3>
        <ul>
          <li><a href="https://www.facebook.com/login" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></li>
          <li><a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
          <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
          <li><a href="https://www.linkedin.com/login" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>\<li><a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
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
  <script src="javascript/script.js"></script>
</body>

</html>