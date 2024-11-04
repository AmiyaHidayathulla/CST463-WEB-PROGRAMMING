<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDY MATE - Login</title>
</head>
<body>
    <h2>Login to STUDY MATE</h2>
    <form action="validate.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <br>
    <!-- Link to Registration Page -->
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
