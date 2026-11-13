<?php
class Database{
    public $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=oopclass", "root", "");
        } catch (PDOException $e) {
            echo "Connection Error: {$e->getMessage()}";
        }

        return $this->conn;
  }
}