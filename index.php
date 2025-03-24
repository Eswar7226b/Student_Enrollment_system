<?php
include 'db.php';

// Fetch students
$students = $conn->query("SELECT * FROM students");

// Fetch courses
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Course Enrollment</title>
</head>
<body>
    <h2>Enroll a Student in a Course</h2>
    <form action="enroll.php" method="POST">
        <label>Student:</label>
        <select name="student_id">
            <?php while ($student = $students->fetch_assoc()) { ?>
                <option value="<?= $student['id']; ?>"><?= $student['name']; ?></option>
            <?php } ?>
        </select>
        <br><br>

        <label>Course:</label>
        <select name="course_id">
            <?php while ($course = $courses->fetch_assoc()) { ?>
                <option value="<?= $course['id']; ?>"><?= $course['course_name']; ?></option>
            <?php } ?>
        </select>
        <br><br>

        <button type="submit">Enroll</button>
    </form>

    <h2>Enrolled Students</h2>
    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Enrolled At</th>
        </tr>
        <?php
        $enrollments = $conn->query("SELECT students.name AS student_name, 
            courses.course_name, enrollments.enrolled_at 
            FROM enrollments 
            JOIN students ON enrollments.student_id = students.id 
            JOIN courses ON enrollments.course_id = courses.id");

        while ($row = $enrollments->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['student_name']}</td>
                    <td>{$row['course_name']}</td>
                    <td>{$row['enrolled_at']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>