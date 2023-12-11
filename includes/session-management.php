<?php
session_start();

if ($_SESSION['user'] ?? null) {
    $userData = $_SESSION['user'];
} else {
    echo "User data not set in the session.";
}
// Rest of your code
