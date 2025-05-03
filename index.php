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
    <script src="javascript/script.js"></script>
  </nav>
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
          <div class="slide-text">Join our campaign to promote a safer internet!</div>
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

      <!-- Web Service 1 -->
      <section id="workshops">
        <h2 class="hstyle">Upcoming Workshops</h2>
        <div class="workshop-container">
          <div class="workshop">
            <div class="workshop-details">
              <h3>Online Safety Basics</h3>
              <p>Join our foundational workshop to learn the basics of online safety and best practices for protecting personal information.</p>
              <p><strong>Date:</strong> August 10, 2024</p>
              <p><strong>Location:</strong> Virtual Event</p>

              <a href="login.php"><button class="btn">Register Now</button></a>
            </div>
          </div>
          <div class="workshop">
            <div class="workshop-details">
              <h3>Advanced Social Media Security</h3>
              <p>Deep dive into advanced techniques for securing your social media accounts and managing privacy settings effectively.</p>
              <p><strong>Date:</strong> September 15, 2024</p>
              <p><strong>Location:</strong> Virtual Event</p>
              <a href="login.php"><button class="btn">Register Now</button></a>
            </div>
          </div>
          <div class="workshop">
            <div class="workshop-details">
              <h3>Digital Citizenship and Ethics</h3>
              <p>Explore the principles of digital citizenship and learn how to navigate the online world ethically and responsibly.</p>
              <p><strong>Date:</strong> October 20, 2024</p>
              <p><strong>Location:</strong> Virtual Event</p>
              <a href="login.php"><button class="btn">Register Now</button></a>
            </div>
          </div>
        </div>
      </section>

      <!-- Web Service 2 -->
      <section id="helpline">
        <img src="images/Helpline.jpg" alt="Helpline Image">
        <div class="web-service">
          <h1>Anonymous Helpline</h1>
          <p>
            Need assistance or advice? Connect with our anonymous helpline for
            support regarding online challenges.
          </p>
          <p><strong>Helpline:</strong> 1-800-123-4567</p>
          <p><strong>Email:</strong> help@onlinesafety.org</p>
        </div>
      </section>
      <div class="explore">
        <a href="login.php"><button class="btn">Explore More &#8594;</button></a>
      </div>

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
  </main>

  <footer>
    <p class="here"><b>You are here: Information</b></p>
    <div class=" footer-content">
      <div class="footer-section quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li class="link"><a href="index.php">Home</a></li>
          <li class="link"><a href="blegislation.php">Legislation</a></li>
          <li class="link"><a href="binformation.php">Information</a></li>
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
  <script src="javascript/script.js"></script>
</body>

</html>