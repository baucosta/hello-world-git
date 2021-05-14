<?php

// namespace classes;
include('Database.class.php');

class Student {
    private $id;
    private $name;
    private $email;
    private $cpf;
    private $phone;
    private $photo;
    private $conn;
    private $table_name = 'students';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function read() {
        $query = "select *from $this->table_name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $this->conn = null;

        return $stmt;
    }

    public function create() {
        $query = "insert into $this->table_name (name, email) values (:name, :email)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);

        $this->conn = null;

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "delete from $this->table_name where id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $this->conn = null;

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    
}


?>