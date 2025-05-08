<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // Default password is empty in XAMPP
$dbname = "stock_manager"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
