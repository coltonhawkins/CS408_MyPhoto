<?php

$is_invalid = false;
$valid_email = false;
$valid_password = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/Doo.php";

    $email = $mysqli->real_escape_string($_POST["email"]);
    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $email);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: ../pages/home.php");
            exit;

        } else {
            $valid_password = true;
        }
    } else {
        $valid_email = true;
        $valid_password = true; // Display both email and password errors if the email doesn't exist.
    }
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".error-message").each(function() {
                $(this).fadeOut(5000); // Adjust the time (in milliseconds) as needed
            });
        });
    </script>
</head>
<?php include 'header.php'; ?>
<body>

    <h1>My Foto - Login</h1>

    <div class="error-container">
        <?php if ($valid_email): ?>
            <em class="error-message" >Invalid Email</em>
        <?php endif; ?>

        <?php if ($valid_password): ?>
            <em class="error-message" >Invalid Password</em>
        <?php endif; ?>
    </div>

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