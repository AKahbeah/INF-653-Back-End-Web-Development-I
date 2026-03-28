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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $make_id = $_POST['make_id'];
    $type_id = $_POST['type_id'];
    $class_id = $_POST['class_id'];

    $stmt = $db->prepare("INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
                          VALUES (:year, :model, :price, :make_id, :type_id, :class_id)");
    $stmt->execute([
        ':year'=>$year, ':model'=>$model, ':price'=>$price,
        ':make_id'=>$make_id, ':type_id'=>$type_id, ':class_id'=>$class_id
    ]);

    header("Location: index.php");
    exit();
}

// Fetch options for dropdowns
$makes = $db->query("SELECT make_id, make_name FROM makes")->fetchAll(PDO::FETCH_ASSOC);
$types = $db->query("SELECT type_id, type_name FROM types")->fetchAll(PDO::FETCH_ASSOC);
$classes = $db->query("SELECT class_id, class_name FROM classes")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle - Admin</title>
</head>
<body>
    <h1>Add New Vehicle</h1>
    <form method="POST">
        Year: <input type="number" name="year" required><br>
        Model: <input type="text" name="model" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>

        Make:
        <select name="make_id" required>
            <?php foreach($makes as $m): ?>
            <option value="<?= $m['make_id'] ?>"><?= $m['make_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        Type:
        <select name="type_id" required>
            <?php foreach($types as $t): ?>
            <option value="<?= $t['type_id'] ?>"><?= $t['type_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        Class:
        <select name="class_id" required>
            <?php foreach($classes as $c): ?>
            <option value="<?= $c['class_id'] ?>"><?= $c['class_name'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Add Vehicle">
    </form>
    <p><a href="index.php">Back to Admin Home</a></p>
</body>
</html>
<?php include('footer.php'); ?>