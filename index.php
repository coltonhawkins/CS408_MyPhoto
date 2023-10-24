<?php 
session_start();
$_SESSION;

    require("pages/home.php"); 
    include("Doo.php");
    include("functions.php");

    $user_data = check_login($con);

?>


