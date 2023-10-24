<?php
session_start();
$_SESSION;

require_once("../pages/Doo.php");
include("functions.php");
$database = new Database();
$connection = $database->getConnection();

$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>About Us - My Foto</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - About Us</h1>

    <section id="about-section">
        <h2>About My Foto</h2>
        <p>Welcome to My Foto, your destination for sharing and exploring captivating moments captured through the lens. We're passionate about photography and the stories that unfold in every image.</p>

        <p>Our mission is to provide a platform where photographers of all levels can showcase their talent, connect with fellow enthusiasts, and inspire others with their visual narratives.</p>

        <h3>Our Vision</h3>
        <p>We envision a world where every photograph serves as a window to a unique perspective, a glimpse into the beauty of the world, and a source of inspiration for all.</p>

        <h3>Why Choose My Foto?</h3>
        <ul>
            <li><strong>Inspiration:</strong> Discover a wide range of photos that ignite your creativity and passion for photography.</li>
            <li><strong>Community:</strong> Join a vibrant community of photographers, share your work, and receive feedback from fellow artists.</li>
            <li><strong>Accessibility:</strong> My Foto is accessible to photographers of all backgrounds and experience levels.</li>
            <li><strong>Safe and Secure:</strong> We prioritize the security and privacy of your content and personal information.</li>
        </ul>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
