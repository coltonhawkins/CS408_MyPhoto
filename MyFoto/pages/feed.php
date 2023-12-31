
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>Photo Feed - My Foto</title>
    <link rel="stylesheet" type="text/css" href="../css/feed.css">
    
    
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - Feed</h1>

    <section id="feed-section">
        <h2>Photo Feed</h2>
        <?php
            session_start(); 
            require __DIR__ . "/Doo.php";

            $user_id = $_SESSION["user_id"];
            $sql = "SELECT gallery.*, user.name
                    FROM gallery
                    JOIN user ON gallery.user_id = user.id
                    ORDER BY gallery.orderGallery DESC";

            $stmt = mysqli_stmt_init($mysqli);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="#" class="photo-link">
                        <div>
                            <h3>' . $row["name"] . '</h3>
                            <img src="../images/gallery/' . $row["imgFullNameGallery"] . '">
                            <h3>' . $row["titleGallery"] . '</h3>
                            <p>' . $row["descGallery"] . '</p>
                        </div>
                    </a>';
                }
            }
        ?>
    
    </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>
