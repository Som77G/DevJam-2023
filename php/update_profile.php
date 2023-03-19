<?php
session_start();
$reg_no = $_SESSION['registration_no'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated details from the form
    $new_name = $_POST['name'];
    $new_course = $_POST['course'];
    $new_branch = $_POST['branch'];
    $new_phone_no = $_POST['Phone_no'];
    $new_email = $_POST['email_id'];

    // Update the user's details in the database
    $conn = mysqli_connect("localhost", "root", "", "register");
    $sql = "UPDATE login_data SET name='$new_name', course='$new_course', branch='$new_branch', phone_no='$new_phone_no', email_id='$new_email' WHERE registration_no='$reg_no'";
    $result = mysqli_query($conn, $sql);

    // Display a success message or error message
    if ($result) {
        echo "<script>alert('Profile updated successfully!')</script>";
        echo"<script> window.open('profile.php','_self')</script>";
    } else {
        echo "<script>alert('Error updating profile. Please try again.')</script>";
    }
}

// Fetch the current user's details from the database
$conn = mysqli_connect("localhost", "root", "", "register");
$sql = "SELECT * FROM login_data WHERE registration_no='$reg_no'";
$result = mysqli_query($conn, $sql);

// Check if there was an error fetching the user's details from the database
if (!$result) {
    echo "<script>alert('Error fetching user details. Please try again.')</script>";
    exit;
}

$current_user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Update Profile</title>
    <style>
        .heading {
  text-align: center;
  background-color:rgb(15, 154, 124);
  /* border: 2px solid rgb(107, 57, 21); */
  height: 15vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
#_1{
  float:left;
  height:55px;
}
main{
    padding-top:50px
}
        body {
            background-color: #f5f5f5;
            font-family: sans-serif;
        }
        
        h1 {
            margin-top: 15px;
        }
        
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="submit"],
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }
        
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        
        footer {
  background-color: #333;
  color: #fff;
  padding-bottom: 15px;
  text-align: center;
  font-size: 14px;
}
.f{
  padding-top:50px;
}
</style>
</head>
<body>
<header>
<div class="heading">
        <img src="download.svg" id="_1">
        <h1><u><i>UPDATE PROFILE</i></u></h1>
    </div>
    </header>
    <br>
    <a href="profile.php">| <- Go Back</a>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $current_user['name']; ?>">
        <br>
        <label for="course">Course:</label>
        <input type="text" name="course" value="<?php echo $current_user['course']; ?>">
        <br>
        <label for="branch">Branch:</label>
        <input type="text" name="branch" value="<?php echo $current_user['branch']; ?>">
        <br>
        <label for="phone_no">Phone No:</label>
        <input type="tel" name="Phone_no" value="<?php echo $current_user['Phone_no']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email_id" value="<?php echo $current_user['email_id']; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
    <footer>
        <p  class="f">College Committees &copy; MNNIT-Allahabad</p>
    </footer>
</body>
</html>
