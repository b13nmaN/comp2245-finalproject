<?php
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: /comp2245-finalproject/login.php");
    exit();

?>
