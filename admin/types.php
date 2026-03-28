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

// Add Type
if (isset($_POST['type_name'])) {
    $stmt = $db->prepare("INSERT INTO types (type_name) VALUES (:name)");
    $stmt->execute([':name'=>$_POST['type_name']]);
    header("Location: types.php");
    exit();
}

// Delete Type
if (isset($_GET['delete_id'])) {
    $stmt = $db->prepare("DELETE FROM types WHERE type_id = :id");
    $stmt->execute([':id'=>$_GET['delete_id']]);
    header("Location: types.php");
    exit();
}

// Get all types
$types = $db->query("SELECT type_id, type_name FROM types")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Types</title>
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

<h1>Manage Types</h1>

<form method="POST">
    Add Type: <input type="text" name="type_name" required>
    <input type="submit" value="Add">
</form>

<h2>Existing Types</h2>
<ul>
    <?php foreach($types as $t): ?>
    <li><?= $t['type_name'] ?>
        <a href="types.php?delete_id=<?= $t['type_id'] ?>" onclick="return confirm('Delete this type?')">Delete</a>
    </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
<?php include('footer.php'); ?>