<?php
// this is the database connection file, it creates a single PDO connection that is used throughout the app, and Using this PDO allows prepared statements and helps prevent SQL injection.

/** PDO Database Connection credentials **/
$DB_HOST = 'localhost';
$DB_NAME = 'mystermash_productions';
$DB_USER = 'root';
$DB_PASS = '';


try {
    // Create a new PDO instance with UTF-8 support
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}