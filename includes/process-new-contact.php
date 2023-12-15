<?php
require_once('helpers.php');
require_once('../config/config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $title = $_POST["Title"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["email"];
    $telephone = $_POST["number"];
    $company = $_POST["company"];
    $type = $_POST["type"];
    $assigned_to = $_POST["assign-to"];
    $created_by = $_POST["created_by"];

    echo $assigned_to;

    // sanitize input
    $titleSanitized = sanitize($title);
    $firstNameSanitized = sanitize($firstName);
    $lastNameSanitized = sanitize($lastName);
    $emailSanitized = sanitize($email);
    $telephoneSanitized = sanitize($telephone);
    $companySanitized = sanitize($company);
    $typeSanitized = sanitize($type);
    $assigned_toSanitized = sanitize($assigned_to);
    $created_bySanitized = sanitize($created_by);
    
    // Call the addNewContact function
    // $success = addNewContact(
    //     $conn, 
    //     $titleSanitized, 
    //     $firstNameSanitized, 
    //     $lastNameSanitized, 
    //     $emailSanitized, 
    //     $telephoneSanitized, 
    //     $companySanitized, 
    //     $typeSanitized, 
    //     $assigned_toSanitized,
    //     $created_bySanitized
    // );

        // header('Location: /comp2245-finalproject/index.php/new-contact');
        // exit();
}
?>
