<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];



    // validate input
    $errors = [];
    if (empty($firstName)) {
        $errors['fname'] = "First name is required";
    }
    if (empty($lastName)) {
        $errors['lname'] = "Last name is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required";
    }
    
    else {
    // sanitize input
    $firstNameSanitized = sanitize($firstName);
    $lastNameSanitized = sanitize($lastName);
    $emailSanitized = sanitize($email);
    $passwordSanitized = sanitize($password);
    $passwordSanitizedAndHashed = password_hash($passwordSanitized,  PASSWORD_BCRYPT);
    $roleSanitized = sanitize($role);
    
    // Call the addNewContact function
    newUser(
        $conn, 
        $firstNameSanitized, 
        $lastNameSanitized, 
        $emailSanitized, 
        $passwordSanitizedAndHashed, 
        $roleSanitized, 
    );
    }
}
