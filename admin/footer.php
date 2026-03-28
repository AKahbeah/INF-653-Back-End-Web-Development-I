<nav style="margin-bottom: 15px;">
    <a href="index.php">Admin Home</a> |
    <a href="add_vehicle.php">Add Vehicle</a> |
    <a href="makes.php">Makes</a> |
    <a href="types.php">Types</a> |
    <a href="classes.php">Classes</a>
</nav>
<link rel="stylesheet" href="../css/style.css">
<?php
$pages = ['index'=>'Home', 'makes'=>'Makes', 'types'=>'Types', 'classes'=>'Classes', 'add_vehicle'=>'Add Vehicle'];
echo "<footer><ul>";
foreach($pages as $file => $label) {
    if (basename($_SERVER['PHP_SELF']) != "$file.php") {
        echo "<li><a href='$file.php'>$label</a></li>";
    }
}
echo "</ul></footer>";
?>