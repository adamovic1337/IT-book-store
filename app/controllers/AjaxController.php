<?php

namespace app\controllers;
use app\models\Books;
use app\models\Cart;
use app\models\Pagination;
use app\models\Mailer;
use app\models\Session;

class AjaxController extends Controller
{
    private $database;
    private $booksModel;
    private $paginationModel;

    public function __construct($database)
    {
        $this->database=$database;
        $this->booksModel = new Books($this->database);
        $this->paginationModel = new Pagination($this->database);
    }
    // AJAX for Bookstore page
    public function autocomplete()
    {
        try
        {
            $autocomplete = $this->booksModel->autocompleteForSearch();
            $this->returnJSON($autocomplete);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showBooksForPagination($focusedPage)
    {
        try
        {
            $pagination = $this->booksModel->getBooksForPagination($focusedPage);
            $this->returnJSON($pagination);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showBooksForSearch($searchString, $focusedPage)
    {
        try
        {
            $search = $this->booksModel->getBooksForSearch($searchString, $focusedPage);
            $this->returnJSON($search);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showPaginationForSearch($searchString)
    {
        try
        {
            $pagination = $this->paginationModel->paginationForSearch($searchString);
            $this->returnJSON($pagination);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showBooksForFilter($checkedItems, $focusedPage)
    {
        try
        {
            $filter = $this->booksModel->getBooksForFilter($checkedItems, $focusedPage);
            $this->returnJSON($filter);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showPaginationForFilter($checkedItems)
    {
        try
        {
            $pagination = $this->paginationModel->paginationForFilter($checkedItems);
            $this->returnJSON($pagination);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showBooksForFilterUnchecked()
    {
        try
        {
            $filter = $this->booksModel->getBooksWithImages();
            $this->returnJSON($filter);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showPagination()
    {
        try
        {
            $pagination = $this->paginationModel->pagination();
            $this->returnJSON($pagination);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function showBooksForSorting($sortValue, $focusedPage)
    {
        try
        {
            $filter = $this->booksModel->getBooksForSorting($sortValue, $focusedPage);
            $this->returnJSON($filter);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    // AJAX for Contact page
    public function contact($userName, $userEmail, $subject, $message)
    {
        $mailerModel = new Mailer($this->database, $userName, $userEmail, $subject, $message);
        return $mailerModel->sendMail();
    }
    // AJAX for Session
    public function signIn($database, $username, $password)
    {
        $sessionModel = Session::constructSignIn($database, $username, $password);
        try
        {
            $user = $sessionModel->getUserFromDB();
            if ($user != null)
            {
                $sessionModel->createSession($user);
                $this->logOnline();
                $this->returnJSON("OK");
            }
            else
            {
                $this->returnJSON("Wrong Credentials", 400);
            }
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    public function signUp($database, $username, $password, $email)
    {
        $sessionController = Session::constructSignUp($database, $username, $password, $email);
        try
        {
            $usernameCheck = $sessionController->getUsername();
            $emailCheck = $sessionController->getEmail();
            if($usernameCheck != null)
            {
                $this->returnJSON("Username already in use", 400);
                return;
            }
            if($emailCheck != null)
            {
                $this->returnJSON("Email already in use", 400);
                return;
            }
            try
            {
                $createUser = $sessionController->insertUser();
                if($createUser)
                {
                    $this->returnJSON("You can log in now");
                }
                else
                {
                    $this->returnJSON("Unable to register", 400);
                }
            }
            catch (\PDOException $e)
            {
                $this->logErrors($e);
                $this->returnJSON($e, 500);
            }
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }
    // AJAX for Cart
    public function showCartData($values)
    {
        $cartModel = new Cart($this->database);
        try
        {
            $cart = $cartModel->booksForCart($values);
            $this->returnJSON($cart);
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 500);
        }
    }
    public function pay($user, $ids)
    {
        $cartModel = Cart::constructPay($this->database, $user, $ids);
        try
        {
            $cart = $cartModel->createPayment();
            $this->returnJSON("ok");
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }

    public function updateProfile($password, $email, $firstName, $lastName, $country, $userId)
    {
        $sessionModel = Session::constructProfileChange($this->database, $password, $email, $firstName, $lastName, $country, $userId);
        try
        {
            $sessionModel->changeProfile();
            $this->redirect("index.php?page=logout");
        }
        catch (\PDOException $e)
        {
            $this->logErrors($e);
            $this->returnJSON($e, 400);
        }
    }

}