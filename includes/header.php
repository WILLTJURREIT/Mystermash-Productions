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
    <link rel="stylesheet" href="/Mystermash-Productions/public/css/animations.css" />
    <link rel="stylesheet" href="/Mystermash-Productions/public/css/styles.css" />
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="/mystermash-productions/main/home" class="logo">
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
                    <?= htmlspecialchars($userName); ?>
                </span>
            <?php endif; ?>

            <nav class="main-nav">
                <a href="/mystermash-productions/main/home"
                    class="<?= $currentController === 'main' && $currentAction === 'index' ? 'active' : '' ?>">Home</a>

                <a href="/mystermash-productions/main/tutorials"
                    class="<?= $currentController === 'main' && $currentAction === 'tutorials' ? 'active' : '' ?>">Tutorials</a>

                <a href="/mystermash-productions/main/membership"
                    class="<?= $currentController === 'main' && $currentAction === 'membership' ? 'active' : '' ?>">Membership</a>

                <a href="/mystermash-productions/main/about"
                    class="<?= $currentController === 'main' && $currentAction === 'about' ? 'active' : '' ?>">About</a>

                <a href="/mystermash-productions/main/contact"
                    class="<?= $currentController === 'main' && $currentAction === 'contact' ? 'active' : '' ?>">Contact</a>




                <!-- LOG IN AND OUT  -->

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

                <?php if ($isLoggedIn): ?>
                    <a href="/mystermash-productions/post/community"
                        class="<?= $currentController === 'post' && $currentAction === 'community' ? 'active' : '' ?>">
                        Community
                    </a>
                <?php endif; ?>

                <!-- ADMIN / USER DASHBOARDS -->


                <?php if ($isLoggedIn && !isAdmin()): ?>
                    <!-- User dashboard link -->
                    <a href="/mystermash-productions/user/dashboard"
                        class="<?= $currentController === 'user' ? 'active' : '' ?>">
                        Dashboard
                    </a>
                <?php endif; ?>

                <?php if (isAdmin()): ?>
                    <!--admin dashboard link -->
                    <a href="/mystermash-productions/admin/dashboard"
                        class="<?= $currentController === 'admin' && $currentAction === 'dashboard' ? 'active' : '' ?>">
                        Dashboard
                    </a>
                <?php endif; ?>

            </nav>

            <!-- Mobile menu button -->
            <button class="nav-toggle">Menu</button>
        </div>
    </header>
    <main>