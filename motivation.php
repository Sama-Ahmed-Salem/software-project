<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Motivation Flip Cards</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap'); /* Fantasy-style font */

    /* Basic Styling */
    body {
      background-color: #BFECFF; /* Light blue background */
      font-family: 'Montserrat', sans-serif;
      display: flex;
      justify-content: flex-start; /* Align content to the left */
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      gap: 60px;
      flex-wrap: nowrap;
    }

    /* Title */
    h1 {
      font-family: 'Lobster', sans-serif; /* Applying the fantasy-style font */
      color: #4B0082; /* Indigo color */
      font-size: 4rem; /* Larger font size */
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3); /* Adding a subtle text shadow */
      width: 100%;
      text-align: center;
      position: absolute;
      top: 40px;
    }

    /* Container for Flip Cards */
    .card-container {
      display: flex; /* Use flexbox to align cards in a row */
      justify-content: flex-start;
      align-items: center;
      gap: 10px;
      padding-left: 0;
    }

    /* Flip Card Container */
    .flip-card {
      background-color: transparent;
      width: 250px;
      height: 300px;
      perspective: 1000px;
    }

    /* Flip Card Inner Wrapper */
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
     
    }

    .flip-card:hover .flip-card-inner,
    .flip-card.clicked .flip-card-inner {
      transform: rotateY(180deg);
    }

    /* Flip Card Faces */
    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      border-radius: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #555;
      font-size: 1.1rem;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .flip-card-front {
      background-color: #FFF6E3; /* Light yellow front background */
    }

    .flip-card-back {
      background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA);
      transform: rotateY(180deg);
      display: flex;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .flip-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 12px;
    }
  </style>
</head>
<body>
  <?php include 'dashboard.php'; ?>

  <!-- Title in the center -->
  <h1>Motivation Quotes</h1>

  <!-- Flip Cards -->
  <div class="card-container">
    <div class="flip-card" onclick="this.classList.toggle('clicked')">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="images/motivation1.png" alt="Motivational Image 1">
        </div>
        <div class="flip-card-back">
          <p>"The secret of getting ahead is getting started."</p>
        </div>
      </div>
    </div>

    <div class="flip-card" onclick="this.classList.toggle('clicked')">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="images/motivation2.png" alt="Motivational Image 2">
        </div>
        <div class="flip-card-back">
          <p>"Your future is created by what you do today, not tomorrow."</p>
        </div>
      </div>
    </div>

    <div class="flip-card" onclick="this.classList.toggle('clicked')">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="images/motivation3.png" alt="Motivational Image 3">
        </div>
        <div class="flip-card-back">
          <p>"Success is the sum of small efforts repeated day in and day out."</p>
        </div>
      </div>
    </div>

    <div class="flip-card" onclick="this.classList.toggle('clicked')">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="images/motivation4.png" alt="Motivational Image 4">
        </div>
        <div class="flip-card-back">
          <p>"Don't watch the clock; do what it does. Keep going."</p>
        </div>
      </div>
    </div>

    <div class="flip-card" onclick="this.classList.toggle('clicked')">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="images/motivation5.png" alt="Motivational Image 5">
        </div>
        <div class="flip-card-back">
          <p>"The best way to predict the future is to create it."</p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
