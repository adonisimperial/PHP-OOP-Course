<?php
class Product {
    public $conn;

    function __construct($db){
        $this->conn = $db;
    }

    function read() {
        $stmt = $this->conn->prepare("SELECT * from products");
        $stmt->execute();
        
        return $stmt;
    }
}