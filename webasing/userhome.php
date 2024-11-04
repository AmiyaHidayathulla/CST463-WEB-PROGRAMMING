<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="userhome.css">
    <title>User Dashboard</title>
</head>
<body>
    <?php
    
    ?>
    <div class="dashboard-container">
        <h2>User Dashboard</h2>

        <!-- Filter and Sort Buttons -->
        <div class="filter-sort-buttons">
            <a href="#">Select All</a>
            <a href="#">Upcoming Deadlines</a>
            <a href="#">Filter by Date</a>
        </div>

        <!-- Task List -->
        <div class="tasks">
            <!-- Sample Task Item (Use PHP to dynamically generate these) -->
            <div class="task">
                <h3>Assignment 1: Math Homework</h3>
                <p>Complete all exercises in Chapter 5.</p>
                <p>Deadline: November 10, 2024</p>
                <form method="POST" action="#">
                    <button type="submit">Mark as Completed</button>
                </form>
            </div>

            <!-- Sample Completed Task Item -->
            <div class="task task-completed">
                <h3>Assignment 2: Science Project</h3>
                <p>Submit the completed project report.</p>
                <p>Deadline: November 5, 2024</p>
                <span class="completed-label">Completed</span>
            </div>
        </div>
    </div>
</body>
</html>
