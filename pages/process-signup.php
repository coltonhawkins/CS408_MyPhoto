<?php

//validating name
if(empty($_POST["name"])) {
    die("Please enter your name");
}

//validating the email
if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

//validating the password
if(strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters long");
}

//checking if password contains a letter
if( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

//checking if password contains a number
if( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

//password confirmation
if($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords do not match");
}

//hashing the password and this function salts it too
$password_hash = password_hash($_POST["password_confirmation"], PASSWORD_DEFAULT);

//database connection
$mysqli = require __DIR__ . "/Doo.php";

//sql statement to insert the data into the database
$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
//preparing the sql statement
$stmt = $mysqli->stmt_init();

//checking if the sql statement is valid
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//binding the parameters to the sql statement
$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);

//Profile Image Code

 $id = $_SESSION['user_id'];
 $sql2 = "SELECT * FROM user WHERE user_id='$id'";
 $result2 = $mysqli->query($sql2);

 if(mysqli_num_rows($result2) > 0){
     while($row = mysqli_fetch_assoc($result2)){
         $id = $row['user_id'];
         $sql2 = "INSERT INTO profileimg (user_id, status) VALUES ($id, 1)";
         $result2 = $mysqli->query($sql2);
     }
 }else{
    echo "You have an error!";
 }             

//executing the sql statement
if ($stmt->execute()) {
    header("Location: ../pages/signup-successful.php");
    exit;
    
} else {
    //checking if the email is already taken
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

