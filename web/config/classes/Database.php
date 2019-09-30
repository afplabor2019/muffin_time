<?php
namespace MuffinTime\Database;

class Database{
     private $conn;

     private $host = "localhost";
     private $user = "root";
     private $pass = "";
     private $dbname = "afplabor";

     /**
      * Adatbázis kapcsolatot építi fel.
      *
      * @return PDO
      */
     public function getConnection(){
          try{
               $this->conn = null;
               $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               }catch(PDOException $e){
               die("Sikertelen kapcsolódás az adatbázishoz: " . $e->getMessage());
          }
          return $this->conn;
     }
}