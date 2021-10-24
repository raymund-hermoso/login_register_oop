<?php
class Database {
    //PDO
    // protected function connection() {
    //     try {
    //         $username = 'root';
    //         $password = '';
    //         $dbh = new PDO('mysqli:host=localhost;database=ray', $username, $password);
    //         return $dbh;
    //     }
    //     catch (PDOException $e){
    //         print 'Error!: ' . $e->getMessage() . '</br> ';
    //         die();
    //     }
    // }

    // OOP
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ray';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->connection;
    }
}
