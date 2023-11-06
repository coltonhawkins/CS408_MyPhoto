
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
        

        <p>Explore the latest photos shared by our talented photographers. Click on each photo to view it in full size and learn more about the photographers and their work.</p>
        <?php
            session_start(); 
            require __DIR__ . "/Doo.php";

            $user_id = $_SESSION["user_id"];
            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
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
    
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
