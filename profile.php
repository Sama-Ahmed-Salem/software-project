<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Profile Container */
    .profile-container {
    background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA); /* Gradient background */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 100%;
    max-width: 700px; /* Increased maximum width for a larger square */
    height: 700px; /* Increased height to match the larger width */
    box-sizing: border-box;
    box-shadow: 0 4px 8px;
    margin: 75px auto; /* Center container horizontally */
    display: flex;
    flex-direction: column;
    justify-content: space-evenly; /* Spaced out elements evenly within the container */
    align-items: center;
}


    .profile-icon img {
        width: 120px; /* Increased profile icon size */
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px; /* Increased margin */
    }

    h2 {
        font-size: 24px; /* Adjusted font size */
        margin-bottom: 10px;
        color: #fff;
        background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA); /* Gradient text */
        -webkit-background-clip: text; /* Safari and Chrome */
        background-clip: text; /* Firefox */
        font-weight: bold;
    }

    p {
        margin: 5px 0;
        color: #333;
    }

    .tasks-left {
        color: black;
        padding: 12px 25px;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 16px; /* Slightly larger font size */
        font-weight: bold;
    }

    .btn {
        display: block;
        background-color: white;
        color: black;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        width: 100%;
        max-width: 280px;
        transition: background-color 0.3s ease;
        font-size: 16px; /* Adjusted font size */
        font-weight: bold;
    }

    .btn:hover {
        background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA); /* Gradient text */
    }

    .input-group {
        margin-top: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .input-group input {
        width: calc(100% - 22px);
        padding: 12px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 280px;
    }

    .submit-btn {
        background-color: white;
        color: black;
        padding: 10px;
        margin: 15px 0;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        width: auto;
        max-width: 220px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        text-align: center;
        align-self: center;
    }

    .submit-btn:hover {
        background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA); /* Gradient text */
    }

    /* RESPONSIVE MEDIA QUERIES */
    @media (max-width: 768px) {
        .profile-container {
            max-width: 90%; /* Allow it to take up more space on smaller screens */
            height: auto; /* Remove fixed height to adjust for content */
        }

        .profile-icon img {
            width: 100px;
            height: 100px;
        }

        h2 {
            font-size: 20px;
        }

        .tasks-left {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
            max-width: 220px;
        }
    }
  </style>
</head>
<body>
  <?php include 'dashboard.php' ?>

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

  <script>
    // Profile form toggle scripts
    document.getElementById('changeUsernameBtn').addEventListener('click', function() {
        document.getElementById('changeUsernameForm').style.display = 'block';
        document.getElementById('changeEmailForm').style.display = 'none';
        document.getElementById('changePasswordForm').style.display = 'none';
    });

    document.getElementById('changeEmailBtn').addEventListener('click', function() {
        document.getElementById('changeEmailForm').style.display = 'block';
        document.getElementById('changeUsernameForm').style.display = 'none';
        document.getElementById('changePasswordForm').style.display = 'none';
    });

    document.getElementById('changePasswordBtn').addEventListener('click', function() {
        document.getElementById('changePasswordForm').style.display = 'block';
        document.getElementById('changeUsernameForm').style.display = 'none';
        document.getElementById('changeEmailForm').style.display = 'none';
    });

    function updateUsername() {
        const newUsername = document.getElementById('newUsername').value;
        const usernameRegex = /^[A-Za-z]+$/;
        if (newUsername === "") {
            alert("Please enter a new username.");
        } else if (usernameRegex.test(newUsername)) {
            document.getElementById('usernameDisplay').innerText = newUsername;
            document.getElementById('changeUsernameForm').style.display = 'none';
        } else {
            alert("Username must contain letters only.");
        }
    }

    function updatePassword() {
        const newPassword = document.getElementById('newPassword').value;
        const confirmNewPassword = document.getElementById('confirmNewPassword').value;
        const passwordRegex = /^(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
        if (newPassword === "") {
            alert("Please enter a new password.");
        } else if (confirmNewPassword === "") {
            alert("Please confirm your new password.");
        } else if (newPassword !== confirmNewPassword) {
            alert("Passwords do not match. Please try again.");
        } else if (passwordRegex.test(newPassword)) {
            alert("Password updated successfully!");
            document.getElementById('changePasswordForm').style.display = 'none';
        } else {
            alert("Password must contain at least one uppercase letter, one special character, and be at least 8 characters long.");
        }
    }

    function updateEmail() {
        const newEmail = document.getElementById('newEmail').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (newEmail === "") {
            alert("Please enter a new email.");
        } else if (emailRegex.test(newEmail)) {
            document.getElementById('emailDisplay').innerText = newEmail;
            document.getElementById('changeEmailForm').style.display = 'none';
        } else {
            alert("Please enter a valid email address.");
        }
    }
  </script>
</body>
</html>
