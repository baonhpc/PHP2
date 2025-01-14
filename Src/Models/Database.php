<?php

namespace Src\Models;

use mysqli;
use PDO;
use PDOException;

class Database
{
    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;

    public function __construct()
    {
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_username = $_ENV['DB_USERNAME'];
        $this->db_password = $_ENV['DB_PASSWORD'];
        $this->db_name = $_ENV['DB_NAME'];
    }
    public function Pdo()
    {
        try {
            $conn =  new PDO($this->db_host, $this->db_username, $this->db_password, $this->db_name);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function MySQLi()
    {
        $conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        $conn->set_charset("utf8mb4");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
