<!-- Membership Page - This is a Static ui mockup demonstrating layout, design, and navigation, No payment functionality has been added -->

<?php include __DIR__ . '/../../../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MysterMash Productions | Membership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Epunda+Sans:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/Mystermash-Productions/public/css/styles.css" />
    <link rel="stylesheet" href="/Mystermash-Productions/public/css/animations.css" />
</head>

<body>
    <section class="page-header">
        <div class="container">
            <h1>Membership Tiers</h1>
            <p class="page-subtext">Choose a plan and join the MysterMash community.</p>
        </div>
    </section>


    <section class="membership-section">
        <div class="container membership-grid">
            <div class="membership-card">
                <h2 class="plan-title">Free Access</h2>
                <p class="plan-price">$0 / month</p>
                <ul class="plan-features">
                    <li>Basic Video Library</li>
                    <li>Motivational Quotes</li>
                    <li>Community Access</li>
                </ul>
                <a href="/mystermash-productions/main/underconstruction" class="btn-primary">Get Started</a>
            </div>
            <div class="membership-card highlight">
                <h2 class="plan-title">Standard Member</h2>
                <p class="plan-price">$5 / month</p>
                <ul class="plan-features">
                    <li>All Free Features</li>
                    <li>Early Access Videos</li>
                    <li>Private Community Chat</li>
                    <li>Monthly Live Q&A</li>
                </ul>
                <a href="/mystermash-productions/main/underconstruction" class="btn-primary">Join Now</a>
            </div>
            <div class="membership-card">
                <h2 class="plan-title">Premium Member</h2>
                <p class="plan-price">$10 / month</p>
                <ul class="plan-features">
                    <li>Everything in Standard</li>
                    <li>Behind-the-Scenes Content</li>
                    <li>Exclusive Tutorials</li>
                    <li>Priority Support</li>
                </ul>
                <a href="/mystermash-productions/main/underconstruction" class="btn-primary">Go Premium</a>
            </div>

        </div>
    </section>
    <?php include __DIR__ . '/../../../includes/footer.php'; ?>
</body>

</html>