<?php
// This user controller handles pages that need a logged in user, right now, this is only the dashboard later on, it will handle posts, profile, and more...

class UserController
{
    private PDO $pdo;

    //this PDO connection comes from index.php
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    // user dashboard, this needs to be only accessible to logged in users.
    public function dashboard()
    {
        requireLogin();
        // here we must fetch the user's posts, store into variable,
        $posts = Post::getByUser(
            $this->pdo,
            $_SESSION['user']['id']
        );
        include __DIR__ . '/../views/user/dashboard.php';
    }

}

