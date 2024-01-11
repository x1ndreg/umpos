<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pos_users';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to get the PDO instance
function getPDO() {
    global $pdo; // Assuming $pdo is defined in the global scope
    return $pdo;
}
?>
