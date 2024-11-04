<?php
// register_user.php
require 'config.php';

if (isset($_POST['register'])) {
    // Get the username and password from POST
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if the username already exists
    $checkUserQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUserQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        
        if (mysqli_query($conn, $insertUserQuery)) {
            echo "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close the connection
mysqli_close($conn);
?>
