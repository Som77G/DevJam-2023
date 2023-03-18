<?php
// Start the session to logout the user
session_start();

// Destroy the session variable
session_destroy();

// Redirect the user to the login page
header('Location: index.html');
exit();
?>
