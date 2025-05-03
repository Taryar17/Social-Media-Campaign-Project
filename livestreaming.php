<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
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
  <div class="livestreaming-page">
    <header class="livestreaming-header">
      <h1>Livestreaming</h1>
      <p>Explore an overview of livestreaming and learn how it can be done in a safe environment.</p>
    </header>

    <section class="livestreaming-content">
      <div class="livestreaming-overview">
        <p>Livestreaming is a popular way for individuals to share content in real-time, allowing for immediate interaction with viewers. Whether it's gaming, cooking, tutorials, or just chatting, livestreaming provides a dynamic platform for creators to engage with their audience. However, it's essential to approach livestreaming with caution to ensure a safe and positive experience.</p>
      </div>
      <div class="livestreaming-tips">
        <div class="live-tip">
          <img src="images/SafeSharing.jpg" alt="Be mindful of the content you share">
          <h3>Be mindful of the content you share</h3>
          <p>Avoid sharing personal information such as your full name, address, phone number, or any other identifying details. Remember that once something is shared online, it can be challenging to remove it completely.</p>
        </div>
        <div class="live-tip">
          <img src="images/PrivarySetting.jpg" alt="Use privacy settings">
          <h3>Use privacy settings</h3>
          <p>Most livestreaming platforms offer privacy settings that allow you to control who can view your streams. Utilize these settings to restrict access to trusted individuals or friends and family, especially if you're sharing personal or sensitive content.</p>
        </div>
        <div class="live-tip">
          <img src="images/SafeStreaming.jpg" alt="Interact responsibly with viewers">
          <h3>Interact responsibly with viewers</h3>
          <p>Always be mindful of your interactions with viewers. Be polite and respectful, and avoid engaging in arguments or responding to provocative comments. Recognize that not everyone online has good intentions, and it's crucial to stay alert to potential risks.</p>
        </div>
        <div class="live-tip">
          <img src="images/CyberbullyLive.jpg" alt="Report and block inappropriate comments or behavior">
          <h3>Report and block inappropriate comments or behavior</h3>
          <p>If you encounter any form of harassment, bullying, or inappropriate behavior during your livestream, use the platform's tools to report and block the offending users. Creating a safe and respectful environment is essential for a positive livestreaming experience.</p>
        </div>
        <div class="live-tip">
          <img src="images/Standard.jpg" alt="Educate yourself on the platform's guidelines and community standards">
          <h3>Educate yourself on the platform's guidelines and community standards</h3>
          <p>Each livestreaming platform has its own set of guidelines and community standards. Familiarize yourself with these rules to ensure your content complies and to understand what actions are taken against violations. This knowledge will help you maintain a safe and enjoyable streaming environment for yourself and your audience.</p>
        </div>
      </div>
    </section>
  </div>
  <footer>
    <p class="here"><b>You are here: Livestreaming</b></p>
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
  <script src="javascript/script.js"></script>
</body>

</html>