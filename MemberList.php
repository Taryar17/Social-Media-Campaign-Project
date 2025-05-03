<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include('dbconnect.php');
$searchTerm = '';
if (isset($_POST['btnSearch1'])) {
  $searchTerm = $_POST['search1'];
  $sql = "SELECT * FROM member WHERE LOWER(name) LIKE LOWER('%$searchTerm%') OR LOWER(email) LIKE LOWER('%$searchTerm%') OR LOWER(city) LIKE LOWER('%$searchTerm%') AND usertype= 1;";
  $result1 = $conn->query($sql);
} else {
  $sql1 = "SELECT * from member where usertype= 1;";
  $result1 = $conn->query($sql1);
}

if (isset($_POST['btnSearch2'])) {
  $searchTerm = $_POST['search2'];
  $sql = "SELECT * FROM member WHERE LOWER(name) LIKE LOWER('%$searchTerm%') OR LOWER(email) LIKE LOWER('%$searchTerm%') OR LOWER(city) LIKE LOWER('%$searchTerm%') AND usertype= 0;";
  $result2 = $conn->query($sql);
} else {
  $sql2 = "SELECT * from member where usertype= 0;";
  $result2 = $conn->query($sql2);
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
      <li class="link"><a href="adminhome.php">Home</a></li>
      <li class="link"><a href="servicesSetup.php">Services</a></li>
      <li class="link"><a href="newsletterSetup.php">NewsLetter</a></li>
      <li class="link"><a href="howparenthelpSetup.php">HowParentHelp</a></li>
      <li class="link"><a href="socialmediaappSetup.php">SocialMediaApps</a></li>
      <li class="link"><a href="contactList.php">Help/Support</a></li>
      <li class="link"><a href="MemberList.php">MemberList</a></li>
      <li class="link"><a href="logout.php">Logout</a></li>
    </ul>

  </nav>
  <header>

    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <h1 class="hstyle" id="admin-section">Admin List</h1>
    <?php
    if ($result1->num_rows > 0) {
    ?>
      <div class="header-section">
        <form action="#admin-section" method="POST" class="search-input">
          <input type="text" id="search1" name="search1" placeholder="Search..." />
          <button type="submit" name="btnSearch1">Search</button>
          <a href="MemberList.php"><button class="btn">Refresh</button></a>
        </form>
      </div>
      <div class="member-list">
        <?php
        while ($row = $result1->fetch_assoc()) {
        ?>
          <div class="member">
            <div class="member-info">
              <h3 class="h3style"><?php echo $row['name']; ?></h3>
              <p>Email: <span><?php echo $row['email']; ?></span></p>
              <p>Password: <span><?php echo $row['password']; ?></span></p>
              <p>City: <span><?php echo $row['city']; ?></span></p>
              <p>Newsletter Subscription: <span><?php echo $row['subscription'] == 1 ? "Yes" : "No"; ?></span></p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    <?php
    } else {
      echo "There is no data";
    ?>
      <a href="MemberList.php"><button class="btn">Refresh</button></a>
    <?php
    }
    ?>
    <h1 class="hstyle" id="member-section">Member List</h1>
    <?php
    if ($result2->num_rows > 0) {
    ?>
      <div class="header-section">
        <form action="#member-section" method="POST" class="search-input">
          <input type="text" id="search2" name="search2" placeholder="Search..." />
          <button type="submit" name="btnSearch2">Search</button>
          <a href="MemberList.php"><button class="btn">Refresh</button></a>
        </form>
      </div>
      <div class="member-list">
        <?php
        while ($row1 = $result2->fetch_assoc()) {
        ?>
          <div class="member">
            <div class="member-info">
              <h3 class="h3style"><?php echo $row1['name']; ?></h3>
              <p>Email: <span><?php echo $row1['email']; ?></span></p>
              <p>Password: <span><?php echo $row1['password']; ?></span></p>
              <p>City: <span><?php echo $row1['city']; ?></span></p>
              <p>Newsletter Subscription: <span><?php echo $row1['subscription'] == 1 ? "Yes" : "No"; ?></span></p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    <?php
    } else {
      echo "There is no data";
    ?>
      <a href="MemberList.php"><button class="btn">Refresh</button></a>
    <?php
    }
    ?>


  </main>
  <footer>
    <p class="here"><b>You are here: Member List</b></p>
    <div class=" footer-content">
      <div class="footer-section quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li class="link"><a href="servicesSetup.php">Services</a></li>
          <li class="link"><a href="newsletterSetup.php">NewsLetter</a></li>
          <li class="link"><a href="howparenthelpSetup.php">HowParentHelp</a></li>
          <li class="link"><a href="socialmediaappSetup.php">SocialMediaApps</a></li>
          <li class="link"><a href="contactList.php">Help/Support</a></li>
          <li class="link"><a href="MemberList.php">MemberList</a></li>
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
  <script src="javascript/script.js"></script>
</body>

</html>