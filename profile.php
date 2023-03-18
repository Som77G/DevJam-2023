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
    @media screen and (max-width: 768px) {
    .heading {
        height: 12vh;
    }
    
    nav {
        flex-direction: column;
        height: 5vh;
    }
    
    nav a {
        padding: 5px;
    }
} 

  
  h1, h2 {
    margin: 0;
  }
  
  h1 {
    background-color:rgb(15, 154, 124);
    font-size: 30px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align:center;
    padding:20px 0px;
    font-style:italic;
  }
  
  h2 {
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 20px;
    margin-bottom: 10px;
  }
  
  /* Style the navigation menu */
  nav {
    background-color:rgb(15, 154, 124);
    color: #fff;
    padding: 10px;
    margin-bottom: 20px;
  }
  
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
  }
  
  nav li {
    margin: 0 10px;
  }
  
  nav a {
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    padding:10px;
  }
  
  nav a:hover {
    color: #f5f5f5;
  }
  

#_1{
    float:left;
    height:120px;
}
#_2{
    height: 20px;
    border-radius:50%;
    margin-top:5px;
  }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding-bottom: 200px;
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
    .btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }
    .btn:hover {
            background-color: #3e8e41;
        }
        footer {
  background-color: #333;
  color: #fff;
  padding-bottom: 20px;
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
        <img src="download.svg" id="_1">
		<h1><u>PROFILE</u></h1>
		<nav>
            <ul>
                <a href="update_profile.php">Update profile |</a>
                <a href="media.html">Media |</a>
                <a href="logout.php">Logout |</a>
                
                
            </ul>
        </nav>
	</header>

    <br><br>
    <a href="protected_page.php"> | <- Go Back</a>
  <div class="container">
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
    <br>
    <!-- <button onclick="window.location.href='update_profile.php';" class="btn">Update</button> -->
  </div>
  <footer>
        <p  class="f">College Committees &copy; MNNIT-Allahabad</p>
    </footer>
</body>
</html>
