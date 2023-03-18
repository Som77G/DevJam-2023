<?php
$conn= mysqli_connect('localhost', 'root', '', 'register');

if(!$conn){
    die("Connect failed: ".mysqli_connect_error());
    
}


function setSubmit($conn) {
    if (isset($_POST['submit'])) {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $semester = $_POST['semester'];
        $registrationNumber = $_POST['registrationNumber'];
        $branch = $_POST['branch'];
        $committees = implode(",", $_POST['committee']);
        $other_committee = $_POST['other_committee'];
        $interests = $_POST['interests'];
        $skills = $_POST['skills'];
        $goals = $_POST['goals'];

        // Insert form data into database
        $sql = "INSERT INTO joiningcommittees (name, email, semester, registrationNumber, branch, committee, other_committee, interests, skills, goals) VALUES ('$name', '$email', '$semester', '$registrationNumber','$branch','$committees','$other_committee','$interests','$skills','$goals')";
       $result = $conn->query($sql);

	   if($result) {
		echo "<script> alert('Form Submitted Successfully')</script>";
		echo "<script>window.open('index.html')</script>";

	   }
	   else {
		echo "<script> alert('Wrong Entries')</script>";
	   }
    }
}

  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>College Committee Joining Form</title>
	<link rel="stylesheet" href="joiningForm.css">
</head>
<body>
	<a href="previous_page.php"><b>| <- Go Back</b></a>
    <br>
	<h1>College Committee Joining Form</h1>
	<?php
	echo "<form  method='POST' action='".setSubmit($conn)."'>
	<label for='name'>Name:</label>
	<input type='text' id='name' name='name' required><br><br>

	<label for='email'>Email:</label>
	<input type='email' id='email' name='email' required><br><br>

	<label for='semester'>Semester:</label>
	<input type='text' id='semester' name='semester' required><br><br>

	<label for='registrationNumber'>Registration Number:</label>
	<input type='number' id='registrationNumber' name='registrationNumber' required><br><br>


	<label for='branch'>Branch:</label>
	<input type='text' id='' name='branch' required><br><br>

	<label>Which committee are you interested in joining? (Please check all that apply)</label><br>
	<input type='checkbox' id='thalaivaCommittee' name='committee[]' value='thalaivaCommittee'>
	<label for='thalaivaCommittee'>Thalaiva Committee</label><br>
	<input type='checkbox' id='bengaliCommittee' name='committee[]' value='bengaliCommittee'>
	<label for='bengaliCommittee'>Bengali Committee</label><br>
	<input type='checkbox' id='rajasthaniCommittee' name='committee[]' value='rajasthaniCommittee'>
	<label for='rajasthaniCommittee'>Rajasthani Committee</label><br>
	<input type='checkbox' id='artsCommittee' name='committee[]' value='artsCommittee'>
	<label for='artsCommittee'>Arts Committee</label><br>
	<input type='checkbox' id='westernCommittee' name='committee[]' value='westernCommittee'>
	<label for='westernCommittee'>Western Committee</label><br>
	<input type='checkbox' id='mhmCommittee' name='committee[]' value='mhmCommittee'>
	<label for='mhmCommittee'>MHM Committee</label><br>
	<input type='checkbox' id='musicCommittee' name='committee[]' value='musicCommittee'>
	<label for='musicCommittee'>Music Committee</label><br>
	<input type='checkbox' name='committee[]' id='bhangraCommittee' value='bhangraCommittee'>
	<label for='bhangraCommittee'>Bhangra Committee</label><br>
	<input type='checkbox' name='committee[]' id='coreDramatics' value='coreDramatics'>
	<label for='coreDramatics'>Core Dramatics</label><br>
	
	<label for='other'>Other (please specify):</label>
	<input type='text' id='other' name='other_committee'><br><br>

	<label for='interests'>Why are you interested in joining this committee(s)?</label><br>
	<textarea id='interests' name='interests' rows='5' cols='50' required></textarea><br><br>

	<label for='skills'>What skills and experiences do you bring to this committee(s)?</label><br>
	<textarea id='skills' name='skills' rows='5' cols='50' required></textarea><br>

	<label for='goals'>What are your goals?</label><br>
	<textarea id='goals' name='goals' rows='5' cols='50' required></textarea><br>

	<button type='submit' name='submit'>Submit</button>
	</form>";
	?>
</body>
</html>
