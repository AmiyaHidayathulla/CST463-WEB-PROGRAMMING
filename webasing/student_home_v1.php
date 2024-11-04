<?php
// student_home.php
session_start();
require 'config.php';

if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'student') {
    header("Location: login.php");
    exit;
}

// Fetch assignments
$query = "SELECT * FROM assignments ORDER BY due_date ASC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard - STUDY MATE</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>Here are your tasks and assignments:</p>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            if (!empty($row['due_date'])) {
                echo "<p>Due Date: " . htmlspecialchars($row['due_date']) . "</p>";
            }
            echo "</div><br>";
        }
    } else {
        echo "<p>No assignments available at the moment.</p>";
    }
    ?>

    <a href="logout.php">Logout</a>
</body>
</html>
