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
    
    // Call the addNewContact function
    // newUser(
    //     $conn, 
    //     $firstNameSanitized, 
    //     $lastNameSanitized, 
    //     $emailSanitized, 
    //     $passwordSanitizedAndHashed, 
    //     $roleSanitized, 
    // );

}
