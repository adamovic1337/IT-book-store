<?php

namespace app\models;

class Categories
{
    private $database;
    private $categories;
    private $bookNumbers = [];

    public function __construct($database)
    {
        $this->database=$database;
    }
    public function getCategories()
    {
        $this->categories = $this->database->getRecords("SELECT idCategory, name FROM category");
        return $this->categories;
    }
    public function insertCategories($insertName)
    {
        return $this->database->executeQuery("insert into category values (null, ?)", array($insertName));
    }
    public function updateCategories($updateName, $updateCategory)
    {
        return $this->database->executeQuery("update category set name = ? where idCategory = ?", array($updateName, $updateCategory));
    }
    public function deleteCategories($deleteCategory)
    {
        return $this->database->executeQuery("delete from category where idCategory = ?", array($deleteCategory));
    }

    public function bookCount()
    {
        foreach ($this->categories as $key=>$item)
        {
            $temp = $this->database->getRecord("SELECT count(b.name) AS number FROM book b INNER JOIN category c on b.idCategory = c.idCategory WHERE c.idCategory = {$item->idCategory} GROUP BY c.name");
            array_push($this->bookNumbers, @$temp->number);
        }
        return $this->bookNumbers;
    }
}