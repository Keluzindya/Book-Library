<?php

// Include the AccountController file to use its methods
// Include the BooksController file to use its methods

require_once('controllers/AccountController.php');
require_once('controllers/BooksController.php');


// Create an instance of AccountController and BooksController
$AccountController = new AccountController();
$BooksController = new BooksController();

$action = $_GET['action'] ?? '';

// Use a switch statement to check which action was passed in the URL
switch ($action) {

    case 'signUp' :
        $AccountController->signUp();
        break;
    case 'enrollment' :
        $AccountController->enrollment();
        break;
    case 'signIn' :
        $AccountController->signIn();
        break;
    case 'signOut' :
        $AccountController->signOut();
        break;
    case 'verifyUser' :
        $AccountController->verifyUser();  
        break; 
    case 'allUsers' :
        $AccountController->allUsers();  
        break; 
    case 'aboutUs' :
        $AccountController->aboutUs();  
        break; 
    case 'exploreBooks' :
        $BooksController->exploreBooks();
        break;
    case 'addBook' :
        $BooksController->addBook();
        break;
    case 'displayAddBook' :
        $BooksController->displayAddBook();
        break;
    case 'exploreBooks' :
        $BooksController->exploreBooks();
        break;
    case 'allBooks' :
        $BooksController->allBooks();
        break;

    default:
 

}









?>