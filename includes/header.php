<?php
$currentController = $_GET['controller'] ?? 'main';
$currentAction = $_GET['action'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>MysterMash Productions | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Epunda+Sans:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/Mystermash-Productions/public/css/styles.css" />
    <link rel="stylesheet" href="/Mystermash-Productions/public/css/animations.css" />
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="index.php" class="logo">
                <img src="/Mystermash-Productions/public/images/mystermash-logo.png
" alt="MysterMash Productions logo" class="mm-logo-animate" />
                <span class=" logo-text">
                    <span>MysterMash</span>
                    <span>Productions</span>
                </span>
            </a>

            <nav class="main-nav">
                <a href="index.php"
                    class="<?= $currentController === 'main' && $currentAction === 'index' ? 'active' : '' ?>">Home</a>

                <a href="index.php?controller=main&action=tutorials"
                    class="<?= $currentController === 'main' && $currentAction === 'tutorials' ? 'active' : '' ?>">Tutorials</a>

                <a href="index.php?controller=main&action=membership"
                    class="<?= $currentController === 'main' && $currentAction === 'membership' ? 'active' : '' ?>">Membership</a>

                <a href="index.php?controller=main&action=about"
                    class="<?= $currentController === 'main' && $currentAction === 'about' ? 'active' : '' ?>">About</a>

                <a href="index.php?controller=main&action=contact"
                    class="<?= $currentController === 'main' && $currentAction === 'contact' ? 'active' : '' ?>">Contact</a>

                <a href="index.php?controller=auth&action=login" class="nav-cta">Log In</a>

                <?php if (isAdmin()): ?>
                    <a href="index.php?controller=admin&action=tutorials"
                        class="<?= $currentController === 'admin' && $currentAction === 'tutorials' ? 'active' : '' ?>">Admin
                        Tutorials</a>
                <?php endif; ?>
            </nav>

            <!-- Mobile menu button -->
            <button class="nav-toggle">Menu</button>
        </div>
    </header>

    <main>