<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];

    $sql = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
exit();
?>