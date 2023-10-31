<?php

if(isset($_POST['submit'])){
    
    $newFilename = $_POST['filename'];
    if($_POST['filename']){
        $newFileName = "gallery";

    }else{
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    //extracting the file properties
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTemp = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //extracting the file extension
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    //allowing only certain file types
    $allowed = array("jpg", "jpeg", "png");

    //Error handlers
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){

                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../images/gallery" . $imageFullName;
                
                include_once "/Doo.php";

                if(empty($imageTitle) || empty($imageDesc)){
                    header("Location: ../pages/myprofile.php?upload=empty");
                    exit();

            }else{
                echo "Your file is too big!";
                exit();
            }
        }else{
            echo "There was an error uploading your file!";
            exit();
        }

    }else{
        echo "You need to upload a proper file type!";
        exit();
    }

}

