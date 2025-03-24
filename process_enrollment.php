<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course_id = $_POST["course_id"];

    // Check if student already exists
    $checkStudent = $conn->query("SELECT id FROM students WHERE email = '$email'");
    
    if ($checkStudent->num_rows > 0) {
        // Student exists, get their ID
        $student = $checkStudent->fetch_assoc();
        $student_id = $student['id'];
    } else {
        // Insert new student
        $conn->query("INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')");
        $student_id = $conn->insert_id; // Get last inserted ID
    }

    // Check if the student is already enrolled in the course
    $checkEnrollment = $conn->query("SELECT * FROM enrollments WHERE student_id = '$student_id' AND course_id = '$course_id'");
    
    if ($checkEnrollment->num_rows == 0) {
        // Enroll student
        $enrollQuery = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";
        
        if ($conn->query($enrollQuery) === TRUE) {
            echo "Enrollment successful! <a href='self_enroll.php'>Back</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "You are already enrolled in this course. <a href='self_enroll.php'>Back</a>";
    }
}

$conn->close();
?>