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

//hashing the password
$password_hash = password_hash($_POST["password_confirmation"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/Doo.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

// if ( ! $stmt->prepare($sql)) {
//     die("SQL error: " . $mysqli->error);
// }

// $stmt->bind_param("sss",
//                   $_POST["name"],
//                   $_POST["email"],
//                   $password_hash);

echo "User created successfully";

print_r($_POST);
var_dump($password_hash);