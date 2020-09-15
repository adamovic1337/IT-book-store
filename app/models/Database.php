<?php

namespace app\models;

class Database
{
    private static $instance = null;
    private $conn;

    private $server;
    private $database;
    private $user;
    private $password;

    private function __construct($server, $database, $user, $password)
    {
        $this->server=$server;
        $this->database=$database;
        $this->user=$user;
        $this->password=$password;
        $this->connect();
    }
    public static function getInstance($server, $database, $user, $password)
    {
        if(self::$instance == null)
        {
            self::$instance = new Database($server, $database, $user, $password);
        }
        return self::$instance;
    }
    private function connect()
    {
        $this->conn = new \PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->user, $this->password);
        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getRecord($query)
    {
        return $this->conn->query($query)->fetch();
    }
    public function getRecords($query)
    {
        return $this->conn->query($query)->fetchAll();
    }
    public function getRecordSecure($query, $bindValueArray)
    {
        $temp = $this->conn->prepare($query);
        $temp->execute($bindValueArray);
        return $temp->fetch();
    }
    public function getRecordsSecure($query, $bindValueArray)
    {
        $temp = $this->conn->prepare($query);
        $temp->execute($bindValueArray);
        return $temp->fetchAll();
    }
    public function executeQuery($query, $bindValueArray)
    {
        $temp = $this->conn->prepare($query);
        $temp->execute($bindValueArray);
        return $temp;
    }
    public function execute($query)
    {
        $temp = $this->conn->prepare($query);
        $temp->execute();
        return $temp;
    }


}