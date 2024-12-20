<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update username logic here
    // Validate and update the username in the database
    $new_username = $_POST["new_username"];
    
    // Your database logic to update username goes here
    // Example: $user->updateUsername($new_username);
    
    echo "Username updated successfully.";
}
?>

<form method="POST" action="change_username.php">
    <label for="new_username">New Username:</label>
    <input type="text" id="new_username" name="new_username" required>
    <button type="submit">Submit</button>
</form>
