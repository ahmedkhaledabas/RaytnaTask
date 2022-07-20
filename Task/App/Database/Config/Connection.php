<?php
namespace App\Database\Config;

use mysqli;

class Connection {
    protected string $DBservername = "localhost";
    protected string $DBusername = "root";
    protected string $DBpasword = "";
    protected string $DBdatabase = "mobile_shop";
    public mysqli $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->DBservername , $this->DBusername , $this->DBpasword , $this->DBdatabase);
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}