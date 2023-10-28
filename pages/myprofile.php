<?php
session_start();
require __DIR__ . "/Doo.php";

if(isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/Doo.php";
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
} 

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    
    if($_FILES["image"]["error"] === 4) {
        echo "Please upload a photo";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        
        $validImageExtension = ["jpg", "jpeg", "png"];
        $imageExtension = explode(".", $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script>Please upload a photo with a valid extension</script>";
        }
        else if($fileSize > 1000000) {
            echo "<script>Please upload a photo with a size less than 1MB</script>";
        }
        else {
            $newFileName = uniqid("", true) . "." . $imageExtension;
            
            move_uploaded_file($tmpName, 'img/' . $newFileName);
            
            $mysqli = require __DIR__ . "/Doo.php";
            
            // Use prepared statements to prevent SQL injection
            $stmt = $mysqli->prepare("INSERT INTO tb_upload (title, filename, user_id) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $name, $newFileName, $_SESSION["user_id"]);
            
            if ($stmt->execute()) {
                echo "<script>Successfully uploaded</script>";
                header("Location: ../pages/myprofile.php");
                exit;
            } else {
                echo "<script>Failed to upload</script>";
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
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
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Title:</label>
                <input type="text" name="name" id="name" placeholder="Title" required><br>

                <label for="image">Upload a Photo:</label>
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""><br><br>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

        <div class="user-photos">
            <!-- Display user's uploaded photos here -->
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
