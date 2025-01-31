<?php

require_once('php/session.php');

//require_once('php/session.php');
require_once('controllers/AccountController.php');

// Include the head section of the page
require_once('views/head_section.html');
// Include the navigation section of the page
require_once('views/nav_section.php');

//Display a welcome message with the user's first name
 echo '<br><div style=display: flex; align-items: center; height: 100vh; color: black;>
 <h6 style="margin-left: 40px; color: black">Welcome - ' . $_SESSION['f_name'] . '</h6></div>';
 



require_once('php/nav_router.php');

// Check if the current page is the homepage (adjust based on how the homepage URL is structured)
if ($_SERVER['REQUEST_URI'] == "/final_project/index.php" || $_SERVER['REQUEST_URI'] == "/") {
    // this pages will be only in the homepage
    require_once('views/carousel_section.html');
    require_once('views/books_section.html');
    require_once('views/footer_section.html');
}



?>



