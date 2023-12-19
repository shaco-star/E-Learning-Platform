<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
  <script src="js/script.js" type="module"></script>
  <div class="background">
    <header>
      <img class="logo" src="assets/logo.png" alt="logo" />
      <nav>
        <ul class="flex">
          <li><a href="#home">Home</a></li>
          <li><a href="#category">Categories</a></li>
          <li><a href="#courses">Courses</a></li>
          <li><a href="#about">About Us</a></li>
          <li class="prof-img-container"><img class="circular-img profImg" alt="">
            <div class="loginBlock">
              <ul>
                <!-- <li class="login"><a href="login.html">Log in</a></li>
                <li class="btn"><a href="signup.html">Sign up</a></li> -->
                <?php
                session_start();
                if (isset($_SESSION['userid'])) {
                  echo '<li class="username">' . $_SESSION['username'] . '</li>';
                  echo '<li class="logout"><a href="logout.php">Logout</a></li>';
                } else {
                  echo '<li class="login"><a href="login.html">Log in</a></li>';
                  echo '<li class="btn"><a href="signup.html">Sign up</a></li>';
                }
                ?>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    <section id="home" class="section-hero">
      <div class="grid hero">
        <div class="hero-text-box">
          <h1>
            Join our online learning community and access thousands of courses
            across various topics and skills.
          </h1>
        </div>

        <img src="assets/hero-section.png" alt="hero image" />
      </div>
    </section>
  </div>
  <section id="courses" class="section-courses">
    <div class="container">
      <div class="heading flex">
        <h2 class="header">Popular Courses</h2>
        <nav>
          <ul class="course-section-list flex">
            <li><a class="active">All</a></li>
            <li><a>Development</a></li>
            <li><a>Design</a></li>
            <li><a>Business</a></li>
            <li><a>Marketing</a></li>
            <li><a>Music</a></li>
          </ul>
        </nav>
      </div>
      <div class="courses-container grid">

      </div>
      <div class="view-all-courses">
        <a href="allCourses.html" class="view-all-courses">View More Courses+</a>
      </div>

    </div>
  </section>
  <section id="category" class="section-category">
    <div class="container">
      <div class="category-heading">
        <h2 class="header">Select Your Categories</h2>
      </div>
      <div class="category-container box-wrap grid">

        <div class="category-card flex">
          <img class="circular-img" src="assets/website-content.png" alt="" />
          <div class="category-details-container">
            <p>Development</p>
            <p>25 Courses</p>
          </div>
        </div>
        <div class="category-card flex">
          <img class="circular-img" src="assets/laura-jones.jpg" alt="" />
          <div class="category-details-container">
            <p>Art & Design</p>
            <p>25 courses</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about" class="section-about">
    <div class="container">
      <h2 class="header">What will you get</h2>
      <div class="about-section-item grid">
        <div class="img-circular-box">
          <img src="assets/achieve.png" alt="" />
        </div>
        <div class="about-text">
          <h3>Achieve Your Goals</h3>
          <p>
            You will achieve your personal and professional goals by exploring
            new topics, deepening your existing knowledge, or earning a
            certificate or degree.
          </p>
        </div>

        <div class="about-text">
          <h3>Flexible Learning</h3>
          <p>
            You can learn anytime, anywhere, and at your own pace with our
            flexible and engaging online platform.
          </p>
        </div>
        <div class="img-circular-box">
          <img src="assets/time.png" alt="" />
        </div>
        <div class="img-circular-box">
          <img src="assets/pc.png" alt="" />
        </div>
        <div class="about-text">
          <h3>Interactive Learning</h3>
          <p>
            You will benefit from interactive videos, quizzes, assignments,
            and peer feedback from experienced instructors and a global
            community of learners.
          </p>
        </div>
      </div>
    </div>
  </section>
  <section id="instructors" class="section-instructors">
    <div class="container">
      <div class="header">Meet Our Instructors</div>
      <p class="section-instructors-text">
        Our instructors are experienced professionals who are passionate about
        teaching and sharing their knowledge with you. They have designed
        engaging and interactive courses that will help you achieve your
        learning goals and advance your career.
      </p>
      <div class="instructors-card-container flex">
        <div class="instructor-card">
          <img src="assets/art.jpg" alt="instructor background image" />
          <div class="instructor-card-description flex">
            <div class="instructor-text">
              <p class="course-name">Cameron john</p>
              <p class="instructor-role">Python developer</p>
              <span class="stars-rating">stars</span>
            </div>
            <img class="circular-img" src="assets/laura-jones.jpg" alt="instructor image" />
          </div>
        </div>
        <div class="instructor-card">
          <img src="assets/art.jpg" alt="instructor background image" />
          <div class="instructor-card-description flex">
            <div class="instructor-text">
              <p class="course-name">Cameron john</p>
              <p class="instructor-role">Python developer</p>
              <span class="stars-rating">stars</span>
            </div>
            <img class="circular-img" src="assets/laura-jones.jpg" alt="instructor image" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-get-started">
    <div class="container">
      <div class="get-started-card-container flex">
        <div class="get-started-card grid">
          <div class="get-started-text">
            <h2 class="heading">Get started today for free</h2>
            <p>
              Whether you're a student looking to learn something new or an
              instructor with knowledge to share, we've got you covered.
              Create an account today and start exploring the world of online
              learning.
            </p>
            <div class="btn-container flex">
              <a class="btn" href="signup.html">Get started</a>
              <a class="btn" href="#">Become Instructor</a>
            </div>
          </div>
          <div class="get-started-img"></div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img src="assets/logo.png" alt="omnifood logo" class="logo" />
        </a>
        <ul class="social-links">
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
        </ul>
        <p class="copyright">
          Copyright &copy; 2027 by Course,Inc. All rights reserved.
        </p>
      </div>
      <div class="address-col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p>623 Harrison St., 2nd Floor, San Francisco, CA 94107</p>
          <p>
            <a class="footer-link" href="tel:415-201-6370">415-201-6370</a><br />
            <a class="footer-link" href="mail:hello@omnifood.com">hello@course.com</a>
          </p>
        </address>
      </div>
      <nav class="nav-col">
        <p class="footer-heading">Account</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Create account</a></li>
          <li><a class="footer-link" href="#">Sign in</a></li>
          <li><a class="footer-link" href="#">iOS app</a></li>
          <li><a class="footer-link" href="#">Android app</a></li>
        </ul>
      </nav>
      <nav class="nav-col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">About Course </a></li>
          <li><a class="footer-link" href="#">For Business</a></li>
          <li><a class="footer-link" href="#"> Partners</a></li>
          <li><a class="footer-link" href="#">Careers</a></li>
        </ul>
      </nav>
      <nav class="nav-col">
        <p class="footer-heading">Resources</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Help center</a></li>
          <li><a class="footer-link" href="#">Privacy & terms</a></li>
        </ul>
      </nav>
    </div>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>