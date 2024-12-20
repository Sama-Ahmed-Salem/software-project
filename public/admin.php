<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/admin.css">
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
                    <th>Status</th>
                    <th>Task</th>
                    <th>Task Status</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
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
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <button class="logout-button" onclick="window.location.href='app/views/landing.php'">Log Out</button>
    </div>

    <script src="public/js/admin.js"></script>
</body>
</html>
