<?php


namespace app\models;


class Images
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public function getImages()
    {
        return $this->database->getRecords("select * from image");
    }
    public function imagesDelete($idImage)
    {
        return $this->database->executeQuery("delete from image where idImage = ?", array($idImage));
    }

}