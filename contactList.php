<!DOCTYPE html>
<?php
include('dbconnect.php');
session_start();
$email = $_SESSION['email'];
$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM contactus WHERE LOWER(message) LIKE LOWER('%$searchTerm%') OR LOWER(email) LIKE LOWER('%$searchTerm%')";
  $result = $conn->query($sql);
} else {
  $sql1 = "SELECT * FROM contactus";
  $result = $conn->query($sql1);
}

if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "Delete from contactus where id = '$did'";
  if ($conn->query($sql)) {
    echo "Deleted one social media app successfully";
    header("location:contactList.php");
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

  </header>

  <main>
    <h2 class="hstyle" id="contactTable">Help/Support List</h2>
    <?php
    if ($result->num_rows > 0) {
    ?>
      <div class="header-section">
        <form action="#contactTable" method="POST" class="search-input">
          <input type="text" id="search" name="search" placeholder="Search..." />
          <button type="submit" name="btnSearch">Search</button>
          <a href="contactList.php"><button class="btn">Refresh</button></a>
        </form>
      </div>
      <table class="setup-table" border="1" cellspacing="5" cellpadding="5px">
        <tr>
          <th>Id</th>
          <th>Message</th>
          <th>Email</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['sentdate']; ?></td>
            <td><a href="contactList.php?deleteid=<?php echo $row['id']; ?>" class="button delete-button">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </table>
    <?php
    } else {
      echo " There is no data";
    ?>
      <a href="contactList.php"><button class="btn">Refresh</button></a>
    <?php
    }
    ?>
  </main>
  <footer>
    <p class="here"><b>You are here: Help/Support Setup</b></p>
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