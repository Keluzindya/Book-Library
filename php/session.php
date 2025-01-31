<?php

// Check if a session is already started. If not, start a new session.
// Sessions allow storing user data (like login status) across different pages.
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start a new session
}

// Check if the 'user_logged' session variable exists.
// If it doesn't exist, set its default value to "user_not_logged".
if (!isset($_SESSION['user_logged'])) {
    $_SESSION['user_logged'] = "user_not_logged"; // Default value indicates the user is not logged in
}

// Check if the 'user_name' session variable exists.
// If it doesn't exist, set its default value to "Guest".
if (!isset($_SESSION['user_name'])) {
    $_SESSION['user_name'] = "Guest"; // Default username for a guest user
}

// Check if the 'f_name' (first name) session variable exists.
// If it doesn't exist, set its default value to "Guest".
if (!isset($_SESSION['f_name'])) {
    $_SESSION['f_name'] = "Guest"; // Default first name for a guest user
}

// Check if the 'user_type' session variable exists.
// If it doesn't exist, set its default value to "Guest".
if (!isset($_SESSION['user_type'])) {
    $_SESSION['user_type'] = "Guest"; // Default user type for a guest user
}

?>
