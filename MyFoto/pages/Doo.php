<?php
        
            $host = "us-cdbr-east-06.cleardb.net";
            $db = "heroku_0bed022811aae1b";
            $user = "bd816edec88467";
            $pass = "104bcd5f";

            $mysqli = new mysqli($host, $user, $pass, $db);
           
            if($mysqli->connect_errno) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            return $mysqli;
        
    ?>
