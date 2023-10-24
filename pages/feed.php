<?php
session_start();
require_once("../pages/Doo.php");
include("functions.php");

$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>Photo Feed - My Foto</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - Feed</h1>

    <section id="feed-section">
        <h2>Photo Feed</h2>
        // Add a grid of photos here 

        <p>Explore the latest photos shared by our talented photographers. Click on each photo to view it in full size and learn more about the photographers and their work.</p>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
