<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $contact_id = (int)$_POST["contact_id"];
    $comment = $_POST["comment"];
    $created_by = $_POST["created_by"];

    // Validate form inputs
    $errors = [];

    if (empty($comment)) {
        $errors['comment'] = "Comment is required.";
    }


    // sanitize input
    else{
    $contactIdSanitized = sanitize($contact_id);
    $commentSanitized = sanitize($comment);
    $createdBySanitized = sanitize($created_by);
    
    // Call the addNewContact function
    addNote($conn, $contactIdSanitized, $commentSanitized, $createdBySanitized);
    }
    updateContact($conn, $contactIdSanitized);

}
?>
