<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Board</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .container{
            width: 100%;
        }
        body {
            display: flex;
            background-color: #f0f1f7;
            width: 100%;
        }
           /* Header section */
           .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 15px 30px;
            background-color: #0056b3;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 20px;
        }

        .header .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .header .dashboard-title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Main container with grid layout */
        .main-container {
            display: flex;
            flex-grow: 1;
            width: 100%;
            padding: 20px;
            gap: 20px;
            overflow-y: auto;
            height: 90%;

        }

        /* Existing styles */
        .first-column {
            display: flex;
            gap: 25px;
            width: 100%;
            padding-top: 25px;
            padding-left: 30px;
        }

        .last-column {
            display: flex;
            flex-direction: column;
            gap: 5%;
            width: 100%;
            height: 100%;
        }
        /* Section styles */
        .section {
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            width: 100%;

        }

        /* Specific colors for each section */
        .add-edit {
            background: #E6F7FF;
        }
        .section.add-edit{
            width: 100%;
        }

        .task { 
            background-color: #FFDAF5; 
            display: flex;
            flex-direction: column;
        }

        .calendar {
            background-color: #ddd;
        }

        .graph {
            background-color: #CDC1FF;
            height: 100%;
        }

        /* Fancy styles for Add/Edit/Remove Task */
        .add-edit h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .input-container input[type="text"],
        .input-container input[type="date"],
        .input-container select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Input focus and hover styles */
        .input-container input[type="text"]:focus,
        .input-container input[type="date"]:focus,
        .input-container select:focus,
        .input-container input[type="text"]:hover,
        .input-container input[type="date"]:hover,
        .input-container select:hover {
            border-color: #007bff;
            box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        /* Stylish button */
        .input-container button {
            padding: 12px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .input-container button:hover {
            background: linear-gradient(135deg, #0056b3, #004080);
            transform: translateY(-2px);
        }

        .priority-selector, .category-selector {
            margin-top: 10px;
        }

        .task-added-message {
            margin-top: 15px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            display: none;
            animation: fadeIn 0.5s;
        }

        /* Fade-in effect for task added message */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Calendar task display styles */
        .calendar-tasks {
            margin-top: 10px;
            max-height: 300px;
            overflow-y: auto;
        }

        .task-item {
            padding: 10px;
            margin: 5px 0;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-item .task-info {
            flex-grow: 1;  /* Allow task details to take up available space */
        }

        .task-item img {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-left: 10px;
        }
         /* Added style for done task icon */
         .task-item img.done {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Styling for Task View header and filter dropdown */
        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            width: 100%;
        }

        .task-header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-right: 15px;
        }

        .task-header select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .task-header select:hover,
        .task-header select:focus {
            border-color: #007bff;
        }

        /* Stylish button */
        .input-container button {
            padding: 12px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .input-container button:hover {
            background: linear-gradient(135deg, #0056b3, #004080);
            transform: translateY(-2px);
        }

        .priority-selector, .category-selector {
            margin-top: 10px;
        }

        .task-added-message {
            margin-top: 15px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            display: none;
            animation: fadeIn 0.5s;
        }

        /* Calendar section styles */
.calendar {
    background-color: #FFF6E3;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 10px;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    margin-bottom: 15px;
}

.calendar-nav-button {
    width: 30px;
    height: 30px;
    cursor: pointer;
}

.calendar-nav-button:hover {
    opacity: 0.7;
}

#calendar-month-year {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    text-align: center;
}

.calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    width: 100%;
}

.calendar-day {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.calendar-day:hover {
    background-color: #ddd;
}

.calendar-day.current {
    background-color: #007bff;
    color: #fff;
    border-radius: 50%;
}

    </style>
</head>
<body>
    <?php include 'dashboard.php'; ?>
    <div class="container">
    <header class="header">
        <div class="dashboard-title">Todo List Dashboard</div>
        <div class="profile">

            <span>Welcome John Doe!</span>
        </div>
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
    <script>
        // Dummy Task Data
        let tasks = [];
        let completedTasksCount = 0;
         // Initialize the chart
    const ctx = document.getElementById('doneTasksChart').getContext('2d');
    const doneTasksChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Completed Tasks'],
            datasets: [{
                label: 'Tasks Done',
                data: [completedTasksCount],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10 // You can adjust the max value based on expected task completions
                }
            }
        }
    });
        // Add Task Function
        function addTask() {
            const taskName = document.getElementById('task-name').value;
            const taskDate = document.getElementById('task-date').value;
            const taskPriority = document.getElementById('task-priority').value;
            const taskCategory = document.getElementById('task-category').value;
            
            if (taskName && taskDate && taskPriority && taskCategory) {
                const task = {
                    name: taskName,
                    date: taskDate,
                    priority: taskPriority,
                    category: taskCategory
                };
                tasks.push(task);
                displayTasks();
                document.getElementById('task-name').value = '';
                document.getElementById('task-date').value = '';
                document.getElementById('task-priority').value = '';
                document.getElementById('task-category').value = '';
                document.getElementById('task-message').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('task-message').style.display = 'none';
                }, 2000);
            }
        }

        function displayTasks() {
    const tasksContainer = document.getElementById('tasks');
    tasksContainer.innerHTML = '';
    tasks.forEach((task, index) => {
        const taskElement = document.createElement('div');
        taskElement.classList.add('task-item');
        taskElement.innerHTML = `
            <div class="task-info">
                <p><strong>${task.name}</strong></p>
                <p>Date: ${task.date}</p>
                <p>Priority: ${task.priority}</p>
                <p>Category: ${task.category}</p>
            </div>
           <img src="images/done.png" alt="Done" class="done" onclick="markAsDone(${index})">

            <img src="images/delete.png" alt="Delete" onclick="deleteTask('${task.name}')">
        `;
        tasksContainer.appendChild(taskElement);
    });
}

function markAsDone(taskIndex) {
    const task = tasks[taskIndex];
    // Mark the task as done
    const taskElement = document.querySelectorAll('.task-item')[taskIndex];
    if (taskElement) {
        taskElement.style.textDecoration = "line-through";
        completedTasksCount++;
        updateChart();
    }
}
 // Update chart data
 function updateChart() {
        doneTasksChart.data.datasets[0].data[0] = completedTasksCount;
        doneTasksChart.update();
    }

        // Delete Task Function
        function deleteTask(taskName) {
            tasks = tasks.filter(task => task.name !== taskName);
            displayTasks();
        }

        // Apply Filter Function
        function applyFilter() {
            const filter = document.getElementById('task-filter').value;
            switch (filter) {
                case 'date-old-new':
                    tasks.sort((a, b) => new Date(a.date) - new Date(b.date));
                    break;
                case 'date-new-old':
                    tasks.sort((a, b) => new Date(b.date) - new Date(a.date));
                    break;
                case 'priority-high-low':
                    tasks.sort((a, b) => a.priority === 'High' ? -1 : (b.priority === 'High' ? 1 : 0));
                    break;
                case 'priority-low-high':
                    tasks.sort((a, b) => a.priority === 'Low' ? -1 : (b.priority === 'Low' ? 1 : 0));
                    break;
                default:
                    break;
            }
            displayTasks();
        }
        let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

// Function to change month
function changeMonth(direction) {
    currentMonth += direction;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    } else if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar();
}

// Function to render the calendar
function renderCalendar() {
    const calendarDays = document.getElementById("calendar-days");
    const monthYearDisplay = document.getElementById("calendar-month-year");

    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);

    const totalDays = lastDay.getDate();
    const startingDay = firstDay.getDay(); // 0 = Sunday, 6 = Saturday

    calendarDays.innerHTML = ''; // Clear previous calendar days

    // Display the month and year in the header
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    monthYearDisplay.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    // Add empty cells for the days before the 1st of the month
    for (let i = 0; i < startingDay; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.classList.add('calendar-day');
        calendarDays.appendChild(emptyCell);
    }

    // Add day numbers to the calendar
    for (let day = 1; day <= totalDays; day++) {
        const dayCell = document.createElement('div');
        dayCell.classList.add('calendar-day');
        dayCell.textContent = day;
        calendarDays.appendChild(dayCell);
    }
}

// Initial render of the calendar
renderCalendar();

    </script>
</body>
</html>
