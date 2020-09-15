<?php

namespace app\controllers;

class Controller
{
    protected function loadView($view, $data = null)
    {
        require_once "app/views/layout/Head.php";
        require_once "app/views/layout/PageNavigation.php";
        require_once "app/views/pages/{$view}.php";
        require_once "app/views/layout/Footer.php";
    }
    protected function loadViewAdminPanel($view, $data = null)
    {
        require_once "app/views/layout/Head.php";
        require_once "app/views/admin/Header.php";
        require_once "app/views/admin/Aside.php";
        require_once "app/views/admin/pages/{$view}.php";
        require_once "app/views/admin/EndOfHtml.php";
    }
    protected function redirect($page)
    {
        header("location: " . $page);
    }
    protected function returnJSON($data = null, $statusCode = 200)
    {
        header("content-type: application/json");
        http_response_code($statusCode);
        echo json_encode($data);
    }
    public function logPageAccess(){
        $open = fopen("app/data/log-page.txt", "a");
        if($open){
            $date = date('d-m-Y H:i:s');
            if(isset($_SESSION["user"])){
                fwrite($open, "{$date}\t{$_SERVER['REMOTE_ADDR']}\t{$_SERVER["REQUEST_URI"]}\t{$_SESSION["user"]->username}\n");

            }
            fclose($open);
        }
    }
    protected function logErrors($error){
        $open = fopen("app/data/log-errors.txt", "a");
        if($open){
            $date = date('d-m-Y H:i:s');
            if(isset($_SESSION["user"])){
                fwrite($open, "{$date}\t{$_SERVER['REMOTE_ADDR']}\t{$error}\t{$_SESSION["user"]->username}\n");

            } else {
                fwrite($open, "{$date}\t{$_SERVER['REMOTE_ADDR']}\t{$error}\tuser\n");

            }
            fclose($open);
        }
    }
    protected function logOnline(){
        $data = file("app/data/log-online.txt");
        $open = fopen("app/data/log-online.txt", "w");
        $tmp = intval($data[0]) + 1;
        fwrite($open, "$tmp");
        fclose($open);
    }
    function logOffline(){
        $data = file("app/data/log-online.txt");
        $open = fopen("app/data/log-online.txt", "w");
        $tmp = intval($data[0]) - 1;
        fwrite($open, "$tmp");
        fclose($open);
    }
}