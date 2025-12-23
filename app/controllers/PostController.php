<?php
// PostController handles the post related actions including creation,updates, deletion, and the community feed
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

        // here trim input for safety to prevent accidental whitespace and basic injection issues
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

        // redirect based on role so admins remain on the admin dashboard
        if (isAdmin()) {
            header('Location: /mystermash-productions/admin/dashboard');
        } else {
            header('Location: index.php?controller=user&action=dashboard');
            exit;
        }
    }
    // update a post
    public function update()
    {
        requireLogin();

        $postId = (int) ($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if (!$postId || !$title || !$content) {
            $_SESSION['flash'] = 'All fields are required.';
            header('Location: index.php?controller=user&action=dashboard');
            exit;
        }

        Post::update(
            $this->pdo,
            $postId,
            $_SESSION['user']['id'],
            $title,
            $content
        );

        header('Location: index.php?controller=user&action=dashboard');
        exit;
    }


    // delete a post
    public function delete()
    {
        requireLogin();

        $postId = (int) ($_GET['id'] ?? 0);

        if ($postId) {
            Post::delete(
                $this->pdo,
                $postId,
                $_SESSION['user']['id']
            );
        }

        header('Location: index.php?controller=user&action=dashboard');
        exit;
    }

    //COMMUNITY FEED logged in users only
    public function community()
    {
        requireLogin();

        // Grab all posts + author name
        $posts = Post::getAll($this->pdo);

        include __DIR__ . '/../views/main/community.php';
    }


    //ADMIN ONLY delete ANY users post from community feed
    public function adminDelete()
    {
        requireAdmin();

        $postId = (int) ($_POST['id'] ?? 0);

        if ($postId) {
            Post::deleteAsAdmin($this->pdo, $postId);
        }

        // Send admin back to the community page
        header('Location: index.php?controller=post&action=community');
        exit;
    }

}

