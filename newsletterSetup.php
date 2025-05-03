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
include('dbconnect.php');
if (isset($_POST['btnSubmit'])) {
  $title = $_POST['title'];
  $cont = $_POST['content'];
  if (isset($_FILES["nfile"]) && $_FILES["nfile"]["error"] == 0) {
    $filename = $_FILES["nfile"]["name"];
    $filepath = $_FILES["nfile"]["tmp_name"];
  }

  $sql = "INSERT INTO newsletter (title, content, image ) VALUES ('$title', '$cont', '$filename')";
  if ($conn->query($sql) == TRUE) {
    echo " Inserted newsletter successfully ";
    move_uploaded_file($filepath, "images/" . $filename);
    header("location:newsletterSetup.php");
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "Delete from newsletter where id = '$did'";
  if ($conn->query($sql)) {
    echo "Deleted one newsletter successfully";
    header("location:newsletterSetup.php");
  }
}
$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM newsletter WHERE LOWER(title) LIKE LOWER('%$searchTerm%') OR LOWER(content) LIKE LOWER('%$searchTerm%')";
  $result = $conn->query($sql);
} elseif (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "SELECT * FROM newsletter WHERE id = '$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql1 = "SELECT * FROM newsletter";
  $result = $conn->query($sql1);
}

if (isset($_POST['btnUpdate'])) {
  $title = $_POST['title'];
  $cont = $_POST['content'];
  if (isset($_FILES["nfile"]) && $_FILES["nfile"]["error"] == 0) {
    $filename = $_FILES["nfile"]["name"];

    $filepath = $_FILES["nfile"]["tmp_name"];
  }

  $sql = "Update newsletter set title='$title', content='$cont', image='$filename' Where id = '$eid'";

  if ($conn->query($sql) == True) {
    echo "Data updated successfully";
    move_uploaded_file($filepath, "images/" . $filename);
    header("location:newsletterSetup.php");
  }
}
?>

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
    <h1 class="hstyle">NewsLetter Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>NewsLetter</h2>
      <p>
        Feel free to reach out to us using the contact form below. We
        appreciate your feedback and inquiries.
      </p>

      <!-- Contact Form -->
      <form action="#" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ""; ?>" required />

        <label for="image">Content</label>
        <textarea id="content" name="content" rows="4" required><?php echo isset($row['content']) ? $row['content'] : ""; ?></textarea>

        <label for="nfile ">Enter Newsletter Image </label>
        <input type="file" name="nfile" value="<?php echo isset($row['name']) ? $row['name'] : ""; ?>" required>
        <?php
        if (!isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnSubmit">Create Newsletter</button>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnUpdate">Update Newsletter</button>
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
        <h2 id="newsletterTable" class="hstyle">News Letter List</h2>
        <div class="header-section">
          <form action="#newsletterTable" method="POST" class="search-input">
            <input type="text" id="search" name="search" placeholder="Search..." />
            <button type="submit" name="btnSearch">Search</button>
            <a href="newsletterSetup.php"><button class="btn">Refresh</button></a>
          </form>
        </div>
        <table class="setup-table" border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Published At</th>
            <th class="actionplace">Action</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['content']; ?></td>
              <td><img src="<?php echo "images\\" . $row['image']; ?>" width="300" height="200"></td>
              <td><?php echo $row['publishdate']; ?></td>
              <td>
                <a href="newsletterSetup.php?editid=<?php echo $row['id']; ?>" class="button edit-button">Edit</a>
                <a href="newsletterSetup.php?deleteid=<?php echo $row['id']; ?>" class="button delete-button">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      <?php
      }
    } else {
      echo "There is no data";
      ?>
      <a href="newsletterSetup.php"><button class="btn">Refresh</button></a>
    <?php
    }
    ?>

    <!-- Privacy Policy Link -->
    <p>
      Before sending a message, please review our
      <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
    </p>
  </main>
  <footer>
    <p class="here"><b>You are here: NewsLetter Setup</b></p>
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