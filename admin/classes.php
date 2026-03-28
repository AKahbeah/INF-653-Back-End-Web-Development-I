<nav style="margin-bottom: 15px;">
    <a href="index.php">Admin Home</a> |
    <a href="add_vehicle.php">Add Vehicle</a> |
    <a href="makes.php">Makes</a> |
    <a href="types.php">Types</a> |
    <a href="classes.php">Classes</a>
</nav>
<link rel="stylesheet" href="../css/style.css">
<?php
require_once(__DIR__ . '/../database/database.php');

// Add Class
if (isset($_POST['class_name'])) {
    $stmt = $db->prepare("INSERT INTO classes (class_name) VALUES (:name)");
    $stmt->execute([':name'=>$_POST['class_name']]);
    header("Location: classes.php");
    exit();
}

// Delete Class
if (isset($_GET['delete_id'])) {
    $stmt = $db->prepare("DELETE FROM classes WHERE class_id = :id");
    $stmt->execute([':id'=>$_GET['delete_id']]);
    header("Location: classes.php");
    exit();
}

// Get all classes
$classes = $db->query("SELECT class_id, class_name FROM classes")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Admin Home</a> |
    <a href="add_vehicle.php">Add Vehicle</a> |
    <a href="makes.php">Makes</a> |
    <a href="types.php">Types</a> |
    <a href="classes.php">Classes</a>
</nav>

<h1>Manage Classes</h1>

<form method="POST">
    Add Class: <input type="text" name="class_name" required>
    <input type="submit" value="Add">
</form>

<h2>Existing Classes</h2>
<ul>
    <?php foreach($classes as $c): ?>
    <li><?= $c['class_name'] ?>
        <a href="classes.php?delete_id=<?= $c['class_id'] ?>" onclick="return confirm('Delete this class?')">Delete</a>
    </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
<?php include('footer.php'); ?>