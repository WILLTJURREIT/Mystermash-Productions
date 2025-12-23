<?php
//I wrote a basic PHP test script to validate that my User model behaves correctly when querying the database, and correctly handles the missing records.
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/User.php';

echo "Running User model test...\n";

// Test it to find a non existent user
$user = User::findByEmail($pdo, 'doesnotexist@example.com');

if ($user === false) {
    echo "PASS: non existent user returned false\n";
} else {
    echo "FAIL: expected false, got data\n";
}
