</form>
<?php
// Start the session to check if the user is logged in
session_start();

// Check if the user is logged in
if (!isset($_SESSION['registration_no'])) {
  // If the user is not logged in, redirect them to the login page
  header('Location: login.php');
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get the registration number from the session
$registration_no = $_SESSION['registration_no'];

// Execute a query to fetch the desired data for the given registration number
$sql = "SELECT * FROM login_data WHERE registration_no = '$registration_no'";
$result = $conn->query($sql);

// Fetch the data and store it in variables
while ($row = $result->fetch_assoc()) {
  $name = $row["name"];
  $course = $row["course"];
  $branch = $row["branch"];
  $phone_no = $row["Phone_no"];
  $email_id = $row["email_id"];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile Page</title>
  <style>
    .heading {
  text-align: center;
  background-color: #18d87f;
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
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    h1 {
      margin-top: 0;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<div class="heading">
        <img src="download.svg" id="_1">
        <h1><u><i>Welcome To MNNIT</i></u></h1>
    </div>
  <div class="container">
  <a href="protected_page.php"> | <- Go Back</a>
    <h1>Hello <?php echo $name; ?>!</h1>
    <p>This is your profile page.</p>
    
    <table>
      <tr>
        <th>Name</th>
        <td><?php echo $name; ?></td>
      </tr>
      <tr>
        <th>Registration Number</th>
        <td><?php echo $registration_no; ?></td>
      </tr>
      <tr>
        <th>Course</th>
        <td><?php echo $course; ?></td>
      </tr>
      <tr>
        <th>Branch</th>
        <td><?php echo $branch; ?></td>
      </tr>
      <tr>
        <th>Phone no.</th>
        <td><?php echo $phone_no; ?></td>
      </tr>
      <tr>
        <th>Email ID</th>
        <td><?php echo $email_id; ?></td>
      </tr>
    </table>
  </div>
</body>
</html>
