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
  $des = $_POST['description'];
  if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] == 0) {
    $filename = $_FILES["img1"]["name"];

    $filepath = $_FILES["img1"]["tmp_name"];
  }
  if (isset($_FILES["img2"]) && $_FILES["img2"]["error"] == 0) {
    $filename2 = $_FILES["img2"]["name"];

    $filepath2 = $_FILES["img2"]["tmp_name"];
  }

  $sql = "INSERT INTO howparenthelp (title, description, image1, image2 ) VALUES ('$title','$des', '$filename', '$filename2')";
  if ($conn->query($sql) == TRUE) {
    echo " Inserted howparenthelp successfully ";
    move_uploaded_file($filepath, "images/" . $filename);
    move_uploaded_file($filepath2, "images/" . $filename2);
    header("location:howparenthelpSetup.php");
  }
}
if (isset($_GET['deleteid'])) {
  $did = $_GET['deleteid'];
  $sql = "Delete from howparenthelp where id = '$did'";
  if ($conn->query($sql)) {
    echo "Deleted one howparenthelp successfully";
    header("location:howparenthelpSetup.php");
  }
}

$searchTerm = '';
if (isset($_POST['btnSearch'])) {
  $searchTerm = $_POST['search'];
  $sql = "SELECT * FROM howparenthelp WHERE LOWER(title) LIKE LOWER('%$searchTerm%') OR LOWER(description) LIKE LOWER('%$searchTerm%')";
  $result = $conn->query($sql);
} elseif (isset($_GET['editid'])) {
  $eid = $_GET['editid'];
  $sql = "Select * From howparenthelp Where id = '$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql1 = "SELECT * from howparenthelp";
  $result = $conn->query($sql1);
}

if (isset($_POST['btnUpdate'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] == 0) {
    $filename = $_FILES["img1"]["name"];

    $filepath = $_FILES["img1"]["tmp_name"];
  }
  if (isset($_FILES["img2"]) && $_FILES["img2"]["error"] == 0) {
    $filename2 = $_FILES["img2"]["name"];

    $filepath2 = $_FILES["img2"]["tmp_name"];
  }

  $sql = "Update howparenthelp set title = '$title', description='$description', image1='$filename', image2='$filename2' Where id = '$eid'";

  if ($conn->query($sql) == True) {
    echo "Data updated successfully";
    move_uploaded_file($filepath, "images/" . $filename);
    move_uploaded_file($filepath2, "images/" . $filename2);
    header("location:howparenthelpSetup.php");
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
    <h1 class="hstyle">HowParentHelp Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>Contact Us</h2>
      <p>
        Feel free to reach out to us using the contact form below. We
        appreciate your feedback and inquiries.
      </p>

      <!-- Contact Form -->
      <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="eid" value="<?php echo isset($row['id']) ? $row['id'] : ""; ?>">

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ""; ?>" required />

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo isset($row['description']) ? $row['description'] : ""; ?></textarea>

        <label for="img1">Image 1:</label>
        <input type="file" id="img1" name="img1" value="<?php echo isset($row['image1']) ? $row['image1'] : ""; ?>" required />

        <label for="img2">Image 2:</label>
        <input type="file" id="img2" name="img2" value="<?php echo isset($row['image2']) ? $row['image2'] : ""; ?>" required />

        <?php
        if (!isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnSubmit">Create Parent Help</button>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['editid'])) {
        ?>
          <button type="submit" name="btnUpdate">Update Parent Help</button>
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
        <h2 class="hstyle" id="parenthelpTable"> How Parent Help List </h2>
        <div class="header-section">
          <form action="#parenthelpTable" method="POST" class="search-input">
            <input type="text" id="search" name="search" placeholder="Search..." />
            <button type="submit" name="btnSearch">Search</button>
            <a href="newsletterSetup.php"><button class="btn">Refresh</button></a>
          </form>
        </div>
        <table class="setup-table" border="1" cellspacing="5" cellpadding="5px" width="100%">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th class="actionplace">Action</th>
          </tr>
          <?php
          while ($row = $result->fetch_assoc()) {
          ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><img src="<?php echo "images\\" . $row['image1']; ?>" width="200" height="200"></td>
              <td><img src="<?php echo "images\\" . $row['image2']; ?>" width="200" height="200"></td>
              <td>
                <a href="howparenthelpSetup.php?editid=<?php echo $row['id']; ?>" class="button edit-button">Edit</a>
                <a href="howparenthelpSetup.php?deleteid=<?php echo $row['id']; ?>" class="button delete-button">Delete</a>
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
      <a href="howparenthelpSetup.php #newsletterTable"><button class="btn">Refresh</button></a>

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
    <p class="here"><b>You are here: How Parent Help Setup</b></p>
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