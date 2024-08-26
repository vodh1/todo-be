<?php
  class Database {
    public $conn;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'todo_app';

    public function  __construct(){
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    public function __destruct() {
      $this->conn->close();
    }
  }
?>