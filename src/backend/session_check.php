<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Function to get current user data
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email']
        ];
    }
    return null;
}

// Function to require login (redirect if not logged in)
function requireLogin($redirectTo = '../pages/home.php') {
    if (!isLoggedIn()) {
        header('Location: ' . $redirectTo);
        exit;
    }
}

// Function to require guest (redirect if logged in)
function requireGuest($redirectTo = '../pages/home.php') {
    if (isLoggedIn()) {
        header('Location: ' . $redirectTo);
        exit;
    }
}
?>
