<?php

namespace Src\Models;

use mysqli;

class Database {
    private $db_host ;
    private $db_username ;
    private $db_password;
    private $db_name;

    public function __construct(){
        $this->connect();
    }
    public function connect(){
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_username = $_ENV['DB_USERNAME'];
        $this->db_password = $_ENV['DB_PASSWORD'];
        $this->db_name = $_ENV['DB_NAME'];

        $mysqli = new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);

        // Check connection
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
    }
}