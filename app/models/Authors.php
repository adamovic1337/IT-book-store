<?php


namespace app\models;


class Authors
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getAuthors()
    {
        return $this->database->getRecords("select * from author");
    }
    public function insertAuthors($insertName)
    {
        return $this->database->executeQuery("insert into author values (null, ?)", array($insertName));
    }
    public function updateAuthors($updateName, $updateAuthor)
    {
        return $this->database->executeQuery("update author set full_name = ? where idAuthor = ?", array($updateName, $updateAuthor));
    }
    public function deleteAuthors($deleteAuthor)
    {
        return $this->database->executeQuery("delete from author where idAuthor = ?", array($deleteAuthor));
    }
}