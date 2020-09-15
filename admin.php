<?php

require_once "app/config/Autoload.php";
require_once "app/config/ConfigDB.php";

use app\models\Database;
use app\controllers\PageController;


$database = Database::getInstance(SERVER, DATABASE, USER, PASSWORD);
$pageController = new PageController($database);

if (isset($_GET["page"]))
{
    switch ($_GET["page"])
    {
        case "dashboard" :
            $pageController->loadDashboard();
            $pageController->logPageAccess();
            break;
        case "images" :
            $pageController->loadImages();
            $pageController->logPageAccess();
            break;
        case "countries" :
            $pageController->loadCountries();
            $pageController->logPageAccess();
            break;
        case "categories" :
            $pageController->loadCategories();
            $pageController->logPageAccess();
            break;
        case "authors" :
            $pageController->loadAuthors();
            $pageController->logPageAccess();
            break;
        case "books" :
            $pageController->loadBooks();
            $pageController->logPageAccess();
            break;
        case "footer" :
            $pageController->loadFooterContent();
            $pageController->logPageAccess();
            break;
        case "social" :
            $pageController->loadFooterSocial();
            $pageController->logPageAccess();
            break;
    }
}
if (isset($_POST["admin"]))
{
    switch ($_POST["admin"])
    {
        case "deleteForImages" :
            $pageController->deleteImages($_POST["delete"]);
            break;
        case "insertForCountries" :
            $pageController->insertCountries($_POST["insertName"]);
            break;
        case "updateForCountries" :
            $pageController->updateCountries($_POST["updateName"], $_POST["update"]);
            break;
        case "deleteForCountries" :
            $pageController->deleteCountries($_POST["delete"]);
            break;
        case "insertForCategories" :
            $pageController->insertCategories($_POST["insertName"]);
            break;
        case "updateForCategories" :
            $pageController->updateCategories($_POST["updateName"], $_POST["update"]);
            break;
        case "deleteForCategories" :
            $pageController->deleteCategories($_POST["delete"]);
            break;
        case "insertForAuthors" :
            $pageController->insertAuthors($_POST["insertName"]);
            break;
        case "updateForAuthors" :
            $pageController->updateAuthors($_POST["updateName"], $_POST["update"]);
            break;
        case "deleteForAuthors" :
            $pageController->deleteAuthors($_POST["delete"]);
            break;
        case "updateForFooter" :
            $pageController->updateFooter($_POST["footerHeader"], $_POST["footerContent"], $_POST["updateContent"]);
            break;
        case "insertForSocial" :
            $pageController->insertSocial($_POST["insertLink"], $_POST["insertName"]);
            break;
        case "updateForSocial" :
            $pageController->updateSocial($_POST["updateUrl"], $_POST["updateName"], $_POST["update"]);
            break;
        case "deleteForSocial" :
            $pageController->deleteSocial($_POST["delete"]);
            break;
    }
}
