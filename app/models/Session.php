<?php

namespace app\models;

class Session
{
    private $database;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $country;
    private $userId;
    private $email;
    private $reMail = "/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    private $rePass = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";

    public function __construct() {}
    public static function constructSignIn($database, $username, $password)
    {
        $instance = new self();
        $instance->database = $database;
        $instance->username = $username;
        $instance->password = $password;
        return $instance;
    }
    public static function constructSignUp($database, $username, $password, $email)
    {
        $instance = new self();
        $instance->database = $database;
        $instance->username = $username;
        $instance->password = $password;
        $instance->email = $email;
        return $instance;
    }
    public static function constructProfileChange($database, $password, $email, $firstName, $lastName, $country, $userId)
    {
        $instance = new self();
        $instance->database = $database;
        $instance->password = $password;
        $instance->firstName = $firstName;
        $instance->lastName = $lastName;
        $instance->country = $country;
        $instance->userId = $userId;
        $instance->email = $email;
        return $instance;
    }

    public function getUserFromDB()
    {
        return $this->database->getRecordSecure("SELECT * FROM user WHERE username = ? AND password = ?", array($this->username, md5($this->password)));
    }
    public function createSession($user)
    {
        $_SESSION["user"] = $user;
        $_SESSION["user"]->avatarSmall = $this->getAvatar($_SESSION["user"]->idImage)->small;
        $_SESSION["user"]->avatarOriginal = $this->getAvatar($_SESSION["user"]->idImage)->original;
    }
    public function deleteSession($session)
    {
        unset($session);
        session_destroy();

    }
    public function getUsername()
    {
        return $this->database->getRecordSecure("select idUser from user where username = ?", array($this->username));
    }
    public function getEmail()
    {
        return $this->database->getRecordSecure("select idUser from user where email = ?", array($this->email));
    }
    public function validateSignUpForm()
    {
        if (preg_match($this->rePass, $this->password) && preg_match($this->reMail, $this->email) && (strlen($this->username) <= 13 && strlen($this->username) >= 3)) {
            $valid = true;
        } else {
            $valid = false;
        }
        return $valid;
    }
    public function insertUser()
    {
        if($this->validateSignUpForm())
        {
            return $this->database->executeQuery("insert into user values(null, 2, 192, 1, '', '', ?, ?, ?)", array($this->email, $this->username, md5($this->password)));
        }
    }
    private function getAvatar($userImage)
    {
        return  $this->database->getRecordSecure("SELECT i.small AS small, i.original AS original FROM user u INNER JOIN image i ON u.idImage = i.idImage WHERE u.idImage = ?", array($userImage));
    }
//    TODO: update profile
    public function changeProfile()
    {
        return $this->database->executeQuery("UPDATE user SET idCountry=?, firstName=?, lastName=?, email=?, password=? WHERE idUser = ?", array($this->country, $this->firstName, $this->lastName, $this->email, md5($this->password), $this->userId));
    }
}