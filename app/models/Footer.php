<?php

namespace app\models;

class Footer
{
    private $database;
    private $allData = [];

    public function __construct($database)
    {
        $this->database = $database;
    }
    private function getSocialData()
    {
        $temp = $this->database->getRecords("SELECT * FROM social");
        $this->allData["social"] = $temp;
    }
    private function getTextData()
    {
        $temp = $this->database->getRecord("SELECT * FROM footer");
        $this->allData["textData"] = $temp;
    }
    public function getFooterData()
    {
        $this->getSocialData();
        $this->getTextData();
        return $this->allData;
    }

    public function updateFooterContent($footerHeader, $footerContent, $footerId)
    {
        return $this->database->executeQuery("update footer set header = ?, content = ? where idFooter = ?", array($footerHeader, $footerContent, $footerId));
    }
    public function insertSocial($insertLink, $insertName)
    {
        return $this->database->executeQuery("insert into social values (null, ?, ?)", array($insertLink, $insertName));
    }
    public function updateSocial($updateUrl, $updateName, $updateSocial)
    {
        return $this->database->executeQuery("update social set link = ?, name = ? where idSocial = ?", array($updateUrl, $updateName, $updateSocial));
    }
    public function deleteSocial($deleteSocial)
    {
        return $this->database->executeQuery("delete from social where idSocial = ?", array($deleteSocial));
    }

}