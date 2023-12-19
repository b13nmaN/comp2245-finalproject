<?php
// Start session before using session variables
session_start();
session_destroy();
unset($_SESSION['user']);
header("Location: /comp2245-finalproject/login.php"); // Redirect to login page
exit();

?>
