<?php include __DIR__ . '/../../../includes/header.php'; ?>
<!-- The form submits data to AuthController::authenticate() -->
<main>
    <section class="page-header">
        <div class="container">
            <h1>Log In</h1>
            <p class="page-subtext">
                Access your MysterMash Productions account.
            </p>
        </div>
    </section>


    <section class="membership-section">
        <div class="container" style="max-width: 420px;">

            <?php
            // Flash Message Display which is used to show login errors or system messages.
            // Messages are set in AuthController and cleared after display.
            if (!empty($_SESSION['flash'])):
                ?>
                <p style="color: #ff7b00; margin-bottom: 1rem;">
                    <?= $_SESSION['flash']; ?>
                </p>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <!-- login form -->
            <form method="post" action="index.php?controller=auth&action=authenticate">

                <div style="margin-bottom: 1rem;">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required style="width:100%; padding:0.6rem;">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required style="width:100%; padding:0.6rem;">
                </div>
                <button type="submit" class="btn-primary" style="width:100%;">
                    Log In
                </button>
            </form>

            <!-- registry link -->
            <p style="margin-top:1.5rem; text-align:center;">
                Don’t have an account?
                <a href="/mystermash-productions/auth/register">
                    Join the community
                </a>
            </p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>