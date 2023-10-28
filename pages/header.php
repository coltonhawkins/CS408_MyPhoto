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
            <li class="user-greeting">Hello, <?= htmlspecialchars($user["name"]) ?></li>
            <li><a href="../pages/logout.php">Log Out</a></li>
        <?php else: ?>
            <li><a href="../pages/login.php">Login</a></li>
            <li><a href="../pages/signup.php">Sign Up</a></li>
        <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
