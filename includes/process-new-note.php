<?php
require_once('helpers.php');
require_once('../config/config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $contact_id = (int)$_POST["contact_id"];
    $comment = $_POST["comment"];
    $created_by = $_POST["created_by"];

    // sanitize input
    $contactIdSanitized = sanitize($contact_id);
    $commentSanitized = sanitize($comment);
    $createdBySanitized = sanitize($created_by);
   
    
    // Call the addNewContact function
    $success = addNote($conn, $contactIdSanitized, $commentSanitized, $createdBySanitized);
}
?>
