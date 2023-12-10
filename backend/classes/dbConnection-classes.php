<!-- centralized db connetion for multiple files-->
<?php

class DbConnection {
    protected function connect(){
        $username = "root";
        $password = "";
        $host = "localhost";
        $dbName = "eventsync";
        
        try{
            $dbConn = new PDO("mysql:host=$host;dbname=$dbName", "$username", "$password");
            $dbConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbConn;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}

?>

<!-- just include to your files -->