<?php
session_start();
require __DIR__ . "/Doo.php";

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
    
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>My Profile - My Foto</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - MyProfile</h1>

    <section id="profile-section">
        <h2>My Profile</h2>
        <div class="profile-info">
            <div class="profile-picture">
                <!-- Display user profile picture here -->
                <img src="../images/profile.PNG" alt="Profile Picture" width="150" height="150">
            </div>
            <div class="profile-details">
            <?php if (isset($user)): ?>
                <h3><?= htmlspecialchars($user["name"]) ?></h3>
                <p>Email: <?= htmlspecialchars($user["email"]) ?></p>
            <?php endif; ?>
            </div>
        </div>

        <h3>My Photos</h3>
        <!-- Upload Button -->
        <div class="upload-button">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                
                <input type="text" name="filename" placeholder="File name">
                <input type="text" name="filetitle" placeholder="Image title">
                <input type="text" name="filedesc" placeholder="Image Description">
                <input type="file" name="file">
                <button type="submit" name="submit">Upload</button>

            </form>
        </div>

        <div class="user-photos">
            <!-- Display user's uploaded photos here -->
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
