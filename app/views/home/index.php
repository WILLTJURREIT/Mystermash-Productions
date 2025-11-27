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
                <img src="images/mystermash-logo.png" alt="MysterMash Productions logo" class="mm-logo-animate" />
                <span class=" logo-text">
                    <span>MysterMash</span>
                    <span>Productions</span>
                </span>
            </a>

            <nav class="main-nav">
                <a href="index.php" class="active">Home</a>
                <a href="videos.php">Videos</a>
                <a href="membership.php">Membership</a>
                <a href="contact.php">Contact</a>
                <a href="login.php" class="nav-cta">Log In</a>
            </nav>

            <!-- Mobile menu button -->
            <button class="nav-toggle">Menu</button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-inner">
                <div class="hero-text">
                    <p class="hero-kicker">Create • Inspire • Grow</p>
                    <h1>Welcome to MysterMash Productions</h1>
                    <p class="hero-subtitle">
                        A central hub for motivational content, behind-the-scenes ideas, and a growing community of
                        people pushing to become better.
                    </p>
                    <div class="hero-actions">
                        <a href="membership.php" class="btn-primary">Join the Community</a>
                        <a href="videos.php" class="btn-ghost">Explore Videos</a>
                    </div>
                </div>

                <div class="hero-side">
                    <div class="hero-card">
                        <p class="hero-card-label">Daily Quote</p>
                        <p class="hero-card-quote">
                            “Stay consistent. Small steps every day stack up into big wins.”
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 MysterMash Productions. All rights reserved.</p>
            <div class="footer-links">
                <a href="#">YouTube</a>
                <a href="#">Instagram</a>
                <a href="#">TikTok</a>
            </div>
        </div>
    </footer>

</body>

</html>