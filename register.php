<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: sans-serif;
        }
        
        h1 {
            margin-top: 0;
        }
        
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        input[type="password"],
        input[type="submit"],
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="radio"] {
            margin-right: 10px;
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
    </style>
</head>
<body>
    <header>
        <h1><u>WELCOME</u></h1>
    </header>
    <main>
        <form action="database.php" method="post">
            <label for="regno">Registration no.:</label>
            <input type="number" id="regno" name="registration_no" placeholder="Enter Registration no." required>
            <label for="phone">Phone no:</label>
            <input type="tel" id="phone" name="phone_no" placeholder="+91" required>
            <label for="email">Email Id:</label>
            <input type="email" id="email" name="email_id" placeholder="Enter Email Id" required>
            <label>Select Gender:</label>
            <label for="male">
                <input type="radio" id="male" value="male" name="gender" required>MALE
            </label>
            <label for="female">
                <input type="radio" id="female" value="female" name="gender" required>FEMALE
            </label>
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
