<?php
include 'db.php';

// Fetch enrolled students with course details
$sql = "SELECT students.name, students.email, courses.course_name 
        FROM enrollments 
        JOIN students ON enrollments.student_id = students.id 
        JOIN courses ON enrollments.course_id = courses.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enrollment List</title>
</head>
<body>
    <h2>Enrolled Students</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['course_name']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="self_enroll.php">Back to Enrollment</a>
</body>
</html>

<?php
$conn->close();
?>