<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'dolphin_crm';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set PDO to throw exceptions for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully';
} catch (PDOException $e) {
    // echo 'Connection failed: ' . $e->getMessage();
}

