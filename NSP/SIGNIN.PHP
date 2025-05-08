<?php
include 'connect.php'; // Database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $fullname = $_POST['fullname'];        
    $username = $_POST['username'];
    $enterprise = $_POST['enterprise'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['set_password'], PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];   
    

    // Check if passwords match
    $password = trim($_POST['set_password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }
    
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (fullname, username, enterprise, email, mobile, password) 
            VALUES ('$fullname', '$username', '$enterprise', '$email', '$mobile', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
