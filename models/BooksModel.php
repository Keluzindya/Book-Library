<?php
// Include the Database connection file
include_once('php/DataBase.php');

class BooksModel {
    
    // Method to add a book to the database
    public function add_book($data) {

        // Get the data from the form and store it in variables
        $book_title = $data['book_title']; // The title of the book
        $book_author = $data['book_author']; // The author of the book
        $book_genre = $data['book_genre']; // The genre/category of the book
        $book_description = $data['book_description']; // A short description of the book
        $book_price = $data['book_price']; // The price of the book
        $book_image = $data['book_image']; // The image of the book (file or URL)

        // Create a connection to the database
        $pdo = DataBase::getInstance($data);

        // Prepare the SQL query to insert the book into the database
        // Use placeholders (:placeholder) for values to prevent SQL injection
        $stmt = $pdo->prepare("INSERT INTO book (book_title, book_author, book_genre, book_description, book_price, book_image) 
        VALUES (:book_title, :book_author, :book_genre, :book_description, :book_price, :book_image)");

        // Bind the variables to the placeholders in the SQL query
        $stmt->bindParam(':book_title', $book_title);
        $stmt->bindParam(':book_author', $book_author);
        $stmt->bindParam(':book_genre', $book_genre);
        $stmt->bindParam(':book_description', $book_description);
        $stmt->bindParam(':book_price', $book_price);
        $stmt->bindParam(':book_image', $book_image);
                    
        // Execute the SQL query and return whether it was successful
        return $stmt->execute();
    } // End of add_book method

    // Method to fetch 3 random books from the database
    public function getRandomBooks() {
        try {
            // Create a connection to the database
            $pdo = Database::getInstance();

            // Prepare the SQL query to get 3 random books
            $stmt = $pdo->prepare('SELECT * FROM book ORDER BY RAND() LIMIT 3');
            
            // Execute the SQL query
            $stmt->execute();

            // Fetch all results as an associative array
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Return the books if they exist, otherwise return false
            if ($data) {
                return $data;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            // Log any errors in the database and return false
            error_log("Error... No DB: " . $e->getMessage());
            return false;
        }
    }

    // Method to fetch all books from the database
    public function allBooks() {
        try {
            // Create a connection to the database
            $pdo = DataBase::getInstance();
    
            // Prepare the SQL query to get all books
            $stmt = $pdo->prepare("SELECT * FROM book");
    
            // Execute the SQL query
            $stmt->execute();
    
            // Fetch all results as an associative array
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Return the books
            return $data;

        } catch (PDOException $e) {
            // Log any database errors and return null
            error_log("Database Error in allBooks(): " . $e->getMessage());
            return null;
        }
    } // End of allBooks method
} // End of class
?>
