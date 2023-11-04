<?php
session_start();
include_once "../pages/Doo.php";

$id = $_SESSION['user_id'];

// First, you should check if the user already has a profile image.
// If they do, you should update the existing image instead of inserting a new one.
$sql1 = "SELECT * FROM profileimg WHERE user_id = '$id'";
$result1 = $mysqli->query($sql1);

if (mysqli_num_rows($result1) > 0) {
    // Update the existing profile image record (status=1 means it's active).
    $sql2 = "UPDATE profileimg SET status = 1 WHERE user_id = '$id'";
    $result2 = $mysqli->query($sql2);
} else {
    // Insert a new profile image record if none exists.
    $sql2 = "INSERT INTO profileimg (user_id, status) VALUES ('$id', 1)";
    $result2 = $mysqli->query($sql2);
}

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
   
    $fileName = $_FILES['file']['name']; // Use 'file' instead of 'name'
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $fileNameNew = "profile" . $id . "." . $fileActualExt;
                $fileDestination = '../images/profile/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                // Update the status of previous profile images to 0 (inactive) except the current one.
                $sql3 = "UPDATE profileimg SET status = 0 WHERE user_id = '$id' AND image_id != (SELECT MAX(image_id) FROM profileimg WHERE user_id = '$id')";
                $result3 = $mysqli->query($sql3);

                header("Location: ../pages/myprofile.php?upload=success");
                exit();
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "Invalid file format. Please upload a JPG, JPEG, or PNG file.";
    }
}
?>
