<?php

// Loads the model for accessing the database
require_once('models/BooksModel.php');

// Defines the BooksController class for managing book-related actions
class BooksController {

    private $BooksModel;

    // Constructor to create an instance of the BooksModel class
    public function __construct() {
        // Initialize the BooksModel to interact with the database
        $this->BooksModel = new BooksModel();  
    }

    // Renders a specific view with optional data
    public function render($view, $data = []) {
        // Extracts data so it can be used as variables in the view
        extract($data);
        // Includes the specified view file
        include($view); 
    } 

    // Displays the form to add a new book
    public function displayAddBook() {
        // Load the add_books.php view
        $this->render('views/add_books.php');
    }

    // Handles adding a new book to the database
    public function addBook() {
        // Initialize an array to store book details and error messages
        $data = [ 
            'book_title' => '',
            'book_author' => '',
            'book_genre' => '',
            'book_description' => '',
            'book_price' => '',
            'book_image' => ''
        ];

        // Check if the request method is POST (form submitted)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Get the book title and check if it is empty
                $data['book_title'] = $_POST['book_title'];
                if ($data['book_title'] == "") {
                    $data['book_title_error'] = "No Book Title Given";
                }

                // Get the book author and check if it is empty
                $data['book_author'] = $_POST['book_author'];
                if ($data['book_author'] == "") {
                    $data['book_author_error'] = "No Book Author Given";
                }

                // Get the book genre and check if it is empty
                $data['book_genre'] = $_POST['book_genre'];
                if ($data['book_genre'] == "") {
                    $data['book_genre_error'] = "No Book Genre Given";
                }

                // Get the book description and check if it is empty
                $data['book_description'] = $_POST['book_description'];
                if ($data['book_description'] == "") {
                    $data['book_description_error'] = "No Book Description Given";
                }

                // Get the book price and check if it is empty or invalid
                $data['book_price'] = $_POST['book_price'];
                if (empty($data['book_price']) || !is_numeric($data['book_price'])) {
                    $data['book_price_error'] = "No Book Price Given or Invalid Price";
                }

                // Get the book image and check if it is empty
                $data['book_image'] = $_POST['book_image'];
                if ($data['book_image'] == "") {
                    $data['book_image_error'] = "No Book Image Given";
                }

                // If there are no errors, try to add the book to the database
                if (empty($data['book_title_error']) &&
                    empty($data['book_author_error']) &&
                    empty($data['book_genre_error']) &&
                    empty($data['book_description_error']) &&
                    empty($data['book_price_error']) &&
                    empty($data['book_image_error'])) {

                    // Call the model method to add the book
                    if ($this->BooksModel->add_book($data)) {
                        // Load the success view if the book is added
                        $this->render("views/AddBookSuccess.html");
                        exit();
                    } else {
                        // Reload the form if adding the book fails
                        $this->render("views/add_books.php");
                        exit();
                    }
                }
            } catch (Exception $e) {
                // Handle unexpected errors by logging them and reloading the form
                error_log("Controller error: " . $e->getMessage());
                $this->render('views/add_books.php', $data);            
                exit();
            }

            // Reload the form with any error messages
            $this->render('views/add_books.php', $data);
        }
    }

    // Displays a list of random books for exploration
    public function exploreBooks() {
        // Get random books from the model
        $data = $this->BooksModel->getRandomBooks();
        // Load the explore_books.php view
        $this->render('views/explore_books.php', $data);
    }

    // Displays all books available in the database
    public function allBooks() {
        // Get all books from the model
        $data = $this->BooksModel->allBooks();
        // Load the getAllBooks.php view
        $this->render('views/getAllBooks.php', $data);
        exit();
    }

} // End of the BooksController class

?>
