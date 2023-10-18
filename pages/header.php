<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>
    <?php
        private $host = "us-cdbr-east-06.cleardb.net";
        private $db = "heroku_0bed022811aae1b";
        private $user = "bd816edec88467";
        private $pass = "104bcd5f";

        public function getConnection() {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
    ?>
    <header>
        <img src="../images/logo.PNG" alt="logo" width="100" height="100">
    </header>
    <nav>
        <ul>
            <li><a href="../pages/home.php">Home</a></li>
            <li><a href="../pages/feed.php">Feed</a></li>
            <li><a href="../pages/myprofile.php">My Profile</a></li>
            <li><a href="../pages/about.php">About</a></li>
            <li><a href="../pages/404.php">Login</a></li>
            <li><a href="../pages/404.php">Sign Up</a></li>
        </ul>
    </nav>
</body>
</html>
