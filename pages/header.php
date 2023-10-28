<?php
session_start();

if(isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/Doo.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
} 


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
    <header>
        <img src="../images/logo.PNG" alt="logo" width="100" height="100">
    </header>
    <nav>
        <ul>
        <li><a href="../pages/home.php">Home</a></li>
        <li><a href="../pages/feed.php">Feed</a></li>
        <li><a href="../pages/about.php">About</a></li>
        <?php if (isset($user)): ?>
            <li><a href="../pages/myprofile.php">My Profile</a></li>
            <li style="display: inline-block; margin: 0 1em;">
            <span class="user-greeting" style="color: #3498db; font-size:1.8em; font-weight: bold; display: inline-block; padding: 5px 10px; border: 1px solid transparent; border-radius: 5px; transition: background-color 0.3s, border-color 0.3s;">Hello, <?= htmlspecialchars($user["name"]) ?></span>
            <li><a href="../pages/logout.php">Log Out</a></li>
        <?php else: ?>
            <li><a href="../pages/login.php">Login</a></li>
            <li><a href="../pages/signup.php">Sign Up</a></li>
        <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
