<?php
// Database connection parameters
private $host = "us-cdbr-east-06.cleardb.net";
private $db = "heroku_0bed022811aae1b";
private $user = "bd816edec88467";
private $pass = "104bcd5f";

// Create a database connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
