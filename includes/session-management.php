<?php
session_start();

// Check if the user is set in the session
if ($_SESSION['user'] ?? null) {
    $userData = $_SESSION['user'];
    // Check if the user is already on the home page
}
?>

