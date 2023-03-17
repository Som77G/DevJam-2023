<?php
// start session
session_start();

// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST["name"];
    $reg_no =  $_POST["registration_no"];
    $course =  $_POST["course"];
    $branch =  $_POST["branch"];
    $phone_no = $_POST["phone_no"];
    $email_id = $_POST["email_id"];
    $gender = $_POST["gender"];
    $password =  $_POST["password"];

    // check if registration number already exists
    $sql = "SELECT * FROM login_data WHERE registration_no='$reg_no'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 0) {
        // registration number is available, insert new user data
        $sql = "INSERT INTO login_data (name,registration_no,course,branch, phone_no, email_id, gender, password)
                VALUES ('$name','$reg_no','$course','$branch', '$phone_no', '$email_id', '$gender', '$password')";

        if (mysqli_query($conn, $sql)) {
            // registration succeeded, set session variables and redirect to main page
            $_SESSION["registration_no"] = $reg_no;
            $_SESSION["loggedin"] = true;
            echo "<script> alert('registered successfully.') </script>";
            echo"<script> window.open('login.html','_self')</script>";
        } else {
            echo "Error registering user: " . mysqli_error($conn);
        }
    } else {
        echo "Registration number already exists. Please use a different registration number.";
    }
}

// close database connection
mysqli_close($conn);
?>
