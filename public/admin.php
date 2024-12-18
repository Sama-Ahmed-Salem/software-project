<?php
require '../app/db/config.php'; 
require '../app/model/admin-class.php'; 

$admin = new Admin($conn);

//
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to access the admin panel.";  // Send a user-friendly message if not logged in
    exit;
}

$username = $_SESSION['username'];  // Get the logged-in user's username

// Check if the logged-in user is an admin
$sql = "SELECT role FROM tb_user WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($role);
$stmt->fetch();
$stmt->close();

// If the user is not an admin, show a message or redirect them
if ($role !== 'admin') {
    echo "You do not have the necessary permissions to access this page.";  // Inform the user they are not an admin
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <div class="container">
        <h1 class="welcome-header">Welcome Admin</h1>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by Username..." onkeyup="filterTable()">
        </div>
        <table id="adminTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Task</th>
                    <th>Task Status</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>

            <?php
    $users = $admin->retrieveUsers(); // Retrieve users using the Admin class
    foreach ($users as $user) {
        echo "<tr>
            <td>" . htmlspecialchars($user['name']) . "</td>
            <td>" . htmlspecialchars($user['email']) . "</td>
            <td>--</td> <!-- Placeholder for Task -->
            <td>--</td> <!-- Placeholder for Task Status -->
            <td>" . htmlspecialchars($user['feedback']) . "</td>
        </tr>";
    }
    ?>



                <!-- <tr>
                    <td>JohnDoe</td>
                    <td>john.doe@example.com</td>
                    <td>Active</td>
                    <td>Design Dashboard</td>
                    <td>In Progress</td>
                    <td>Looks good!</td>
                </tr>
                <tr>
                    <td>JohnDoe</td>
                    <td>john.doe2@example.com</td>
                    <td>Active</td>
                    <td>Fix Bug #123</td>
                    <td>Pending</td>
                    <td>Work on priority!</td>
                </tr>
                <tr>
                    <td>JaneSmith</td>
                    <td>jane.smith@example.com</td>
                    <td>Inactive</td>
                    <td>Update Reports</td>
                    <td>Completed</td>
                    <td>Great job!</td>
                </tr> -->
            </tbody>
        </table>
    </div>
    <div class="footer">
        <button class="logout-button" onclick="window.location.href='app/views/landing.php'">Log Out</button>
    </div>

    <script src="./js/admin.js"></script>
</body>
</html>
