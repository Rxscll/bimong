<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306", "root", "");
    echo "Connected successfully\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS library_db");
    echo "Database library_db ensured\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
