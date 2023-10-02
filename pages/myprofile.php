<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>My Profile - My Foto</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="profile-section">
        <h2>My Profile</h2>
        <div class="profile-info">
            <div class="profile-picture">
                <img src="../images/profile.PNG" alt="Profile Picture" width="150" height="150">
            </div>
            <div class="profile-details">
                <h3>John Doe</h3>
                <p>Email: john.doe@example.com</p>
                <p>Location: BOISE, ID, USA</p>
            </div>
        </div>

        <h3>My Photos</h3>
        <div class="user-photos">
            <!-- Add user's uploaded photos here -->
        </div>

        <!-- Upload Button -->
        <div class="upload-button">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="photoUpload">Upload a Photo:</label>
                <input type="file" name="photoUpload" id="photoUpload">
                <input type="submit" value="Upload">
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>