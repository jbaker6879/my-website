
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Database connection
$conn = new mysqli('localhost', 'db_user', 'password', 'dropbox_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to upload files.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (example: max 50MB)
    if ($_FILES["file"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Upload file if everything is OK
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";

            // Insert file metadata into the database
            $filename = basename($_FILES["file"]["name"]);
            $user_id = $_SESSION['user_id'];  // Get the user ID from the session

            $sql = "INSERT INTO files (filename, user_id) VALUES ('$filename', $user_id)";
            if ($conn->query($sql) === TRUE) {
                echo "File metadata saved to the database successfully.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>