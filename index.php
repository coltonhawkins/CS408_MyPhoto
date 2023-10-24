<?php 
session_start();
$_SESSION;

    require("pages/home.php"); 
    include("Doo.php");
    include("functions.php");
   
    $database = new Database();
    $connection = $database->getConnection();

    $user_data = check_login($con);

?>


