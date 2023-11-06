<?php
session_start();
include_once "../pages/Doo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    // Extract the file properties
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTemp = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    // Extract the file extension
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileActualExt = strtolower($fileExt);

    // Allow only certain file types
    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) { // 2 MB limit
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../images/gallery/" . $imageFullName;

                include_once "../pages/Doo.php";

                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: ../pages/myprofile.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($mysqli);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed!";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery, user_id) VALUES (?, ?, ?, ?, ?);";

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed!";
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder, $_SESSION["user_id"]);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTemp, $fileDestination);

                            header("Location: ../pages/myprofile.php?upload=success");
                            exit();
                        }
                    }
                }
            } else {
                echo "Your file is too big!";
                exit();
            }
        } else {
            echo "There was an error uploading your file!";
            exit();
        }
    } else {
        echo "You need to upload a proper file type (jpg, jpeg, or png)!";
        exit();
    }
}
?>
