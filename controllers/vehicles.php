<?php
require_once(__DIR__ . '/../model/vehicles_db.php');

$sort = $_GET['sort'] ?? 'price'; // default sort
$filter_type = $_GET['filter_type'] ?? null; // 'make', 'type', or 'class'
$filter_id = $_GET['filter_id'] ?? null;     // the selected ID

$vehicles = get_vehicles($sort, $filter_type, $filter_id);

include(__DIR__ . '/../view/vehicle_list.php');