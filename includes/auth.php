<?php

session_start();

// check if a user is logged  in
function isLoggedIn()
{
    return isset($_SESSION['user']);
}


// check if the logged-in user is an admin, then we check their role value

function isAdmin()
{
    return isLoggedIn() && $_SESSION['user']['role'] === 'admin';
}



// force the logging for protected pages, this function will redirect the user to the log in page. 
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
