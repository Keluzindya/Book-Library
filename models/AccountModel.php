<?php

// Include the database connection file
include_once('php/DataBase.php');

// Define the AccountModel class to handle account-related operations
class AccountModel {

    // This method adds new user information to the database
    public function enrollment($data) {
        
       // Extract user details from the provided data
       $f_name = $data['f_name']; // First name of the user
       $l_name = $data['l_name']; // Last name of the user
       $hashed_password = password_hash($data['password_two'], PASSWORD_BCRYPT); // Hash the password for security
       $user_name = $data['email_one']; // User's email (used as username)
       $user_address = $data['address']; // User's address
       $user_type = "Guest"; // Set default user type as "Guest"
       $city = $data['city']; // User's city
       
       // Connect to the database using PDO
       $pdo = DataBase::getInstance($data);

       // Prepare the SQL query to insert user details into the database
       $stmt = $pdo->prepare("INSERT INTO accounts (f_name, l_name, user_name, user_password, user_address, city, user_type) 
       VALUES (:f_name, :l_name, :user_name, :hashed_password, :user_address, :city, :user_type)");

       // Bind the user details to the placeholders in the SQL query
       $stmt->bindParam(':f_name', $f_name);
       $stmt->bindParam(':l_name', $l_name);
       $stmt->bindParam(':user_name', $user_name);
       $stmt->bindParam(':hashed_password', $hashed_password);
       $stmt->bindParam(':user_address', $user_address);
       $stmt->bindParam(':city', $city);
       $stmt->bindParam(':user_type', $user_type);

       // Execute the query and return whether it was successful
       return $stmt->execute();
    } // End of enrollment method

    // This method verifies if a user exists and checks their password
    public function verifyUser($user_name, $password) {
        try {
            // Connect to the database using PDO
            $pdo = DataBase::getInstance();

            // Prepare the SQL query to find the user by username
            $stmt = $pdo->prepare("SELECT * FROM accounts WHERE user_name = :user_name LIMIT 1");
            // Bind the username to the query placeholder
            $stmt->bindParam(':user_name', $user_name);

            // Execute the query
            $stmt->execute();

            // Fetch the user details from the database
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the user exists and verify their password
            if ($user && password_verify($password, $user['user_password'])) {
                return $user; // Return user details if verification succeeds
            } else {
                return false; // Return false if user doesn't exist or password is wrong
            }
        } catch (PDOException $e) {
            // Log any database errors for debugging
            error_log("Database Error: " . $e->getMessage());
            return false; // Return false if an error occurs
        }
    } // End of verifyUser method

    // This method fetches all users from the database
    public function allUsers() {
        try {
            // Connect to the database using PDO
            $pdo = DataBase::getInstance();

            // Prepare the SQL query to get all users
            $stmt = $pdo->prepare("SELECT * FROM accounts");

            // Execute the query
            $stmt->execute();

            // Fetch all users as an associative array
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return the list of users
            return $user;
        } catch (PDOException $e) {
            // Log any database errors for debugging
            error_log("Error: Unable to fetch users from the database - " . $e->getMessage());
            return false; // Return false if an error occurs
        }
    } // End of allUsers method

} // End of AccountModel class

?>
