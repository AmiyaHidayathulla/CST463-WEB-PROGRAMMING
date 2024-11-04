<?php
// admin_home.php
session_start();
require 'config.php';

if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Add new assignment
if (isset($_POST['add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);

    $sql = "INSERT INTO assignments (title, description, due_date, posted_by) VALUES ('$title', '$description', '$due_date', 'admin')";
    mysqli_query($conn, $sql);
    header("Location: admin_home.php");
}

// Delete assignment
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM assignments WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: admin_home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - STUDY MATE</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <form method="POST">
        <h3>Add New Assignment</h3>
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date">
        <br><br>
        <button type="submit" name="add">Add Assignment</button>
    </form>

    <h3>Existing Assignments</h3>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM assignments ORDER BY due_date ASC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h4>" . htmlspecialchars($row['title']) . "</h4>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Due Date: " . htmlspecialchars($row['due_date']) . "</p>";
        echo "<a href='admin_home.php?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this assignment?\");'>Delete</a>";
        echo "</div><br>";
    }
    ?>

    <a href="logout.php">Logout</a>
</body>
</html>
