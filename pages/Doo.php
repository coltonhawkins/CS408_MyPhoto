<?php
        class Database {
            private $host = "us-cdbr-east-06.cleardb.net";
            private $db = "heroku_0bed022811aae1b";
            private $user = "bd816edec88467";
            private $pass = "104bcd5f";
        
            public function getConnection() {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }
        }
    ?>