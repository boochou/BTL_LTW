<?php
class Database {
    private static $connection;
    
    
    public static function connect() {
        $host = "localhost:3307";
$dbname = "btl_ltw";
$username = "root";
$password = "";
        if (!self::$connection) {
            self::$connection = new mysqli(hostname: $host,
            username: $username,
            password: $password,
            database: $dbname);
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>