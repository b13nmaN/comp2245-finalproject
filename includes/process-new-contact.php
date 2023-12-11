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
    
    // Call the addNewContact function
    $success = addNewContact(
        $conn, 
        $titleSanitized, 
        $firstNameSanitized, 
        $lastNameSanitized, 
        $emailSanitized, 
        $telephoneSanitized, 
        $companySanitized, 
        $typeSanitized, 
        $assigned_toSanitized,
        "$firstNameSanitized $lastNameSanitized"
    );

//     if ($success) {
//         echo "Contact added successfully!";
//     } else {
//         echo "Error adding contact.";
//     }
// } else {
//     // Redirect back to the form if accessed directly without submitting
//     header("Location: index.html");
//     exit();
}
?>
