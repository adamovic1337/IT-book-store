<?php

require_once "app/config/Autoload.php";
require_once "app/config/ConfigDB.php";

use app\models\Database;
use app\controllers\PageController;
use app\controllers\AjaxController;

$database = Database::getInstance(SERVER, DATABASE, USER, PASSWORD);
$pageController = new PageController($database);
$ajaxController = new AjaxController($database);

if (isset($_GET["page"]))
{
    switch ($_GET["page"])
    {
        case "bookstore" :
            $pageController->bookstore();
            $pageController->logPageAccess();
            break;
        case "contact" :
            $pageController->contact();
            $pageController->logPageAccess();
            break;
        case "details" :
            $pageController->details($_GET["book"]);
            $pageController->logPageAccess();
            break;
        case "cart" :
            $pageController->cart();
            $pageController->logPageAccess();
            break;
        case "profile" :
            $pageController->profile($_SESSION["user"]);
            $pageController->logPageAccess();
            break;
        case "logout" :
            $pageController->signOut($_SESSION["user"]);
            $pageController->logPageAccess();
            break;
    }
}
else if (isset($_GET["ajax"]))
{
    switch ($_GET["ajax"])
    {
        case "autocomplete" :
            $ajaxController->autocomplete();
            break;
        case "filter" :
            $ajaxController->showBooksForFilterUnchecked();
            break;
        case "paginationFilter" :
            $ajaxController->showPagination();
            break;
    }
}
else if (isset($_POST["ajax"]))
{
    switch ($_POST["ajax"])
    {
        case "books" :
            $ajaxController->showBooksForPagination($_POST["page"]);
            break;
        case "search" :
            $ajaxController->showBooksForSearch($_POST["searchString"], $_POST["page"]);
            break;
        case "paginationSearch" :
            $ajaxController->showPaginationForSearch($_POST["searchString"]);
            break;
        case "filter" :
            $ajaxController->showBooksForFilter($_POST["checked"], $_POST["page"]);
            break;
        case "paginationFilter" :
            $ajaxController->showPaginationForFilter($_POST["checked"]);
            break;
        case "sort" :
            $ajaxController->showBooksForSorting($_POST["sortValue"], $_POST["page"]);
            break;
        case "paginationSort" :
            $ajaxController->showPagination();
            break;
        case "mailer" :
            $ajaxController->contact($_POST["fullName"], $_POST["email"], $_POST["subject"], $_POST["message"]);
            break;
        case "signIn" :
            $ajaxController->signIn($database, $_POST["username"], $_POST["password"]);
            break;
        case "signUp" :
            $ajaxController->signUp($database, $_POST["username"], $_POST["password"], $_POST["email"]);
            break;
        case "cart" :
            $ajaxController->showCartData($_POST["books"]);
            break;
        case "pay" :
            $ajaxController->pay($_POST["user"], $_POST["ids"]);
            break;
        case "profileUpdate" :
            $ajaxController->updateProfile($_POST["profilePassword"], $_POST["profileEmail"], $_POST["profileFirstName"], $_POST["profileLastName"], $_POST["profileCountries"], $_POST["profileUpdate"]);
            break;
    }
}
else
{
    $pageController->bookstore();
}

