document.addEventListener('DOMContentLoaded', function() {
  // Profile form toggle scripts
  document.getElementById('changeUsernameBtn').addEventListener('click', function() {
      showForm('username');
  });

  document.getElementById('changeEmailBtn').addEventListener('click', function() {
      showForm('email');
  });

  document.getElementById('changePasswordBtn').addEventListener('click', function() {
      showForm('password');
  });

  function showForm(formType) {
      // Hide all forms first
      document.getElementById('username-form').style.display = 'none';
      document.getElementById('email-form').style.display = 'none';
      document.getElementById('password-form').style.display = 'none';
      
      // Show the selected form
      document.getElementById(formType + '-form').style.display = 'block';
  }

  // Hide the form
  function hideForm(formType) {
      document.getElementById(formType + '-form').style.display = 'none';
  }
});

function validatePassword() {
  const password = document.getElementById("new-password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  if (!passwordRegex.test(password)) {
      alert("Password must contain at least:\n- One uppercase letter\n- One lowercase letter\n- One digit\n- One special character\n- Minimum 8 characters.");
      return false;
  }
  if (password !== confirmPassword) {
      alert("Passwords do not match. Please try again.");
      return false;
  }
  return true;
}

function validateEmail() {
  var email = document.getElementById('new-email').value;
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}$/; // TLD must have at least 3 characters
  
  // Check if the email matches the pattern
  if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false; // Prevent form submission if email is invalid
  }
  return true; // Allow form submission if email is valid
}