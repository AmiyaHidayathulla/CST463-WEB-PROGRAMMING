<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDY MATE - Register</title>
</head>
<body>
    <h2>Register for STUDY MATE</h2>
    <form action="register_user.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit" name="register">Register</button>
    </form>
    <br>
    <!-- Link to Login Page -->
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
