<?php

// The AuthController handles everything related to the  authentication process including, showing login/register pages, processing login and registration, and Logging users out. All of the database work is happening in the User model

class AuthController
{
    private PDO $pdo;


    // This is the constructor that receives the PDO connection from index.php, this way all database operations use the same connection
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    // Show login page (I will need to still add this view since I have not created one yet)
    public function login()
    {
        echo "<script>alert('Login controller reached');</script>";
        include __DIR__ . '/../views/auth/login.php';
    }


    // -------------------------------
    // Show registration page (I will need to still add this view since I have not created one yet)
    public function register()
    {
        // View will be added in the next step
        include __DIR__ . '/../views/auth/register.php';
    }


    // Handling user registration -POST
    public function doRegister()
    {
        $_SESSION['flash'] = 'doRegister() has been called';

        // Trims input to remove extra whitespace
        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $pass = $_POST['password'] ?? '';

        // this does the validation, this means we require all info filled out to register an account. 
        if (!$name || !$email || !$pass) {
            $_SESSION['flash'] = 'All fields are required.';
            header('Location: index.php?controller=auth&action=register');
            exit;
        }

        // checking if the email already exists
        if (User::findByEmail($this->pdo, $email)) {
            $_SESSION['flash'] = 'Email is already registered.';
            header('Location: index.php?controller=auth&action=register');
            exit;
        }

        // Create the user using the model
        $userId = User::create(
            $this->pdo,
            $name,
            $email,
            $pass
        );

        // Store the user in session and this session will be running while the user is logged in. 
        $_SESSION['user'] = User::findById($this->pdo, $userId);

        // redirect to user dashboard which is not built  at this point
        header('Location: index.php?controller=user&action=dashboard');
        exit;
    }


    // Handle login 

    public function authenticate()
    {   // change to lowercase, trim,  using the post method, and store into a reference. 
        $email = strtolower(trim($_POST['email'] ?? ''));
        $pass = $_POST['password'] ?? '';

        // Look up the user by email
        $user = User::findByEmail($this->pdo, $email);

        // Validate credentials and account status
        if (
            !$user ||
            !password_verify($pass, $user['password']) ||
            $user['status'] !== 'active'
        ) {
            $_SESSION['flash'] = 'Incorrect login info.';
            header('Location: index.php?controller=auth&action=login');
            exit;
        }

        // Store user in session
        $_SESSION['user'] = $user;

        // redirect based on role of the user
        if ($user['role'] === 'admin') {
            header('Location: index.php?controller=admin&action=dashboard');
        } else {
            header('Location: index.php?controller=user&action=dashboard');
        }

        exit;
    }

    // Logout function
    public function logout()
    {
        session_destroy();
        //re direct to the home page.
        header('Location: index.php');
        exit;
    }
}