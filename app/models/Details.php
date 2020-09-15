<?php
 namespace app\models;

 class Details
 {
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public function bookDetails($bookId)
    {
        $temp = $this->database->getRecordSecure("SELECT b.idBook AS idBook, b.name AS bookName, original, description, isbn, price FROM book b INNER JOIN image i ON b.idImage = i.idImage WHERE b.idBook = ?", array($bookId));
        $temp->authors = $this->database->getRecordsSecure("SELECT a.full_name AS author FROM book b INNER JOIN author_book ab ON b.idBook = ab.idBook INNER JOIN author a ON ab.idAuthor = a.idAuthor WHERE b.idBook = ?", array($bookId));
        return $temp;
    }
 }