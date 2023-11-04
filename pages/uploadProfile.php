<?php
session_start();
include_once "../pages/Doo.php";

$id = $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
   
    $fileName = $_FILES['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = '../images/profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET status=0 WHERE user_id='$id';";
                $result = $mysqli->query($sql);
                header("Location: ../pages/myprofile.php?upload=success");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error uploading your file!";
        }
    }
}