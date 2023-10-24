<?php

session_start();
   
    include("functions.php");


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - SignUp</h1>

    <form>
    
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your Username">
        </div>

        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
        </div>

        <button>Sign Up</button>
    </form>

   

    <?php include 'footer.php'; ?>
</body>
</html>