<?php

session_start();
    include("Doo.php");
    include("functions.php");

    $database = new Database();
    $connection = $database->getConnection();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $username = $_POST['username'];
        $password_hash = $_POST['password_hash'];

        if(!empty($username) && !empty($password_hash) && !is_numeric($username)){

            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, username, password_hash) values ('$user_id', '$username', '$password_hash')";

            //saving to database
            mysqli_query($con, $query);

            header("Location: ../pages/login.php");
            die;
   
        }else{
            echo "Please enter some valid information!";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - SignUp</h1>

    <style>
        #box {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px 5px, 5px, 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>

    <div id="box">
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Signup">
            <a href="../pages/login.php">Click to Login</a>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>