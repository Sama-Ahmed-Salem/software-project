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
 case 'category-work':
     // Sort tasks to bring 'Work' category to the top, without deleting others
     tasks.sort((a, b) => {
         if (a.category === 'Work' && b.category !== 'Work') return -1;
         if (a.category !== 'Work' && b.category === 'Work') return 1;
         return 0; // Keep original order for other categories
     });
     break;
 case 'category-home':
     // Sort tasks to bring 'Home' category to the top, without deleting others
     tasks.sort((a, b) => {
         if (a.category === 'Home' && b.category !== 'Home') return -1;
         if (a.category !== 'Home' && b.category === 'Home') return 1;
         return 0; // Keep original order for other categories
     });
     break;
 case 'category-entertainment':
     // Sort tasks to bring 'Entertainment' category to the top, without deleting others
     tasks.sort((a, b) => {
         if (a.category === 'Entertainment' && b.category !== 'Entertainment') return -1;
         if (a.category !== 'Entertainment' && b.category === 'Entertainment') return 1;
         return 0; // Keep original order for other categories
     });
     break;
 default:
     break;
}

// Display tasks after sorting
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
