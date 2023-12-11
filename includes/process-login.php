<?php
require_once('helpers.php');
require_once('../config/config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal

    $email = $_POST["email"];
    $password = $_POST["password"];


    // sanitize input
 
    $emailSanitized = sanitize($email);
    $passwordSanitized = sanitize($password);
    $passwordSanitizedAndHashed = password_hash($passwordSanitized,  PASSWORD_BCRYPT);
    
    // Call the addNewContact function
    $success = login(
        $conn, 
        $emailSanitized, 
        $passwordSanitizedAndHashed,
    );

    if($success){
        header("Location: /comp2245-finalproject/index.php/home");
        exit();
    }
    else{
        echo "Enter correct email and password";
    }

}
