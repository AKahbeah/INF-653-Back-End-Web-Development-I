<link rel="stylesheet" href="../css/style.css">
<?php
// This block calculates the filter query for sort links
$filter_query = '';
if (isset($_GET['filter_type']) && isset($_GET['filter_id'])) {
    $filter_query = '&filter_type=' . $_GET['filter_type'] . '&filter_id=' . $_GET['filter_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Vehicle Inventory</h1>

    <!-- SORT LINKS -->
    <p>
        Sort by: 
        <a href="?sort=price<?= $filter_query ?>">Price</a> | 
        <a href="?sort=year<?= $filter_query ?>">Year</a>
    </p>

    <!-- FILTER FORM -->
    <form method="GET">
        Filter by:
        <select name="filter_type" onchange="this.form.submit()">
            <option value="">--Select--</option>
            <option value="make" <?= (isset($_GET['filter_type']) && $_GET['filter_type']=='make')?'selected':'' ?>>Make</option>
            <option value="type" <?= (isset($_GET['filter_type']) && $_GET['filter_type']=='type')?'selected':'' ?>>Type</option>
            <option value="class" <?= (isset($_GET['filter_type']) && $_GET['filter_type']=='class')?'selected':'' ?>>Class</option>
        </select>

        <select name="filter_id" onchange="this.form.submit()">
            <option value="">--Select--</option>
            <?php
            // Dynamically populate second dropdown based on selected filter type
            if (isset($_GET['filter_type'])) {
                $ftype = $_GET['filter_type'];
                $table_map = ['make'=>'makes','type'=>'types','class'=>'classes'];
                $id_map = ['make'=>'make_id','type'=>'type_id','class'=>'class_id'];
                $name_map = ['make'=>'make_name','type'=>'type_name','class'=>'class_name'];

                if (isset($table_map[$ftype])) {
                    $table = $table_map[$ftype];
                    $id_col = $id_map[$ftype];
                    $name_col = $name_map[$ftype];
                    $stmt = $db->query("SELECT $id_col, $name_col FROM $table");
                    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        $selected = (isset($_GET['filter_id']) && $_GET['filter_id']==$row[$id_col]) ? "selected" : "";
                        echo "<option value='{$row[$id_col]}' $selected>{$row[$name_col]}</option>";
                    }
                }
            }
            ?>
        </select>
    </form>

    <!-- VEHICLES TABLE -->
    <table border="1" cellpadding="5">
        <tr>
            <th>Year</th>
            <th>Model</th>
            <th>Price</th>
            <th>Make</th>
            <th>Type</th>
            <th>Class</th>
        </tr>
        <?php foreach($vehicles as $v): ?>
        <tr>
            <td><?= $v['year'] ?></td>
            <td><?= $v['model'] ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
            <td><?= $v['make'] ?></td>
            <td><?= $v['type'] ?></td>
            <td><?= $v['class'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<nav style="margin-bottom: 15px;">
    <a href="/zippyusedautos/">Home</a>
</nav>
</html>