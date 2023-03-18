<?php
// Start the session to check if the user is logged in
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check if the user is logged in
if (!isset($_SESSION['registration_no'])) {
  // If the user is not logged in, redirect them to the login page
  header('Location: login.php');
  exit();
}
$registration_no = $_SESSION['registration_no'];
$sql = "SELECT * FROM login_data WHERE registration_no = '$registration_no'";
$result = $conn->query($sql);

// Fetch the data and store it in variables
while ($row = $result->fetch_assoc()) {
  $name = $row["name"];
}

// If the user is logged in, display the protected page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="protected_page.css">
</head>
<body>
    
    <header>
        <img src="download.svg" id="_1">
		<h1><u>Welcome to MNNIT Committees</u></h1>
		<nav>
            <ul>
                <a href="aboutus.html">About Us |</a>
                <div class="dropdown">
                    <button class="dropbtn">Committees |</button>
                    <div class="dropdown-content">
                      <a href="art.html" >| Arts Committee</a>
                      <a href="bhangra.html">| Bhangra Committee</a>
                      <a href="music.html">| Music Committee</a>
                      <a href="Rajasthani.html">| Rajasthani Committee</a>
                      <a href="bengali.html">| Bengali Committee</a>
                    </div>
                </div>
                <a href="media.html">Media |</a>
                <a href="joiningForm.php">Join A Committee |</a>
                <span>
                    <a href="profile.php"><img src="image5.png" id="_2"> | <?php echo $name ; ?></a>
                    <a href="comment.php">| Chat</a>
                <a href="logout.php" id="_3"> | Logout</a>
                </span>
                
            </ul>
        </nav>
	</header>

    <br><br>

    <main>
        <img src="image4.jpg" id="_3">
            <div id="news-headlines">
                <h2>Latest News</h2>
                <ul id="news-list">
                    <li><a href="#">Breaking news item</a></li>
                    <li><a href="#">Another breaking news item</a></li>
                    <li><a href="#">Third breaking news item</a></li>
                </ul>
            </div>
            <script src="news.js"></script>
                <p>College committees play an important role in the functioning of educational institutions. They are usually made up of faculty members, staff, and students, and their purpose is to address a variety of issues related to the college's mission and operations. </p>

                <p><u>Types of College Committees:</u> There are many types of college committees, each with its own purpose and function. Some of the most common committees include academic committees, such as curriculum and assessment committees, student life committees, such as admissions and student services committees, and administrative committees, such as finance and facilities committees.</p>
            <section id="RCC">
                <p><u>Responsibilities of College Committees:</u> The responsibilities of college committees vary depending on their type and function. Some committees are responsible for developing policies and procedures, while others are responsible for making recommendations to the administration or the board of trustees. Some committees also oversee the implementation of policies and programs.</p>
            </section>
            <section id="CM">
                <p><u>Committee Membership:</u> College committees are typically made up of faculty members, staff, and students. The members are usually appointed by the college administration or elected by their peers. It is important that committees reflect the diversity of the college community and that all voices are heard.</p>
            </section>
            <section id="MP">
                <p><u>Meeting Procedures:</u> College committees usually meet on a regular basis to discuss issues and make decisions. Meetings should be conducted in a respectful and professional manner, and members should be prepared to contribute to the discussion. It is also important that committees keep accurate records of their meetings and decisions.</p>
            </section>
            <section id="CCC">
                <p><u>Communication with the College Community:</u> College committees should communicate their work and decisions to the college community. This can be done through newsletters, websites, or other means of communication. It is important that the college community is aware of the work of the committees and has an opportunity to provide feedback.</p>
            </section>
                <p>Overall, college committees play an important role in ensuring that colleges operate effectively and efficiently. By addressing issues related to academics, student life, and administration, committees help to create a positive learning environment for students and a productive work environment for faculty and staff.</p>

    </main>

    <footer>
        <p  class="f">College Committees &copy; MNNIT-Allahabad</p>
    </footer>
</body>
</html>

