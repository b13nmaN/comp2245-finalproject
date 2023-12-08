<?php

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
    
    // Call the addNewContact function
    $success = addNewContact($conn, $title, $firstName, $lastName, $email, $telephone, $company, $type, $assigned_to);

    if ($success) {
        echo "Contact added successfully!";
    } else {
        echo "Error adding contact.";
    }
} else {
    // Redirect back to the form if accessed directly without submitting
    header("Location: index.html");
    exit();
}
?>
