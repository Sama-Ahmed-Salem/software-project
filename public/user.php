<?php
require '../app/db/config.php'; // Database configuration
require '../app/model/user_class.php';

// Check if the user is signed in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Create a User object
$user = new User($conn);

// Handle Task Submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-task'])) {
    $taskName = htmlspecialchars($_POST['task-name'], ENT_QUOTES, 'UTF-8');
    $taskDate = $_POST['task-date'];
    $taskPriority = $_POST['task-priority'];
    $taskCategory = $_POST['task-category'];

    $user->submitTask($taskName, $taskDate, $taskPriority, $taskCategory);
    $message = $user->getMessage();
}

// Handle Task Deletion or Completion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read raw POST data
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (isset($inputData['task_id']) && isset($inputData['action'])) {
        $taskId = intval($inputData['task_id']);

        if ($inputData['action'] === 'delete') {
            // Delete the task
            $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
            $stmt->bind_param("i", $taskId);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $conn->error]);
            }
        } elseif ($inputData['action'] === 'done') {
            // Mark the task as Complete
            $stmt = $conn->prepare("UPDATE tasks SET task_status = 'Complete' WHERE id = ?");
            $stmt->bind_param("i", $taskId);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $conn->error]);
            }
        }
        exit; // End the script after processing the request
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../public/css/user.css">
</head>
<body>
    <?php include '../app/views/dashboard.php'; ?>
    <div class="container">
        <header class="header">
            <div class="dashboard-title">Todo List Dashboard</div>
        </header>

        <!-- Main Container for Sections -->
        <div class="main-container">
            <div class="first-column">
                <!-- Add/Edit/Remove Tasks Section -->
                <div class="section add-edit">
                    <h2>Tasks</h2>
                    <form method="POST" action="">
                        <div class="input-container">
                            <input type="text" name="task-name" placeholder="Add a Task" required>
                            <input type="date" name="task-date">
                            <div class="priority-selector">
                                <label for="task-priority">Priority:</label>
                                <select name="task-priority" id="task-priority">
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="category-selector">
                                <label for="task-category">Category:</label>
                                <select name="task-category" id="task-category">
                                    <option value="Work">Work</option>
                                    <option value="Home">Home</option>
                                    <option value="Entertainment">Entertainment</option>
                                </select>
                            </div>
                            <button type="submit" name="add-task">Add Task</button>
                        </div>
                    </form>
                    <?php if (!empty($message)) echo "<div class='task-added-message'>$message</div>"; ?>
                </div>

                <!-- Tasks Section -->
                <div class="section task">
                    <div class="task-header">
                        <h2>Task View</h2>
                        <select id="task-filter" onchange="applyFilter()">
                            <option value="none">Filter by Date and Priority</option>
                            <option value="date-old-new">Date: Old to New</option>
                            <option value="date-new-old">Date: New to Old</option>
                            <option value="priority-high-low">Priority: High to Low</option>
                            <option value="priority-low-high">Priority: Low to High</option>
                            <option value="category-work">Category: Work</option>
                            <option value="category-home">Category: Home</option>
                            <option value="category-entertainment">Category: Entertainment</option>
                        </select>
                    </div>
                    <div class="tasks" id="tasks">
                        <!-- Task items will appear here -->
                        <?php
                        // Fetch tasks for the logged-in user
                        $tasks = $user->fetchTasks();
                        if ($tasks->num_rows > 0) {
                            while ($task = $tasks->fetch_assoc()) {
                                $completedClass = $task['task_status'] === 'Complete' ? 'completed' : '';
                                $doneVisibility = $task['task_status'] === 'Complete' ? 'style="display:none;"' : '';

                                echo "<div class='task-item $completedClass' data-task-id='" . htmlspecialchars($task['id']) . "'>";
                                echo "<strong class='task_name'>" . htmlspecialchars($task['task_name']) . "</strong><br>";
                                echo "Date: " . htmlspecialchars($task['task_date']) . "<br>";
                                echo "Priority: " . htmlspecialchars($task['task_priority']) . "<br>";
                                echo "Category: " . htmlspecialchars($task['task_category']) . "<br>";
                                echo "<img src='images/done.png' alt='Done' class='done' $doneVisibility>";
                                echo "<img src='images/delete.png' alt='Delete' class='delete'>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No tasks added yet.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Last Column -->
            <div class="last-column">
                <!-- Calendar -->
                <div class="section calendar">
                    <h2>Calendar</h2>
                    <div class="calendar-header">
                        <img src="images/back.png" alt="" class="calendar-nav-button" id="prev-month" onclick="changeMonth(-1)">
                        <span id="calendar-month-year"></span>
                        <img src="images/next.png" alt="" class="calendar-nav-button" id="next-month" onclick="changeMonth(1)">
                    </div>
                    <div class="calendar-days" id="calendar-days"></div>
                </div>

                <!-- Graph Analysis Section -->
                <div class="section Graph">
                    <h2>Graph</h2>
                    <canvas id="doneTasksChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../public/js/user.js"></script>
</body>
</html>
