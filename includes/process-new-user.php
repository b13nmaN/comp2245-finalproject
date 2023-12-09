<?php
require_once('helpers.php');
require_once('../config/config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // sanitize input
    $firstNameSanitized = sanitize($firstName);
    $lastNameSanitized = sanitize($lastName);
    $emailSanitized = sanitize($email);
    $passwordSanitized = sanitize($password);
    $passwordSanitizedAndHashed = password_hash($passwordSanitized,  PASSWORD_BCRYPT);
    $roleSanitized = sanitize($role);
    
    // Call the addNewContact function
    $success = newUser(
        $conn, 
        $firstNameSanitized, 
        $lastNameSanitized, 
        $emailSanitized, 
        $passwordSanitizedAndHashed, 
        $roleSanitized, 
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
