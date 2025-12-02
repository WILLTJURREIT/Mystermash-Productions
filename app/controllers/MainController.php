<?php
class MainController
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function home()
    {
        include __DIR__ . '/../views/main/index.php';
    }


    public function about()
    {
        include __DIR__ . '/../views/main/about.php';
    }
    public function contact()
    {
        include __DIR__ . '/../views/main/contact.php';
    }
    public function tutorials()
    {
        include __DIR__ . '/../views/main/tutorials.php';
    }
    public function membership()
    {
        include __DIR__ . '/../views/main/membership.php';
    }
}