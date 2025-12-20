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
        // fetch the tutorials from the database
        $tutorials = Tutorial::getAll($this->pdo);

        // and pass them to the view
        include __DIR__ . '/../views/admin/tutorials.php';
    }

    // handle tutorial creation 
    public function createTutorial(): void
    {
        requireAdmin();
        echo "createTutorial() reached";
        exit;
    }

    // manage users
    public function users(): void
    {
        requireAdmin();

        $users = User::getAll($this->pdo);
        include __DIR__ . '/../views/admin/users.php';
    }

    // Disable user
    public function disableUser(): void
    {
        requireAdmin();

        User::disable($this->pdo, (int) $_POST['id']);
        header('Location: index.php?controller=admin&action=users');
        exit;
    }

    // Enable user
    public function enableUser(): void
    {
        requireAdmin();

        User::enable($this->pdo, (int) $_POST['id']);
        header('Location: index.php?controller=admin&action=users');
        exit;
    }

    // Delete user
    public function deleteUser(): void
    {
        requireAdmin();

        User::delete($this->pdo, (int) $_POST['id']);
        header('Location: index.php?controller=admin&action=users');
        exit;
    }

}

