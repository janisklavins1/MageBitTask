<?php

namespace app\core;

use PDO;

class Database
{
    //  This should be placed in .env file and gitignored
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $db = "magebit";

    public function connectToDb()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
