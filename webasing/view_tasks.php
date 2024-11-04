<h2>Your Tasks</h2>
<?php
// Fetch assignments from the database
$query = "SELECT * FROM assignments WHERE student_id = '" . $_SESSION['user_id'] . "' ORDER BY due_date ASC";
$result = mysqli_query($conn, $query);

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
