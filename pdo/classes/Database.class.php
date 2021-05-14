<?php

// namespace classes;

class Database {
    private $host = 'localhost';
    private $dbname = 'aula_php';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8';
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset;", 
                $this->username, 
                $this->password
            );
        } catch(PDOException $exception) {
            echo "Connection error: ". $exception->getMessage();
        }

        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}



?>