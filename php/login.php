<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get login details from form
$reg_no = $_POST['registration_no'];
$password = $_POST['password'];

// Query to check if user exists
$sql = "SELECT * FROM login_data WHERE registration_no='$reg_no' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Check if user exists and redirect to home page if successful
if (mysqli_num_rows($result) == 1) {
	session_start();
	$_SESSION['registration_no'] = $reg_no;
	header('Location: /php/protected_page.php');
} else {
	// Display error message if login is unsuccessful
 echo "<script> alert('Invalid login details. Please try again.') </script>";
            echo"<script> window.open('/html/login.html','_self')</script>";
}

// Close MySQL connection
mysqli_close($conn);
?>
