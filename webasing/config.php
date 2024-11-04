<?php
// config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "study_mate"; // Make sure this is the database name where the users table is created

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connection Established";
}
?>
