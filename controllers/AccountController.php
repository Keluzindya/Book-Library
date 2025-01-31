<?php

// Load the AccountModel to interact with the database
require_once('models/AccountModel.php');

    class AccountController{

        private $AccountModel;

        // This is the constructor, it creates a new AccountModel
        public function __construct(){
            $this->AccountModel = new AccountModel();
        } //end of Method

        // This method is for showing the sign-up page (form)
        public function signUp(){

            // Create an empty array for storing data
            $data = [];  // Render the sign-up view with the data
            $this->render('views/sign_up.php', $data); // Render the sign up view with the empty data
        } // end of Method

        // This method is for rendering a view (page) and passing data to it
        public function render($view, $data=[]){

            //This is will get the data out of $data
            extract($data);

            //Now load the view passed by the method calling this 
            include($view);

        } // end of method

        // this method registers the user
        public function enrollment(){

            //Check if the user is logged in or not
            if ($_SESSION['user_logged']  == "user_not_logged"){
                $data= [
                 // Create an empty array to hold the form data
                    'f_name'=> '',    
                    'l_name'=> '',
                    'email_one'=> '',
                    'email_two'=> '',
                    'password_one'=> '',
                    'password_two'=> '',
                    'address'=> '',
                    'city'=> '',
                ];
                //Check if the form was submitted (when the user clicked 'submit')
                //Checks the $_POST exists
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    //start redirect and buid our data

                    //check fname, if empty then show the message
                    $data['f_name'] = $_POST['f_name'];  
                    if($data['f_name'] == ""){           
                        $data['f_name_error'] = "No First Name Given" ;   
                    }
                    //check lname
                    $data['l_name'] = $_POST['l_name'];  
                    if($data['l_name'] == ""){           
                        $data['l_name_error'] = "No last Name Given";    
                    }

                    // Check email_one (the first email entered)
                    $data['email_one'] = $_POST['email_one'];  
                    
                    if(!filter_var($data['email_one'], FILTER_VALIDATE_EMAIL)){     
                        $data['email_one_error'] = "This is not an Email address";    
                    }

                    // check email_two
                    $data['email_two'] = $_POST['email_two'];  
                    //php filters for email
                    if(!filter_var($data['email_two'], FILTER_VALIDATE_EMAIL)){     
                        $data['email_two_error'] = "This is not an Email address";    
                    }

                    //Compare both email addresses to check if they match

                    if($data['email_one'] != $data['email_two']) {
                        $data['email_error'] = "The emails do no match.";
                    }

                    //check to see if the password one is submitted
                    $data['password_one'] = $_POST['password_one'];  
                    if($data['password_one'] == ""){           
                        $data['password_one_error'] = "No Password given";    
                    }

                    //check to see if the password two is submitted
                    $data['password_two'] = $_POST['password_two'];   
                    
                    if($data['password_two'] == "") {           
                        $data['password_two_error'] = "No verify password given";    
                    }

                    //Now compare the two passwords if they match
                    if($data['password_one'] != $data['password_two']) {
                        $data['password_match_error'] = "The passwords do no match.";
                    }

                    // check if address is entered,if not show the error message
                    $data['address'] = $_POST['address'];  
                    if($data['address'] == ""){           
                        $data['address_error'] = "No address Given" ;  
                    }

                    // check city
                    $data['city'] = $_POST['city']; 
                    if($data['city'] == ""){      
                        $data['city_error'] = "No city Given" ;
                    }

                    //Check if all errors are empty (meaning no errors were found)

                    if(empty($data['f_name_error'])&&
                    	empty($data['l_name_error'])&&
                    	empty($data['email_one_error'])&&
                    	empty($data['email_two_error'])&&
                    	empty($data['password_one_error'])&&
                    	empty($data['password_two_error'])&&
                    	empty($data['address_error'])&&
                    	empty($data['password_match_error'])&&
                    	empty($data['email_error'])&&
                    	empty($data['city_error'])){
                    
                    // If there are no errors, try to register the user in the database
                        if($this->AccountModel->enrollment($data)){ 

                            //if successful - send it to see the registraction success message
                            $this->render('views/SignUpSuccess.html');
                            exit();
                        }
                    }
             } //end of $_POST request

                // If there are errors or the form was not submitted yet, show the sign-up page again with errors
                $this->render('views/sign_up.php', $data);

            } //end the session check

        } // end of Method

        // start of method
        //sends user to sign in page
        public function signIn(){
            $this->render('views/sign_in.php');
            exit();
        }

        // user logging out
        public function signOut(){
            unset($_SESSION['user_logged'], $_SESSION['user_name']);
            session_unset();
            $this->render('views/SignOutSuccess.html');
            exit();
        } // end of method


        // Process user log in
        public function verifyUser(){

            $data=[
            'password_error' =>'',
             'email_error' =>'',
             'login_error' =>''
            ];

            if ($_SERVER['REQUEST_METHOD']=="POST") {
                // Extract the two passed values and checking them
                $user_name = $_POST['username']; 
                //validate the email address
                if(!filter_var($user_name, FILTER_VALIDATE_EMAIL)){     
                    $data['email_error'] = "Please Enter your Email address";    //error
                }
                    //extract password
                $password = $_POST['password'];
                if($password == ""){     //make sure the password is not empty
                    $data['password_error'] = "No Password is Given";    //error
                }


                //calling user model
                // only showing the user first name when they log in.
                $user = $this->AccountModel->verifyUser($user_name, $password);
                if ($user){
                    $_SESSION['user_logged'] = "user_logged_in";
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['f_name'] = $user['f_name'];
                    $_SESSION['user_type'] = $user['user_type'];

                    $this->render('views/SignInSuccess.html');
                        exit();
                }else{
                     $data['login_error'] = "Invalid username or password."; 
                       $this->render('views/sign_in.php', $data);
                }

             }// end of isset
            
        }//End of the method

        //we want the admin to see all the users
        public function allUsers(){
            // get the users from the model
            $user = $this->AccountModel->allUsers();
            $this->render('views/getAllUsers.php', $user);
            exit();

        }// end of method
        
        //This is the about us page
       public function aboutUs(){
        $this->render('views/aboutUs.html');
            exit();
       }





    }// End of class













?>