<!-- <?php
        // class Database {
        //     private $host = "us-cdbr-east-06.cleardb.net";
        //     private $db = "heroku_0bed022811aae1b";
        //     private $user = "bd816edec88467";
        //     private $pass = "104bcd5f";

           
        
        //     public function getConnection() {
        //         $con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        //         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         return $conn;
        //     }
        // }
    ?> -->
<?php
     $host = "us-cdbr-east-06.cleardb.net";
     $db = "heroku_0bed022811aae1b";
     $user = "bd816edec88467";
     $pass = "104bcd5f";

    if(!$con = mysqli($host, $user, $pass, $db)){

        die("failed to connect!");
    }