<?php
require_once(__DIR__ . '/../database/database.php');

function get_vehicles($sort = 'price', $filter_type = null, $filter_id = null) {
    global $db;

    $allowed_sorts = ['price', 'year'];
    if (!in_array($sort, $allowed_sorts)) $sort = 'price';

    $query = "SELECT v.*, 
                     m.make_name AS make, 
                     t.type_name AS type, 
                     c.class_name AS class
              FROM vehicles v
              JOIN makes m ON v.make_id = m.make_id
              JOIN types t ON v.type_id = t.type_id
              JOIN classes c ON v.class_id = c.class_id";

    $params = [];
    if ($filter_type && $filter_id) {
        if ($filter_type === 'make') $query .= " WHERE v.make_id = :filter_id";
        if ($filter_type === 'type') $query .= " WHERE v.type_id = :filter_id";
        if ($filter_type === 'class') $query .= " WHERE v.class_id = :filter_id";
        $params[':filter_id'] = $filter_id;
    }

    $query .= " ORDER BY $sort DESC";

    $stmt = $db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}