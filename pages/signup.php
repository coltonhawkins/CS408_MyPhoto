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
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - SignUp</h1>

    <style>
        /* Style the form container */
    form {
        width: 300px;
        margin: 0 auto;
    }

    /* Style the form elements */
    div {
        margin: 10px 0;
    }

    label {
        display: block; /* Place labels on a new line */
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #007BFF; /* Change border color on focus */
    }

    button {
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
}

button:hover {
    background-color: #0056b3; /* Darker color on hover */
}

    </style>

    <form>
    
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your Username">
        </div>

        <div>
            <label for="email">Email</label>
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