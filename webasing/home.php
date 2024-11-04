<?php
// home.php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Fetch assignments from the database
$query = "SELECT * FROM assignments ORDER BY due_date ASC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDY MATE - Home</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { color: #4CAF50; }
        .assignment { border: 1px solid #ddd; padding: 10px; margin: 10px 0; }
        .due-date { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> to STUDY MATE</h2>
    <p>Here are the latest tasks and assignments posted by the admin:</p>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='assignment'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            if (!empty($row['due_date'])) {
                echo "<p class='due-date'>Due Date: " . htmlspecialchars($row['due_date']) . "</p>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>No assignments available at the moment.</p>";
    }
    ?>

    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
