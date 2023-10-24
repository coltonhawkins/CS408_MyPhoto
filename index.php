<?php 
session_start();
$_SESSION;

    require("pages/home.php"); 
    require_once("pages/Doo.php");
    // Create a new Database object
    $db = new Database();
    // Get a database connection
    $connection = $db->getConnection();

?>


