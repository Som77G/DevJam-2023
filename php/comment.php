<?php
session_start();
  date_default_timezone_set('Asia/Kolkata');
  $conn= mysqli_connect('localhost', 'root', '', 'register');

  if(!$conn){
      die("Connect failed: ".mysqli_connect_error());
   
  }
      function setComments($conn){
        $registration_no = $_SESSION['registration_no'];
        $sql1 = "SELECT * FROM login_data WHERE registration_no = '$registration_no'";
        $result1 = $conn->query($sql1);
while ($row = $result1->fetch_assoc()) {
    $name = $row["name"];
  }
         if (isset($_POST['commentSubmit'])){
            $date = $_POST['date'];
            $message = $_POST['message'];
     
            $sql = "INSERT INTO comments (name,date, message) VALUES ('$name','$date', '$message')";
            $result = $conn->query($sql);
         
         } 
      }
   
      function getComments($conn){
// Fetch the data and store it in variables
         $sql2 = "SELECT * FROM comments";
         $result2 = $conn->query($sql2);
         while($row = $result2->fetch_assoc()){
             echo "<div class= 'comment-box'>" ;
             echo $row['name']."<br>";
             echo $row['date']."<br>";
             echo nl2br($row['message'])."<br><br>";
             echo "</div>";
           }
      } 
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Document</title>
   <style>
    body{
    background-color: #ddd;
}
.heading {
    text-align: center;
    background-color: rgb(15, 154, 124);
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
textarea{
    width: 500px;
    height: 80px;
    background-color: #fff;
    resize: none;
}
button{
    width:80px;
    height: 30px;
    background-color: #282828;
    border:none;
    color: #fff;
    font-family: aerial;
    font-weight: aerial;
    font-weight: 400;
    cursor:pointer;
    margin-bottom:60px;
    margin-left:200px;
    margin-top:5px;
}
.comment-box{
    max-width: 500px;
    padding: 10px;
    margin: 5px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow:0 0 5px black;
    margin-left:400px;
}
.para{
    font-size:20px;
    margin-left:120px;

}
.name{
    padding-bottom: 0px;
    margin-left:400px;
} 
   </style>
</head>
<body>
    <?php
        echo "<form method='POST' action='".setComments($conn)."'>
            <div class='heading'>
                <img src='download.svg' id='_1'>
                <h1><u><i>Interact with other Users.</i></u></h1>
            </div>
            <br>
            <a href='protected_page.php'><b>| <- Go Back</b></a>
            <br>
            <div class='name'>  
                <input type='hidden' name='date' value='".date( 'Y-m-d H:i:s')."'>
                <textarea name='message'> </textarea><br>
                <button type='submit' name='commentSubmit'>Comment</button>
            </div>
        </form>";

    getComments($conn);
    ?>
    
</body>
</html>
