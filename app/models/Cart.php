<?php

namespace app\models;

class Cart
{
    private $database;
    private $user;
    private $ids;
    private $date;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public static function constructPay($database, $user, $ids)
    {
        $instance = new self($database);
        $instance->user = $user;
        $instance->ids = $ids;
        $instance->date = date("Y-m-d");
        return $instance;
    }

    public function booksForCart($values)
    {
        return $this->database->getRecords("select idBook, name, isbn, price from book where idBook in ($values)");
    }
    private function createPayQuery()
    {
        $query = "insert into cart values ";
        foreach ($this->ids as $key=>$id)
        {
            if ($key == 0)
            {
                $query .= "(null, $id, $this->user, '$this->date')";
            }
            else
            {
                $query .= ", (null, $id, $this->user, '$this->date')";
            }
        }
        return $query;
    }
    public function createPayment()
    {
        $query = $this->createPayQuery();
        return $this->database->execute($query);
    }
    public function getSoldBooks()
    {
        return $this->database->getRecord("select count(*) as number from cart");
    }
}