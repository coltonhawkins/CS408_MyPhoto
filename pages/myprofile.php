
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/myprofile.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>My Profile - My Foto</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>My Foto - MyProfile</h1>

    <section id="profile-section">
        <h2>My Profile</h2>
        <div class="profile-info">
            <div class="profile-picture">
                <img src="../images/profile.PNG" alt="Profile Picture" width="150" height="150">
            </div>
            <div class="profile-details">
                <h3>Colton Hawkins</h3>
                <p>Email: coltonhawkins@u.boisestate.edu</p>
                <p>Location: Boise, ID, USA</p>
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
