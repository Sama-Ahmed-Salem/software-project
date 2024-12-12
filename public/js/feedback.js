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