<?php
// Database setup script
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "webteach_labmid";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
echo "Setup complete!\n";
?>
