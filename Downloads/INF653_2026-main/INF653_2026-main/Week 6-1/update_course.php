<?php
require('model/database.php');
require('model/assignment_db.php');
require('model/course_db.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM courses WHERE courseID = :course_id';
$statement = $db->prepare($query);
$statement->bindValue(':course_id', $course_id);
$statement->execute();
$course = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
</head>
<body>

<h2>Update Course</h2>

<form action="." method="post">
    <input type="hidden" name="action" value="update_course">
    <input type="hidden" name="course_id" value="<?php echo $course['courseID']; ?>">

    Course Name:
    <input type="text" name="course_name" value="<?php echo $course['courseName']; ?>">

    <br><br>

    <input type="submit" value="Update Course">

</form>

</body>
</html>