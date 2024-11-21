<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f1f7;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            flex: 1; /* Ensures content grows and pushes the logout button down */
        }

        .welcome-header {
            font-family: 'Lobster', sans-serif;
            font-size: 36px;
            background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA);
            margin-bottom: 30px;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 60%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #FFDAF5;
            border: 1px solid #ddd;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #CDC1FF;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #E6F7FF;
        }

        .logout-button {
            display: block;
            margin: 20px auto;
            background: linear-gradient(135deg, #BFECFF, #CDC1FF, #FFF6E3, #FFCCEA);
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .footer {
            text-align: center;
            padding: 20px;
        }
    </style>
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
        <button class="logout-button" onclick="window.location.href='landing.php'">Log Out</button>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('adminTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const usernameCell = rows[i].getElementsByTagName('td')[0];
                if (usernameCell) {
                    const username = usernameCell.textContent || usernameCell.innerText;
                    if (filter === "" || username.toUpperCase() === filter) {
                        rows[i].style.display = ""; // Show the row
                    } else {
                        rows[i].style.display = "none"; // Hide the row
                    }
                }
            }
        }
    </script>
</body>
</html>
