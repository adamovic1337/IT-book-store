<?php


namespace app\models;

class Countries
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getCountries()
    {
        return $this->database->getRecords("SELECT idCountry, name FROM country");
    }
    public function insertCountries($insertName)
    {
        return $this->database->executeQuery("insert into country values (null, ?)", array($insertName));
    }
    public function updateCountries($updateName, $updateCountry)
    {
        return $this->database->executeQuery("update country set name = ? where idCountry = ?", array($updateName, $updateCountry));
    }
    public function deleteCountries($deleteCountry)
    {
        return $this->database->executeQuery("delete from country where idCountry = ?", array($deleteCountry));
    }
}