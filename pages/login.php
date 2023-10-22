<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - Login</h1>

    <div id="box">

    <form method="post">
        
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" name="login" value="Login">
        <a href="../pages/signup.php">Sign Up</a>

    </form>


    </div>

    <?php include 'footer.php'; ?>
</body>
</html>