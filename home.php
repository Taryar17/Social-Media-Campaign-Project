<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");

$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM services WHERE LOWER(title) LIKE LOWER('%$searchTerm%') OR LOWER(description) LIKE LOWER('%$searchTerm%') OR LOWER(info) LIKE LOWER('%$searchTerm%')";
  $resService = $conn->query($sql);
} else {
  $sql = "SELECT * from services";
  $resService = $conn->query($sql);
}

$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM newsletter WHERE LOWER(title) LIKE LOWER('%$searchTerm%') OR LOWER(content) LIKE LOWER('%$searchTerm%')";
  $resNews = $conn->query($sql);
} else {
  $sql2 = "SELECT * from newsletter";
  $resNews = $conn->query($sql2);
}

$sub = 0;
$sql1 = "SELECT * from member WHERE email='$email'";
$resSub = $conn->query($sql1);
if ($resSub->num_rows > 0) {
  $row1 = $resSub->fetch_assoc();
  $sub = $row1['subscription'];
}

if (isset($_POST['btnSub'])) {
  $sub = 1;
  $sql3 = "UPDATE member SET subscription = '$sub' WHERE email= '$email' ";
  if ($conn->query($sql3) == TRUE) {
    echo " Newsletter subscribed";
    header("location:home.php");
  }
}
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
  <script src="javascript/script.js"></script>
  <header>
    <h1 class="hstyle">Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>
  <main>
    <div class="slider">
      <div class="slides">
        <div class="slide">
          <img src="images/Slider1.jpg" alt="Image 1">
          <div class="slide-text">Empowering teens to navigate the digital world safely</div>
        </div>
        <div class="slide">
          <img src="images/Slider2.jpg" alt="Image 2">
          <div class="slide-text">Stay informed about the latest online safety tips</div>
        </div>
        <div class="slide">
          <img src="images/Slider3.jpg" alt="Image 3">
          <div class="slide-text">Join our campaign to promote a safer internet</div>
        </div>
        <div class="slide">
          <img src="images/Slider4.jpg" alt="Image 4">
          <div class="slide-text">Learn how to protect your privacy online</div>
        </div>
      </div>
      <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
      <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
    <script src="javascript/slider.js"></script>
    <section id="home">
      <h2 class="hstyle" id="webservices">Available Web Services</h2>
      <h2>Empowering teenagers to navigate the digital world safely.</h2>
      <div class="header-section">
        <form action="#webservices" method="POST" class="search-input">
          <input type="text" id="search" name="search" placeholder="Search..." />
          <button type="submit" name="btnSearch">Search</button>
          <a href="servicesSetup.php"><button class="btn">Refresh</button></a>
        </form>
      </div>
      <div id="service" class="header-section">
      </div>
      <?php
      if ($resService->num_rows > 0) {
        while ($rowSer = $resService->fetch_assoc()) {
      ?>
          <div class="web-service">
            <h3><?php echo $rowSer['title']; ?></h3>
            <p>
              <?php echo $rowSer['description']; ?>
            </p>
            <p><strong><?php echo $rowSer['info']; ?></strong> </p>
            <p><strong>Service Created At: <?php echo $rowSer['createdat']; ?></strong></p>
            <a href="#"><button class="btn">Register Now</button></a>
          </div>
      <?php
        }
      }
      ?>

      <!-- Most Popular Social Media Apps -->
      <section class="popular-apps">
        <h3>Most Popular Social Media Apps</h3>
        <div class="social-media-container">
          <a href="https://www.facebook.com/login" target="_blank" class="social-media-card facebook">
            <img src="images/facebook_2504903.png" alt="Facebook">
            <h3>Facebook</h3>
          </a>
          <a href="https://twitter.com/login" target="_blank" class="social-media-card twitter">
            <img src="images/twitter_2504947.png" alt="Twitter">
            <h3>Twitter</h3>
          </a>
          <a href="https://www.instagram.com/accounts/login/" target="_blank" class="social-media-card instagram">
            <img src="images/instagram_2504918.png" alt="Instagram">
            <h3>Instagram</h3>
          </a>
          <a href="https://www.linkedin.com/login" target="_blank" class="social-media-card linkedin">
            <img src="images/linkedin_2504923.png" alt="LinkedIn">
            <h3>LinkedIn</h3>
          </a>
          <a href="https://web.whatsapp.com/" target="_blank" class="social-media-card whatsapp">
            <img src="images/whatsapp_2504957.png" alt="WhatsApp">
            <h3>WhatsApp</h3>
          </a>
        </div>
      </section>
      <!-- Effect of Social Media on Teenagers' Brain -->
      <section class="teenbrain-section">
        <img src="images/teenbrain.jpg" alt="Social Media and Brain">
        <div class="text-container">
          <h2>Impact of Social Media on Teenagers' Brains</h2>
          <p>
            Research indicates that excessive use of social media can have significant effects on teenagers' brain development.
            The constant engagement and interaction can lead to alterations in brain structure and function, impacting areas
            responsible for attention, emotional regulation, and decision-making.
          </p>
          <p>
            The instant gratification and reward system of social media platforms can create a dependency similar to addiction,
            affecting teenagers' ability to focus and increasing anxiety levels. It's important for teenagers to use these
            platforms mindfully and to balance their online activities with offline interactions.
          </p>
        </div>
      </section>

      <!-- How to Stay Safe Online -->
      <div class="stay-safe">
        <div class="stay-safe-content">
          <img src="images/SaferInternet.jpg" alt="Stay Safe Online">
          <div class="tips">
            <h2>How to Stay Safe Online</h2>
            <p>Follow these tips to ensure a secure online experience:</p>
            <div class="tip">
              <h3>Set Strong, Unique Passwords</h3>
              <p>Use a combination of letters, numbers, and special characters to create strong passwords that are hard to guess.</p>
            </div>
            <div class="tip">
              <h3>Enable Two-Factor Authentication</h3>
              <p>Adding a second layer of security helps to protect your accounts even if your password is compromised.</p>
            </div>
            <div class="tip">
              <h3>Be Cautious About Sharing Personal Information</h3>
              <p>Only share personal information on trusted websites and be mindful of what you share on social media.</p>
            </div>
            <div class="tip">
              <h3>Regularly Update Privacy Settings</h3>
              <p>Review and update your privacy settings on social media and other online accounts to control who can see your information.</p>
            </div>
            <div class="tip">
              <h3>Use Antivirus Software</h3>
              <p>Install antivirus software to protect your devices from malware and other online threats.</p>
            </div>
            <div class="tip">
              <h3>Verify the Authenticity of Online Information</h3>
              <p>Be skeptical of information from unknown sources and verify the credibility before sharing or acting on it.</p>
            </div>
          </div>
        </div>
      </div>
      <?php if ($sub == 1) { ?>
        <section id="newsletter">
          <h1>Online Safety News</h1>
          <div class="header-section">
            <form action="#newsletter" method="POST" class="search-input">
              <input type="text" id="search" name="search" placeholder="Search..." />
              <button type="submit" name="btnSearch">Search</button>
              <a href="newsletterSetup.php"><button class="btn">Refresh</button></a>
            </form>
          </div>
          <div class="news-list">
            <?php
            if ($resNews->num_rows > 0) {
              while ($rowNews = $resNews->fetch_assoc()) {
            ?>

                <div class="news">
                  <div class="news-info">
                    <h3 class="h3style"><?php echo $rowNews['title']; ?></h3>
                    <p><?php echo $rowNews['content']; ?></p>
                    <p><img src="<?php echo "images\\" . $rowNews['image']; ?>" width="200px"></p>
                    <p><strong>Published At: <?php echo $rowNews['publishdate']; ?></strong></p>
                  </div>
                </div>

            <?php
              }
            }
            ?>
          </div>
        <?php } else { ?>
        </section> <!-- Closing the previous section here -->

        <section class="subscription-section">
          <h2>Subscribe For Latest Newsletters</h2>
          <div class="plans-container">
            <div class="plan">
              <h3>1 Month Plan</h3>
              <p class="price">$1.99</p>
              <form action="#" method="POST">
                <button class="btn" name="btnSub" onclick="confirmSubscription('1 Month Plan', '$1.99')">Subscribe Now</button>
              </form>
            </div>
            <div class="plan">
              <h3>3 Months Plan</h3>
              <p class="original-price"><s>$5.99</s></p>
              <p class="discounted-price">$3.99</p>
              <form action="#" method="POST">
                <button class="btn" name="btnSub" onclick="confirmSubscription('3 Months Plan', '$3.99')">Subscribe Now</button>
              </form>
            </div>
            <div class="plan">
              <h3>1 Year Plan</h3>
              <p class="original-price"><s>$24.99</s></p>
              <p class="discounted-price">$9.99</p>
              <form action="#" method="POST">
                <button class="btn" name="btnSub" onclick="confirmSubscription('1 Year Plan', '$9.99')">Subscribe Now</button>
              </form>
            </div>
          </div>
        </section>
      <?php } ?>

    </section>
  </main>
  <footer>
    <p class="here"><b>You are here: Home</b></p>
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

</html>