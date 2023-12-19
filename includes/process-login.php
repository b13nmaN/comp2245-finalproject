<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal

    $email = $_POST["email"];
    $password = $_POST["password"];


    // validate input
    $errors = [];
    if(empty($email)){
        $errors['email'] = "Email is required";
    }
    if(empty($password)){
        $errors['password'] = "Password is required";
    }

    else{
    // sanitize input
    $emailSanitized = sanitize($email);
    $passwordSanitized = sanitize($password);
    
    
    // Call the addNewContact function
    $success = login(
        $conn, 
        $emailSanitized, 
        $passwordSanitized,
    );

    session_start();
    $_SESSION['user'] = $success;
    
    }

} 
