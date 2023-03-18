<?php
session_start(); // Make sure to start the session

// Check if the user is logged in
if (!isset($_SESSION['registration_no'])) {
    header('Location: index.html');
    exit();
}
if(isset($_SESSION['registration_no'])) {
    header('Location: /php/protected_page.php');
    exit();
}
?>
