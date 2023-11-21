<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// User details
// $email = 'admin@project2.com';
// $passwordPlain = 'password123';

// Hash the password
// $hashedPassword = password_hash($passwordPlain, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement
// $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
// $stmt->bindParam(':email', $email);
// $stmt->bindParam(':password', $hashedPassword);
// $stmt->execute();

$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(":email", $email);
$stmt->execute();
$fetch_user_table = $stmt->fetchAll(PDO::FETCH_ASSOC);


