<?php
// PostController handles the post related users actions
class PostController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // handle creating and submitting the posts
    public function create()
    {
        requireLogin();

        // here trim input for safety
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        // validate
        if (!$title || !$content) {
            $_SESSION['flash'] = 'Must Provide the Title and Content';
            header('Location: index.php?controller=user&action=dashboard');
            exit;
        }

        // Save the post
        Post::create(
            $this->pdo,
            $_SESSION['user']['id'],
            $title,
            $content
        );

        // redirect the user back to dashboard
        header('Location: index.php?controller=user&action=dashboard');
        exit;
    }
}
