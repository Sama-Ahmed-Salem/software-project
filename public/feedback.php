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
    <link rel="stylesheet" href="../public/css/feedback.css">
    <title>Let Us Know Your Feedback</title>
  </head>


  <body>
  <?php include '../app/views/dashboard.php'; ?>

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

    <script src="../public/js/feedback.js"></script>
  </body>
</html>
