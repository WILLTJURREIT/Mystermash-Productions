<?php
$currentController = $_GET['controller'] ?? 'main';
$currentAction = $_GET['action'] ?? 'index';

//this checks if the user is logged in, who this user is, and stores into reference.
$isLoggedIn = isset($_SESSION['user']);
$userName = $isLoggedIn ? $_SESSION['user']['name'] : null;
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

            <!-- logged in user display -->
            <?php if ($isLoggedIn): ?>
                <span class="nav-user">
                    Welcome, <?= htmlspecialchars($userName); ?>
                </span>
            <?php endif; ?>

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

                <?php if ($isLoggedIn): ?>
                    <!-- Log Out -->
                    <a href="index.php?controller=auth&action=logout" class="nav-cta">
                        Log Out
                    </a>
                <?php else: ?>
                    <!--Log In -->
                    <a href="index.php?controller=auth&action=login" class="nav-cta">
                        Log In
                    </a>
                <?php endif; ?>


                <?php if (isAdmin()): ?>
                    <a href="index.php?controller=admin&action=tutorials"
                        class="<?= $currentController === 'admin' && $currentAction === 'tutorials' ? 'active' : '' ?>">Admin
                        Tutorials</a>
                <?php endif; ?>
                <?php if ($isLoggedIn): ?>
                    <a href="index.php?controller=post&action=community"
                        class="<?= $currentController === 'post' && $currentAction === 'community' ? 'active' : '' ?>">
                        Community
                    </a>
                <?php endif; ?>
                <?php if (isAdmin()): ?>
                    <a href="index.php?controller=admin&action=users"
                        class="<?= $currentController === 'admin' && $currentAction === 'users' ? 'active' : '' ?>">
                        Manage Users
                    </a>
                <?php endif; ?>

                <?php if ($isLoggedIn && !isAdmin()): ?>
                    <!-- User dashboard link -->
                    <a href="index.php?controller=user&action=dashboard"
                        class="<?= $currentController === 'user' ? 'active' : '' ?>">
                        Dashboard
                    </a>
                <?php endif; ?>

                <?php if (isAdmin()): ?>
                    <!--admin dashboard link -->
                    <a href="index.php?controller=admin&action=dashboard"
                        class="<?= $currentController === 'admin' && $currentAction === 'dashboard' ? 'active' : '' ?>">
                        Admin Dashboard
                    </a>
                <?php endif; ?>

            </nav>

            <!-- Mobile menu button -->
            <button class="nav-toggle">Menu</button>
        </div>
    </header>

    <main>