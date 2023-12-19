<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "test";
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

    // Validate form inputs
    $errors = [];

    if (empty($firstName)) {
        $errors['fname'] = "First Name is required.";
    }

    if (empty($lastName)) {
        $errors['lname'] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['inval_email'] = "Invalid email format.";
    }

    if (empty($company)) {
        $errors['company'] = "Company is required.";
    }

    // Add more validation rules as needed for other fields

    else  {
        // Sanitize input
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
        addNewContact(
            $conn, 
            $titleSanitized, 
            $firstNameSanitized, 
            $lastNameSanitized, 
            $emailSanitized, 
            $telephoneSanitized, 
            $companySanitized, 
            $typeSanitized, 
            $assigned_toSanitized,
            $created_bySanitized
        );

    }
}


?>
