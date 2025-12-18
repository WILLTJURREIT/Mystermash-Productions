<?php

// AdminController handles admin functionality.
class AdminController
{
    private PDO $pdo;

    // Constructor receives the database connection
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // this is for checking to ensure that the wiring of the controller is correct with the Post model. 
    public function dashboard()
    {
        requireAdmin();
        echo "AdminController is working";
    }
    public function posts()
    {
        requireAdmin();

        $posts = Post::getAll($this->pdo);

        include __DIR__ . '/../views/admin/posts.php';
    }


}

