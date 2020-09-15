<?php

namespace app\models;

class Books {
    private $database;
    private $baseValue = 1;
    private $booksPerPage = 8;


    public function __construct($database)
    {
        $this->database=$database;
    }
    public function getBooksWithImages()
    {
        return $this->database->getRecords("SELECT b.idBook AS idBook, small FROM book b INNER JOIN image i on b.idImage=i.idImage LIMIT 0,8");
    }
    public function autocompleteForSearch()
    {
        return $this->database->getRecords("SELECT name FROM book");
    }
    public function getBooksForPagination($focusedPage)
    {
        $page = $this->booksPerPage($focusedPage);
        return $this->database->getRecords("SELECT b.idBook AS idBook, small FROM book b INNER JOIN image i ON b.idImage = i.idImage LIMIT $page,8");
    }
    public function getBooksForSearch($searchString, $focusedPage)
    {
        $page = $this->booksPerPage($focusedPage);
        return $this->database->getRecords("SELECT b.idBook AS idBook, small FROM book b INNER JOIN image i ON b.idImage = i.idImage WHERE lower(b.name) LIKE '%$searchString%' LIMIT $page,8");
    }
    public function getBooksForFilter($checkedItems, $focusedPage)
    {
        $page = $this->booksPerPage($focusedPage);
        return $this->database->getRecords("SELECT b.idBook AS idBook, small FROM book b INNER JOIN image i ON b.idImage = i.idImage WHERE idCategory IN ($checkedItems) LIMIT $page,8");
    }
    public function getBooksForSorting($sortValue, $focusedPage)
    {
        $page = $this->booksPerPage($focusedPage);
        return $this->database->getRecords("SELECT b.idBook AS idBook, small FROM book b INNER JOIN image i ON b.idImage = i.idImage ORDER BY b.name $sortValue limit $page,8");
    }
    public function getBooksForAdmin()
    {
        $bookData = $this->database->getRecords("select b.idBook as idBook, c.idCategory as idCategory, original, b.name as bookName, description, isbn, price from book b inner join category c on b.idCategory = c.idCategory inner join image i on b.idImage = i.idImage");
        foreach ($bookData as $book) {
            $book->authors = $this->database->getRecords("select a.full_name as authorName, a.idAuthor as idAuthor from book b inner join author_book ab on b.idBook = ab.idBook inner join author a on ab.idAuthor = a.idAuthor where b.idBook = $book->idBook");
        }
        return $bookData;
    }
    private function booksPerPage($page = 1)
    {
        return ($page - $this->baseValue) * $this->booksPerPage;
    }


}