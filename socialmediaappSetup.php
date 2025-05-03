<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href=" font-css/all.min.css">
</head>
<?php
session_start();
$email = $_SESSION['email'];
include("dbconnect.php");
if (isset($_POST['btnSave'])) {
  $name = $_POST['name'];
  $link = $_POST['llink'];
  $plink = $_POST['plink'];

  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    // Real file name
    $filename = $_FILES["logo"]["name"];
    // file path
    $filepath = $_FILES["logo"]["tmp_name"];
  }

  $sql = "INSERT INTO socialmediaapps (name,logo,link,privacylink) VALUES ('$name','$filename','$link','$plink') ";
  if ($conn->query($sql)) {
    echo "Inserted one social media app successfully";
    move_uploaded_file($filepath, "images/" . $filename);
    header("location:socialmediaappSetup.php");
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "Delete from socialmediaapps where id = '$did'";
  if ($conn->query($sql)) {
    echo "Deleted one social media app successfully";
    header("location:socialmediaappSetup.php");
  }
}
if (isset($_POST['btnUpdate'])) {
  $eid = $_GET['editid'];
  $name = $_POST['name'];
  $link = $_POST['llink'];
  $plink = $_POST['plink'];
  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    // Real file name
    $filename = $_FILES["logo"]["name"];
    // file path
    $filepath = $_FILES["logo"]["tmp_name"];
  }

  $sql = "Update socialmediaapps set name='$name', logo='$filename', link='$link', privacylink='$plink' Where id = '$eid'";

  if ($conn->query($sql) == True) {
    echo "Data updated successfully";
    move_uploaded_file($filepath, "images/" . $filename);
    header("location:socialmediaappSetup.php");
  }
}
$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM socialmediaapps WHERE LOWER(name) LIKE LOWER('%$searchTerm%')";
  $result = $conn->query($sql);
} elseif (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "SELECT * FROM socialmediaapps WHERE id = '$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql1 = "SELECT * FROM socialmediaapps";
  $result = $conn->query($sql1);
}
?>

<body>
  <nav>
    <ul class="navbar">
      <div class="logo">
        <img src="images/SafeSurf.png" alt="Logo">
      </div>
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
    <h1 class="hstyle">Social Media Apps Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">

      <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="eid" value="<?php echo isset($row['id']) ? $row['id'] : ""; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ""; ?>" required />

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" value="<?php echo isset($row['logo']) ? $row['logo'] : ""; ?>" required />

        <label for="llink">Login Link:</label>
        <input type="text" id="llink" name="llink" value="<?php echo isset($row['link']) ? $row['link'] : ""; ?>" required />

        <label for="plink">Privacy Setting Link:</label>
        <input type="text" id="plink" name="plink" value="<?php echo isset($row['privacylink']) ? $row['privacylink'] : ""; ?>" required />

        <?php
        if (!isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnSave">Save</button>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnUpdate">Update</button>
        <?php
        }
        ?>
      </form>
      <hr>
    </section>
    <?php
    if ($result->num_rows > 0) {
      if (!isset($_GET['editid'])) {
    ?>
        <h2 id="socialappTable" class="hstyle"> Popular social media apps </h2>
        <div class="header-section">
          <form action="#socialappTable" method="POST" class="search-input">
            <input type="text" id="search" name="search" placeholder="Search..." />
            <button type="submit" name="btnSearch">Search</button>
            <a href="socialmediaappSetup.php"><button class="btn">Refresh</button></a>
          </form>
        </div>
        <table class="setup-table" border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Login Link</th>
            <th>Privacy Setting Link</th>
            <th class="actionplace">Action</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
          ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px"></td>
              <td><?php echo $row['link']; ?></td>
              <td><?php echo $row['privacylink']; ?></td>
              <td>
                <a href="socialmediaappSetup.php?editid=<?php echo $row['id']; ?>" class="button edit-button">Edit</a>
                <a href="socialmediaappSetup.php?deleteid=<?php echo $row['id']; ?>" class="button delete-button">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      <?php
      }
    } else {
      echo " There is no data";
      ?>
      <a href="socialmediaappSetup.php"><button class="btn">Refresh</button></a>
    <?php
    }
    ?>
  </main>

  <footer>
    <p class="here"><b>You are here: Social Media App Setup</b></p>
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