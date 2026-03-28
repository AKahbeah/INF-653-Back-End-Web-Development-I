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

// Handle Add
if (isset($_POST['make_name'])) {
    $stmt = $db->prepare("INSERT INTO makes (make_name) VALUES (:name)");
    $stmt->execute([':name'=>$_POST['make_name']]);
    header("Location: makes.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete_id'])) {
    $stmt = $db->prepare("DELETE FROM makes WHERE make_id = :id");
    $stmt->execute([':id'=>$_GET['delete_id']]);
    header("Location: makes.php");
    exit();
}

// Fetch all makes
$makes = $db->query("SELECT make_id, make_name FROM makes")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Makes</title>
</head>
<body>
    <h1>Manage Makes</h1>

    <form method="POST">
        Add Make: <input type="text" name="make_name" required>
        <input type="submit" value="Add">
    </form>

    <h2>Existing Makes</h2>
    <ul>
        <?php foreach($makes as $m): ?>
        <li><?= $m['make_name'] ?> 
            <a href="makes.php?delete_id=<?= $m['make_id'] ?>" onclick="return confirm('Delete this make?')">Delete</a>
        </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="index.php">Back to Admin Home</a></p>
</body>
</html>
<?php include('footer.php'); ?>