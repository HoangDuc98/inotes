<?php

namespace Model;

use PDO;
use PDOException;

class DB
{
    protected $dsn;
    protected $userName;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=iNotes";
        $this->userName = "root";
        $this->password = "12345678";
    }

    public static function connection()
    {
    }

    public function connect()
    {
        $conn = null;

        try {
            $conn = new PDO($this->dsn , $this->userName , $this->password);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
        return $conn;
    }
}