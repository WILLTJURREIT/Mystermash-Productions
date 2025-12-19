<?php

// TutorialController that handles tutorial requests 

class TutorialController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // Public tutorials page
    public function index()
    {
        // to fetch tutorials from the model
        $tutorials = Tutorial::getAll($this->pdo);

        // Load the public tutorials view must happen in order to view the totorials 
        include __DIR__ . '/../views/main/tutorials.php';
    }

    // admin tutorial management page
    public function admin()
    {
        requireAdmin();

        $tutorials = Tutorial::getAll($this->pdo);

        include __DIR__ . '/../views/admin/tutorials.php';
    }
    // Handle admin tutorial creation in the site
    public function create()
    {
        requireAdmin();

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $videoUrl = trim($_POST['video_url'] ?? '');

        if (!$title) {
            $_SESSION['flash'] = 'Tutorial title is required.';
            header('Location: index.php?controller=tutorial&action=admin');
            exit;
        }

        Tutorial::create($this->pdo, $title, $description, $videoUrl);

        header('Location: index.php?controller=tutorial&action=admin');
        exit;
    }
}
