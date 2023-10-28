<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>
    <!-- <?php 
        // require_once('Doo.php'); 
        // // Create a new Database object
        // $db = new Database();
        // // Get a database connection
        // $connection = $db->getConnection();
    ?> -->
   
   
    <header>
        <img src="../images/logo.PNG" alt="logo" width="100" height="100">
    </header>
    <nav>
        <ul>
        <li><a href="../pages/home.php">Home</a></li>
        <li><a href="../pages/feed.php">Feed</a></li>
        <li><a href="../pages/about.php">About</a></li>
        <?php if (isset($_SESSION["user_id"])): ?>
            <li><a href="../pages/myprofile.php">My Profile</a></li>
            <li><a href="../pages/404.php">Log Out</a></li>
        <?php else: ?>
            <li><a href="../pages/login.php">Login</a></li>
            <li><a href="../pages/signup.php">Sign Up</a></li>
        <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
