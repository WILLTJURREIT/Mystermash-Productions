<?php
// starts the session, this is used for the authentication process.
session_start();

// check if a user is logged in, this is used throughout this app to protect authenticated routes.
function isLoggedIn()
{
    return isset($_SESSION['user']);
}


// check if the logged-in user is an admin, then we check their role value

function isAdmin()
{
    return isLoggedIn() && $_SESSION['user']['role'] === 'admin';
}



// force the authentication for protected pages, this function will redirect the user to the log in page. 
function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: index.php?controller=auth&action=login');
        exit;
    }
}



// For admin access used for the admin dashboard, managing users, tutorials and quotes - sends to login page.
function requireAdmin()
{
    if (!isAdmin()) {
        header('Location: index.php?controller=auth&action=login');
        exit;
    }
}
