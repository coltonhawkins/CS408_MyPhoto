
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <title>Login Page</title>
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - Login</h1>

    <style>
        /* Style the form container */
    form {
        width: 300px;
        margin: 0 auto;
    }

    /* Style the form elements */
    div {
        margin: 10px 0;
    }

    label {
        display: block; /* Place labels on a new line */
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #007BFF; /* Change border color on focus */
    }

    button {
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
}

button:hover {
    background-color: #0056b3; /* Darker color on hover */
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