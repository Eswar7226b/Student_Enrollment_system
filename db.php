<?php

$servername = "localhost";  // Server where MySQL is hosted (default: localhost)

$username = "root";         // MySQL username (default: root)

$password = "";             // MySQL password (default: empty for XAMPP)

$dbname = "student_enrollment_db";  // Name of the database



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} 



echo "Database connected successfully!";

?>