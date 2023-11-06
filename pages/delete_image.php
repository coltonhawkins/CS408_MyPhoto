<?php
session_start();
require __DIR__ . "/Doo.php";

if (isset($_POST["delete_image"])) {
    $image_id = $_POST["id"];
    $user_id = $_SESSION["user_id"];

    // Check if the image belongs to the current user before deleting
    $sql = "DELETE FROM gallery WHERE id = ? AND user_id = ?";
    $stmt = mysqli_stmt_init($mysqli);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $image_id, $user_id);
        mysqli_stmt_execute($stmt);

        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Image deleted successfully
            header("Location: /pages/myprofile.php"); 
            exit();
        } else {
            // Image not found or not owned by the user
            header("Location: myprofile.php?error=image_not_found");
            exit();
        }
    }
}
