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
    <title>My Profile - My Foto</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - MyProfile</h1>

    <?php

        $sql = "SELECT * FROM user";
        $result = $mysqli->query($sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['user_id'];
                $sqlImg = "SELECT * FROM profileimg WHERE user_id='$id'";
                $resultImg = $mysqli->query($sql);
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    echo "<div>";
                        if($rowImg['status'] == 0){
                            echo "<img src='../images/profile/profile".$id.".jpg?".mt_rand()."'>";
                        } else {
                            echo "<img src='../images/profile/default.PNG'>";
                        }
                        echo "<p>".$row['username']."</p>";
                        echo "<p>".$row['email']."</p>";
                    echo "</div>";
                }
            }
        }else{
            echo "There are no users yet!";
        }

        echo "<form action="uploadProfile.php" method="post" enctype="multipart/form-data" >
                <input type="file" name="file">
                <button type="submit" name="submit">Upload</button>
            </form>";
    ?>


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
