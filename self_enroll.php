<?php
include 'db.php';

// Fetch available courses
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Self-Enrollment</title>
</head>
<body>
    <h2>Student Enrollment Form</h2>
    
    <form action="process_enrollment.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required>
        <br><br>

        <label>Course:</label>
        <select name="course_id" required>
            <?php while ($course = $courses->fetch_assoc()) { ?>
                <option value="<?= $course['id']; ?>"><?= $course['course_name']; ?></option>
            <?php } ?>
        </select>
        <br><br>

        <button type="submit">Enroll</button>
    </form>

    <br>

    <!-- Button to View Enrollment List -->
    <form action="enrollment_list.php">
        <button type="submit">View Enrollment List</button>
    </form>

</body>
</html>