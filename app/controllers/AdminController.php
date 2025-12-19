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

    // Show the admin dashboard
    public function dashboard()
    {
        requireAdmin();
        // echo "AdminController is working";
        include __DIR__ . '/../views/admin/dashboard.php';
    }
    public function posts()
    {
        requireAdmin();

        $posts = Post::getAll($this->pdo);

        include __DIR__ . '/../views/admin/posts.php';
    }

    // Show admin tutorial management page
    public function tutorials(): void
    {
        requireAdmin();

        // Later this will come from the db for now, this just loads the page.
        include __DIR__ . '/../views/admin/tutorials.php';
    }

    // handle tutorial creation 
    public function createTutorial(): void
    {
        requireAdmin();
        echo "createTutorial() reached";
        exit;
    }

}

