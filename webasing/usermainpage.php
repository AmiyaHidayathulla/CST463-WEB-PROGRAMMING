<?php
session_start();
require 'config.php';

// Check if the user is logged in and is a student
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'student') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - STUDY MATE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="usermainpage.css"> <!-- Your CSS file -->
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1><span>STUDY MATE</span></h1>
            </div>
            <ul class="nav-links">
                <!-- <li><a href="#" data-page="add_task.php">Add Task</a></li> -->
                <li><a href="#" data-page="view_tasks.php">View Tasks</a></li>
                <li><a href="#" data-page="announcements.php">Announcements</a></li>
                <li><a href="#" data-page="profile.php">My Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main id="main-content">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <p>Select a section from the menu to view content.</p>
    </main>

    <!-- Footer -->
    <footer class="footer-section">
        <p>All rights reserved | sjcetpalai &copy;2024</p>
    </footer>

    <!-- JavaScript for Dynamic Content Loading -->
    <script>
        // Function to load content dynamically into the main-content section
        function loadContent(page) {
            fetch(page)
                .then(response => {
                    if (!response.ok) throw new Error("Network response was not ok");
                    return response.text();
                })
                .then(html => {
                    document.getElementById("main-content").innerHTML = html;
                })
                .catch(error => {
                    document.getElementById("main-content").innerHTML = "<p>Failed to load content.</p>";
                    console.error("Error loading page:", error);
                });
        }

        // Event listeners for navigation links
        document.querySelectorAll('.nav-links a[data-page]').forEach(link => {
            link.addEventListener('click', event => {
                event.preventDefault(); // Prevent default link behavior
                const page = event.target.getAttribute('data-page');
                loadContent(page); // Load content dynamically
            });
        });

        // Mobile menu toggle functionality
        const toggleButton = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        toggleButton.addEventListener('click', (event) => {
            navLinks.classList.toggle('active');
            event.stopPropagation();
        });

        document.addEventListener('click', (event) => {
            if (!navLinks.contains(event.target) && !toggleButton.contains(event.target)) {
                navLinks.classList.remove('active');
            }
        });
    </script>
</body>
</html>
