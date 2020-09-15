<?php

namespace app\controllers;
use app\models\Authors;
use app\models\Books;
use app\models\Cart;
use app\models\Categories;
use app\models\Countries;
use app\models\Details;
use app\models\Footer;
use app\models\Images;
use app\models\Pagination;
use app\models\Session;

class PageController extends Controller
{
    private $database;
    private $cartModel;
    private $imageModel;
    private $countryModel;
    private $booksModel;
    private $categoriesModel;
    private $authorsModel;
    private $footerModel;

    public function __construct($database)
    {
        $this->database = $database;
        $this->cartModel = new Cart($this->database);
        $this->imageModel = new Images($this->database);
        $this->countryModel = new Countries($this->database);
        $this->booksModel = new Books($this->database);
        $this->categoriesModel = new Categories($this->database);
        $this->authorsModel = new Authors($this->database);
        $this->footerModel = new Footer($this->database);
    }
    public function bookstore()
    {
        $books = $this->booksModel->getBooksWithImages();
        $categories = $this->categoriesModel->getCategories();
        $bookNumbers = $this->categoriesModel->bookCount();
        $paginationModel = new Pagination($this->database);
        $pagination = $paginationModel->pagination();

        $this->loadView("Bookstore", array("books" => $books, "categories" => $categories, "bookNumbers" => $bookNumbers,"pagination" => $pagination, "footer" => $this->footer()));
    }
    public function contact()
    {
        $this->loadView("Contact", array("footer" => $this->footer()));
    }
    public function details($bookId)
    {
        $detailsModel = new Details($this->database);
        $bookDetails = $detailsModel->bookDetails($bookId);
        $this->loadView("Details", array("bookDetails" => $bookDetails, "footer" => $this->footer()));
    }
    private function footer()
    {
        $footerModel = new Footer($this->database);
        return $footerModel->getFooterData();
    }
    public function signOut($session)
    {
        $sessionModel = new Session();
        $sessionModel->deleteSession($session);
        $this->logOffline();
        $this->redirect("index.php");
    }
    public function profile($session)
    {
        if (!$session)
        {
            $this->redirect("index.php");
        }
        else
        {
            $countries = $this->countryModel->getCountries();
            $this->loadView("Profile", array("countries" => $countries, "footer"=>$this->footer()));
        }
    }
    public function cart()
    {
        $this->loadView("Cart", array("footer" => $this->footer()));
    }
    //Admin panel
    public function loadDashboard()
    {
        try
        {
            $soldBooks = $this->cartModel->getSoldBooks();
            $this->loadViewAdminPanel("Dashboard", $soldBooks);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadImages()
    {
        try
        {
            $images = $this->imageModel->getImages();
            $this->loadViewAdminPanel("Images", $images);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function deleteImages($idImage)
    {
        try
        {
            $this->imageModel->imagesDelete($idImage);
            $this->redirect("admin.php?page=images");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadCountries()
    {
        try
        {
            $countries = $this->countryModel->getCountries();
            $this->loadViewAdminPanel("Countries", $countries);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function insertCountries($insertName)
    {
        try
        {
            $this->countryModel->insertCountries($insertName);
            $this->redirect("admin.php?page=countries");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function updateCountries($updateName, $updateCountry)
    {
        try
        {
            $this->countryModel->updateCountries($updateName, $updateCountry);
            $this->redirect("admin.php?page=countries");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function deleteCountries($deleteCountry)
    {
        try
        {
            $this->countryModel->deleteCountries($deleteCountry);
            $this->redirect("admin.php?page=countries");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadCategories()
    {
        try
        {
            $categories = $this->categoriesModel->getCategories();
            $this->loadViewAdminPanel("Categories", $categories);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function insertCategories($insertName)
    {
        try
        {
            $this->categoriesModel->insertCategories($insertName);
            $this->redirect("admin.php?page=categories");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function updateCategories($updateName, $updateCategory)
    {
        try
        {
            $this->categoriesModel->updateCategories($updateName, $updateCategory);
            $this->redirect("admin.php?page=categories");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function deleteCategories($deleteCategory)
    {
        try
        {
            $this->categoriesModel->deleteCategories($deleteCategory);
            $this->redirect("admin.php?page=categories");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadAuthors()
    {
        try
        {
            $authors = $this->authorsModel->getAuthors();
            $this->loadViewAdminPanel("Authors", $authors);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function insertAuthors($insertName)
    {
        try
        {
            $this->authorsModel->insertAuthors($insertName);
            $this->redirect("admin.php?page=authors");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function updateAuthors($updateName, $updateAuthor)
    {
        try
        {
            $this->authorsModel->updateAuthors($updateName, $updateAuthor);
            $this->redirect("admin.php?page=authors");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function deleteAuthors($deleteAuthor)
    {
        try
        {
            $this->authorsModel->deleteAuthors($deleteAuthor);
            $this->redirect("admin.php?page=authors");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadBooks()
    {
        try
        {
            $books = $this->booksModel->getBooksForAdmin();
            $categorise = $this->categoriesModel->getCategories();
            $authors = $this->authorsModel->getAuthors();
            $this->loadViewAdminPanel("books", array("books" => $books, "categories" => $categorise, "authors" => $authors));
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function loadFooterContent()
    {
        try
        {
            $footer = $this->footerModel->getFooterData();
            $this->loadViewAdminPanel("Footer", $footer);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function updateFooter($footerHeader, $footerContent, $footerId)
    {
        try
        {
            $this->footerModel->updateFooterContent($footerHeader, $footerContent, $footerId);
            $this->redirect("admin.php?page=footer");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function loadFooterSocial()
    {
        try
        {
            $footer = $this->footerModel->getFooterData();
            $this->loadViewAdminPanel("Social", $footer);
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }
    }
    public function insertSocial($insertLink, $insertName)
    {
        try
        {
            $this->footerModel->insertSocial($insertLink, $insertName);
            $this->redirect("admin.php?page=social");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function updateSocial($updateUrl, $updateName, $updateSocial)
    {
        try
        {
            $this->footerModel->updateSocial($updateUrl, $updateName, $updateSocial);
            $this->redirect("admin.php?page=social");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
    public function deleteSocial($deleteSocial)
    {
        try
        {
            $this->footerModel->deleteSocial($deleteSocial);
            $this->redirect("admin.php?page=social");
        }
        catch (\Exception $e)
        {
            $this->logErrors($e);
            echo $e->getMessage();
        }

    }
}