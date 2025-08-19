<?php
// Establish MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dms_db"; // Corrected the database name

// Create a new mysqli object and check the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If you want to set the character set to UTF-8 (optional)
// $conn->set_charset("utf8");

// Now you can use $conn for your database operations

?>
