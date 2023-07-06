<?php
$servername = "localhost"; // Replace with the appropriate hostname or IP address
$username = "root"; // Replace with your phpMyAdmin username
$password = ""; // Replace with your phpMyAdmin password
$database = "lib"; // Replace with the name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





//echo "Connected successfully";

?>