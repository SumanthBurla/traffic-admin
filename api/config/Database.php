<?php 
  class Database {
    // DB Params
    private $host = '35.224.235.124';
    private $db_name = 'admin-db';
    private $username = 'admin';
    private $password = 'root';
    private $conn;
    // DB Connect
    public function connect() {
      $this->conn = null;
      try { 
        $this->conn = new PDO('pgsql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
      return $this->conn;
    }
  }
?>