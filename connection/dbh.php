<?php 

class Dbh { 
    protected $db; // PDO instance property

    public function __construct() {
        try {
            $user = 'root';
            $password = '';
            $this->db = new PDO('mysql:host=localhost;dbname=attendance', $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
    }

    protected function connect() {
        return $this->db;
    }
}