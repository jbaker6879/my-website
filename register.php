<?php
// Database connection
$conn = new mysqli('localhost', 'db_user', 'password', 'dropbox_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the username is unique
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_query);
    
    if ($result->num_rows > 0) {
        echo "Username already exists.";
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!-- HTML Registration Form -->
<form action="register.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>