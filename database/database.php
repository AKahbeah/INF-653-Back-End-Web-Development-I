<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
$username = 'root';
$password = ''; // default XAMPP password

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "DB Connection failed: " . $e->getMessage();
    exit();
}