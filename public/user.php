<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userpage</title>
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
                <div class="input-container">
                    <input type="text" id="task-name" placeholder="Add a Task" required>
                    <input type="date" id="task-date">
                    <!-- Priority Selection -->
                    <div class="priority-selector">
                        <label for="task-priority">Priority:</label>
                        <select id="task-priority" name="task-priority">
                            <option value="">Select priority</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <!-- Category Selection -->
                    <div class="category-selector">
                        <label for="task-category">Category:</label>
                        <select id="task-category" name="task-category">
                            <option value="">Select Category</option>
                            <option value="Work">Work</option>
                            <option value="Home">Home</option>
                            <option value="Entertainment">Entertainment</option>
                        </select>
                    </div>
                    <button onclick="addTask()">Add Task</button>
                    <div class="task-added-message" id="task-message">Task added successfully!</div>
                </div>
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
                </div>
            </div>
            <div class="last-column">
            <!-- Calendar -->
            <div class="section calendar">
    <h2>Calendar</h2>
    <div class="calendar-header">
        <!-- Previous Month Button -->
        <img src="images\back.png" alt="" class="calendar-nav-button" id="prev-month" onclick="changeMonth(-1)">
        <span id="calendar-month-year"></span>
        <!-- Next Month Button -->
        <img src="images\next.png" alt="" class="calendar-nav-button" id="next-month" onclick="changeMonth(1)">
    </div>
    <div class="calendar-days" id="calendar-days"></div>
</div>

            <!-- Graph Analysis Section-->
            <div class="section Graph">
                <h2>Graph</h2>
                <canvas id="doneTasksChart" width="400" height="200"></canvas>
                
            </div>
        </div>
        </div>

       
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../public/js/user.js"></script>
</body>
</html>
