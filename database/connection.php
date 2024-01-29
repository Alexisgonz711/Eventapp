<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'eventapp';
    private $port = '8889';
    private $user = 'root';
    private $password = 'root';
    private $charset ='utf8mb4';
    private $engine = 'mysql';

    public $conn;

    public static function getConnection(){
        $this->conn = null ; 

        try {
            $this->conn = new PDO("$engine:host=$host;$port;dbname=$db_name", $username, $password);
        } catch(PDOException $exception){
            echo "Connection error :" . $exception->getMessage()
        }
    }
    return $this->conn;
}