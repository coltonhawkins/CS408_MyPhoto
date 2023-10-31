<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/Doo.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){
            
            if(password_verify($_POST["password"], $user["password_hash"])){
    
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("Location: ../pages/home.php");
                exit;
    
            } 
    }
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login Page</title>
</head>
<?php include 'header.php'; ?>
<body>

    <h1>My Foto - Login</h1>

    <?php if($is_invalid): ?>
        <em style="color: red;">Invalid Login</em>
    <?php endif; ?>

    <form method="post">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" placeholder="Enter your email address">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">

        <button type="submit">Login</button>
        

    </form>

    

    <?php include 'footer.php'; ?>
</body>
</html>