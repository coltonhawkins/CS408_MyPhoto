<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - Login</h1>

    <style>
        #box {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px 5px, 5px, 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>

    <div id="box">
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
            <a href="../pages/signup.php">Click to Sign Up</a>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>