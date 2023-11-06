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
    <link rel="stylesheet" type="text/css" href="../css/myprofile.css">
    <title>My Gallery - My Foto</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - My Gallery</h1>


    <section id="photos-section">
        <h3>My Photos</h3>
        <div class="gallery-container">
            <?php
            session_start(); 
            require __DIR__ . "/Doo.php";

            $user_id = $_SESSION["user_id"];
            $sql = "SELECT * FROM gallery WHERE user_id = $user_id ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($mysqli);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="#">
                        <div>
                            <img src="../images/gallery/' . $row["imgFullNameGallery"] . '">
                            <h3>' . $row["titleGallery"] . '</h3>
                            <p>' . $row["descGallery"] . '</p>
                            <form action="delete_image.php" method="post">
                                <input type="hidden" name="image_id" value="' . $row["id"] . '">
                                <button type="submit" name="delete_image">Delete</button>
                            </form>
                        </div>
                    </a>';
                }
            }
            ?>
        </div>
    </section>

    <section id="upload-section">
        <div class="upload-button">
            <form action="upload.php" method="post" id="uploadGallery" enctype="multipart/form-data" novalidate>
                <input type="text" name="filename" id="filename" placeholder="File name">
                <input type="text" name="filetitle" id="filetitle" placeholder="Image title">
                <input type="text" name="filedesc" id="filedesc" placeholder="Image Description">
                <input type="file" name="file" id="file">
                <button type="submit" name="submit">Upload</button>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
