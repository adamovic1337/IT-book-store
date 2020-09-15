<?php
namespace app\models;

class Pagination
{
    private $database;
    private $booksPerPage = 8;

    public function __construct($database)
    {
        $this->database =$database;
    }
    public function pagination()
    {
        $temp = $this->database->getRecord("SELECT count(idBook) AS bookNo FROM book");
        return $this->returnCount($temp->bookNo);
    }
    public  function paginationForSearch($searchString)
    {
        $temp = $this->database->getRecord("SELECT count(*) AS bookNo FROM book WHERE lower(name) LIKE '%$searchString%'");
        return $this->returnCount($temp->bookNo);
    }
    public function paginationForFilter($checkedItems)
    {
        $temp = $this->database->getRecord("SELECT count(*) AS bookNo FROM book WHERE idCategory IN ($checkedItems)");
        return $this->returnCount($temp->bookNo);
    }
    private function returnCount($totalCount)
    {
        return ceil($totalCount / $this->booksPerPage);
    }


}