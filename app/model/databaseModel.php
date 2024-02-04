<?php
namespace app\model;
use PDO;
use PDOException;
require_once 'app/config/database.php';
class databaseModel {
    private $dbhost = DB_HOST;
    private $dbname = DB_NAME;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $conn;
    private $stmt;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . "", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //   echo "Connected successfully";
        } catch (PDOException $e) {
            //   echo "Connection failed: " . $e->getMessage();
        }
    }
    function pdo_execute($sql) {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
    }
    function pdo_query($sql) {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }
    function pdo_query_one($sql) {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        return $this->stmt->fetch();
    }
    function pdo_query_value($sql) {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $row=$this->stmt->fetch();
        return $row[0];
    }
    
}
