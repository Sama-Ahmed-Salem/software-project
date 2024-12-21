<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update password logic here
    // Validate and update the password in the database
    $new_password = $_POST["new_password"];
    
    // Your database logic to update password goes here
    // Example: $user->updatePassword($new_password);
    
    echo "Password updated successfully.";
}
?>

<form method="POST" action="change_password.php">
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <button type="submit">Submit</button>
</form>