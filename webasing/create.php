<?php
// create_tables.php

// Database connection
$servername = "localhost"; // Your server name
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "study_mate";    // Your database name

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to create 'users' table
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    type ENUM('student', 'admin') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql_users)) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating 'users' table: " . mysqli_error($conn) . "<br>";
}

// SQL to create 'assignments' table
$sql_assignments = "CREATE TABLE IF NOT EXISTS assignments (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE,
    posted_by VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql_assignments)) {
    echo "Table 'assignments' created successfully.<br>";
} else {
    echo "Error creating 'assignments' table: " . mysqli_error($conn) . "<br>";
}

// SQL to create 'submissions' table (optional, if students submit assignments)
$sql_submissions = "CREATE TABLE IF NOT EXISTS submissions (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    assignment_id INT(11) NOT NULL,
    student_id INT(11) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('submitted', 'pending') DEFAULT 'submitted',
    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
)";

if (mysqli_query($conn, $sql_submissions)) {
    echo "Table 'submissions' created successfully.<br>";
} else {
    echo "Error creating 'submissions' table: " . mysqli_error($conn) . "<br>";
}

// Close connection
mysqli_close($conn);
?>
