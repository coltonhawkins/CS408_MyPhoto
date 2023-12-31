<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src=/js/validation.js defer></script>
</head>
<?php include 'header.php'; ?>
<body>
    <h1>My Foto - Sign Up</h1>

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

    <form action="process-signup.php" method="post" id="signup" novalidate>
    
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your Username">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
        </div>

        <button>Sign Up</button>
    </form>

   

    <?php include 'footer.php'; ?>
</body>
</html>