<?php
// Database connection settings
$servername = "localhost";  // Or the database host provided by Hostinger
$username = "u736502773_didiy";  // DB username
$password = "PASSWORD";        // DB password
$database = "u736502773_blur";   // DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
