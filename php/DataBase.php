<?php


class DataBase {
    private static $instance = null;
    // the variable that will hold the actual database connection
    private $pdo;

    //this is a method. It describes actions or behaviors the object can perform
    // When I create a new object, the constructor is automatically executed, 
    
    private function __construct() {
    
    
        $host = 'localhost';
        $db_name = 'library_books';
        $user_name = 'root';
        $password = 'root';
        $port = 3307;

        // which PDO needs to know how to connect to the database.
        $dsn = "mysql:host=$host;port=$port;dbname=$db_name";	

        // It allows to write database-related code that will work across different databases 
        // so it handles the connection
        $options = [
            // This makes PDO throw exceptions when there are errors.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //making it easy to look up and access specific information. 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //This keeps the database connection open for reuse.
            PDO::ATTR_PERSISTENT => true
        ];

        //TRY STATEMENT HERE
        try {
            $this->pdo = new PDO($dsn, $user_name, $password, $options);
        } catch(PDOException $error) {
            die("Database is unavailable: " . $error->getMessage());
        }
    }// End of Method ---> Need to build ->get_message()

    //Initiate a Connection
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DataBase;
        }

        return self::$instance->pdo;
    }//End of Method


    public function bindParam() {
        //A method to bind parameters
        //process the kind of data we send based on how we sent it
        // forcing that data to be atypical type of data
        if (is_null($type))  {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

            $this->stmt->bindValue($param, $value, $type);

        }
    }//End of Method



}//End of Class
?>