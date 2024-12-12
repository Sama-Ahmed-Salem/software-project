<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
  <link rel="stylesheet" href="../public/css/profile.css">

</head>
<body>
  <?php include '../app/views/dashboard.php' ?>

  <div class="profile-container">
    <div class="profile-icon">
      <img src="images/profile picture.png" alt="Profile Icon">
    </div>
    <h2 id="usernameDisplay">mostafa_mounib</h2>
    <p id="emailDisplay">mostafamounib1@gmail.com</p>
    <p class="tasks-left">Tasks left: <span id="tasksLeft">5</span></p>
    <a href="#" class="btn" id="changeUsernameBtn">Change Username</a>
    <a href="#" class="btn" id="changePasswordBtn">Change Password</a>
    <a href="#" class="btn" id="changeEmailBtn">Change Email</a>

    <div class="input-group" id="changeUsernameForm" style="display: none;">
        <input type="text" id="newUsername" placeholder="Enter new username">
        <a href="#" class="button submit-btn" onclick="updateUsername()">Submit</a>
    </div>

    <div class="input-group" id="changePasswordForm" style="display: none;">
        <input type="password" id="newPassword" placeholder="Enter new password">
        <input type="password" id="confirmNewPassword" placeholder="Confirm New Password">
        <a href="#" class="button submit-btn" onclick="updatePassword()">Submit</a>
    </div>

    <div class="input-group" id="changeEmailForm" style="display: none;">
        <input type="email" id="newEmail" placeholder="Enter new email">
        <a href="#" class="button submit-btn" onclick="updateEmail()">Submit</a>
    </div>
  </div>

  <script src="../public/js/profile.js"></script>
</body>
</html>
