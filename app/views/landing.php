<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List</title>
  <!-- Link to Google Fonts for a fantasy-style font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
  <link rel="stylesheet" href="../../public/css/landing.css">
</head>
<body>

  <!-- Header with styled title and centered links -->
  <header>
    <h1>To Do List</h1>
    <nav>
      <a href="#slideshow-container">Home</a>
      <a href="#about-us">About Us</a>
      <a href="#features">Features</a>
      <a href="#footer">Contact Us</a>
    </nav>
    <a href="../../public/login.php" class="login-btn">Login</a>
  </header>

  <!-- Slideshow container -->
  <div class="slideshow-container" id="slideshow-container">
    <!-- Slides -->
    <div class="slide">
      <img src="../../public/images/slide1.jpg" alt="Slide 1">
    </div>
    
    <div class="slide">
      <img src="../../public/images/slide2.jpeg" alt="Slide 2">
    </div>
    
    <div class="slide">
      <img src="../../public/images/slide3.jpg" alt="Slide 3">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
    
  </div>

  <!-- Dot indicators -->
  <div class="dot-container">
    <span class="dot" onclick="setSlide(1)"></span> 
    <span class="dot" onclick="setSlide(2)"></span> 
    <span class="dot" onclick="setSlide(3)"></span> 
  </div>

  <!-- Attention message under slideshow -->
  <div class="attention-message" id="about-us">
    Stay organized! Create your tasks and accomplish more every day with our To Do List.
  </div>
  <div class="about-us-section">
  <div class="about-message">
    <h2>About Us</h2>
    <p>Welcome to your ultimate productivity partner! Our To-Do List app is designed to help you stay organized, motivated, and focused. Whether you're managing work tasks or personal goals, we've got you covered.</p>
    <p>Our mission is to simplify your day-to-day planning and track your progress with ease. Experience a seamless, clutter-free interface that lets you manage tasks effectively and stay on top of your priorities.</p>
    <a href="#features" class="go-to-features-btn">Explore Our Features</a>
  </div>
  <div class="about-summary">
    <img src="../../public/images/aboutus.png" alt="To-Do List Preview" class="about-image">
    <h3>Stay on Track, Every Day</h3>
    <p>Organize tasks, set reminders, and visualize your productivity.</p>
    <p>Created by Productivity Experts</p>
  </div>
</div>

  <!-- Features Section -->
  <div class="features" id="features">
    <h2>Features</h2>
    <p>The To-Do List App is your all-in-one task manager designed to help you stay organized and motivated. You can easily add and delete tasks, view them on a dynamic calendar, and track your progress with a graph that shows completed tasks. As you finish tasks, the graph updates with a new line, giving you a visual sense of achievement. Additionally, the app features a motivation page to inspire and keep you focused, helping you stay on track throughout the day.</p>
  </div>

  <!-- Photo Gallery Section with side-by-side images -->
  <div class="photo-gallery">
    <div>
      <img src="../../public/images/add-task.png" alt="Photo 1">
      <div class="photo-caption">
        Add as many tasks as you want, and later, sort them according to your priorities.
        <p>With an easy-to-use interface, adding and sorting your tasks becomes effortless. Whether it's work-related tasks or personal goals, the app lets you manage them with efficiency.</p>
      </div>
    </div>
    <div>
      <img src="../../public/images/motivation-f.png" alt="Photo 2">
      <div class="photo-caption">
        The website can provide you with motivation to keep you focused and motivated.
        <p>Stay on track with helpful reminders and motivational prompts. The app encourages you to take on new challenges and complete tasks with dedication.</p>
      </div>
    </div>
    <div>
      <img src="../../public/images/analysis.png" alt="Photo 3">
      <div class="photo-caption">
        The app provides a small graph to visualize your progress and tasks completed.
        <p>Track your productivity with a visual progress graph. Every task completed updates the graph, giving you a real-time sense of accomplishment and motivating you to continue.</p>
      </div>
    </div>
  </div>
<br>
<br>
<br>
  <footer class="footer" id="footer">
 
    <ul class="social-icon">
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <p>&copy;2024 CyberSecurity/DataScience Team | All Rights Reserved</p>
  </footer>


  <script src="../../public/js/landing.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>