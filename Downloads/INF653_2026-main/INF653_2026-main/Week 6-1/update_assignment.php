<?php
require('model/database.php');
require('model/assignment_db.php');
require('model/course_db.php');

$assignment_id = filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);

$assignment = get_assignment($assignment_id);
$courses = get_courses();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Assignment</title>
</head>
<body>

<h2>Update Assignment</h2>

<form action="." method="post">

    <input type="hidden" name="action" value="update_assignment">
    <input type="hidden" name="assignment_id" value="<?php echo $assignment['ID']; ?>">

    Description:
    <input type="text" name="description" value="<?php echo $assignment['Description']; ?>">

    <br><br>

    Course:
    <select name="course_id">
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['courseID']; ?>"
                <?php if ($course['courseID'] == $assignment['courseID']) echo 'selected'; ?>>
                <?php echo $course['courseName']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <input type="submit" value="Update Assignment">

</form>

</body>
</html>