<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
      crossorigin="anonymous"
    />
    <title>Let Us Know Your Feedback</title>
  </head>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

    body {
      background-color: #BFECFF;
      font-family: 'Montserrat', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .panel-container {
      background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      font-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px;
      width: 90%;
      max-width: 500px;
      margin: auto;
    }

    .panel-container strong {
      line-height: 24px;
    }

    .ratings-container {
      display: flex;
      margin: 30px 0;
      gap: 10px;
    }

    .rating {
      flex: 1;
      cursor: pointer;
      padding: 20px;
      background-color: #FFFF; /* Light purple rating background */
      border-radius: 8px;
      transition: background-color 0.3s ease, transform 0.2s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .rating:hover {
      background-color: #FFFFFF; /* White background on hover */
    }

    .rating img {
      width: 50px;
    }

    .rating small {
      color: #555;
      margin-top: 10px;
    }

    .rating.active {
      background-color: #FFFFFF; /* Light pink active rating background */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      transform: scale(1.05);
    }

    .btn {
      background-color: #fff; /* Light purple button background */
      color: black;
      border: 0;
      border-radius: 8px;
      padding: 14px 40px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #FFFFFF; /* White background on hover */
      color: black; /* Light purple text on hover */
    }

    .btn:focus {
      outline: none;
    }

    .btn:active {
      transform: scale(0.98);
    }

    /* Thank you message styling */
    .thank-you-message {
      display: none; /* Hidden by default */
      color: #555;
      font-size: 1rem;
      margin-top: 20px;
    }
  </style>

  <body>
    <?php include 'dashboard.php';?>
    <div id="panel" class="panel-container">
      <strong>How satisfied are you with our website services?</strong>
      <div class="ratings-container">
        <div class="rating active">
          <img
            src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png"
            alt="Satisfied"
          />
          <small>Satisfied</small>
        </div>
        <div class="rating">
          <img
            src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png"
            alt="Neutral"
          />
          <small>Neutral</small>
        </div>
        <div class="rating">
          <img
            src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png"
            alt="Unhappy"
          />
          <small>Unhappy</small>
        </div>
      </div>
      <button class="btn" id="send">Send Review</button>
      <p class="thank-you-message" id="thankYouMessage">Thank you for your feedback!</p>
    </div>

    <script>
      const ratings = document.querySelectorAll('.rating');
      const ratingsContainer = document.querySelector('.ratings-container');
      const sendButton = document.getElementById('send');
      const thankYouMessage = document.getElementById('thankYouMessage');

      ratingsContainer.addEventListener('click', (e) => {
        if (e.target.closest('.rating')) {
          removeActive(); // Remove active class from all
          e.target.closest('.rating').classList.add('active'); // Add active to clicked rating
        }
      });

      function removeActive() {
        ratings.forEach((rating) => {
          rating.classList.remove('active');
        });
      }

      sendButton.addEventListener('click', () => {
        thankYouMessage.style.display = 'block'; // Show thank you message
      });
    </script>
  </body>
</html>
