<nav style="margin-bottom: 15px;">
    <a href="index.php">Admin Home</a> |
    <a href="add_vehicle.php">Add Vehicle</a> |
    <a href="makes.php">Makes</a> |
    <a href="types.php">Types</a> |
    <a href="classes.php">Classes</a>
</nav>
<link rel="stylesheet" href="../css/style.css">
<?php
require_once(__DIR__ . '/../model/vehicles_db.php');

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $db->prepare("DELETE FROM vehicles WHERE id = :id");
    $stmt->execute([':id' => $delete_id]);
    header("Location: index.php");
    exit();
}

$vehicles = get_vehicles(); // reuse model function
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Zippy Used Autos</title>
</head>
<body>
    <h1>Admin: Vehicle Inventory</h1>
    <p><a href="add_vehicle.php">Add New Vehicle</a> | 
       <a href="makes.php">Manage Makes</a> | 
       <a href="types.php">Manage Types</a> | 
       <a href="classes.php">Manage Classes</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Year</th>
            <th>Model</th>
            <th>Price</th>
            <th>Make</th>
            <th>Type</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
        <?php foreach($vehicles as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['year'] ?></td>
            <td><?= $v['model'] ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
            <td><?= $v['make'] ?></td>
            <td><?= $v['type'] ?></td>
            <td><?= $v['class'] ?></td>
<!-- Delete temporarily disabled -->
<!-- <a href="index.php?delete_id=<?= $v['id'] ?>" onclick="return confirm('Delete this vehicle?')">Delete</a> -->
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php include('footer.php'); ?>