<?php
// registering view that displays the user registration form, and all validation and logic will happen in AuthController::doRegister().
?>

<?php include __DIR__ . '/../../../includes/header.php'; ?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>Join the Community</h1>
            <p class="page-subtext">
                Create your MysterMash Productions account today!
            </p>
        </div>
    </section>

    <section class="membership-section">
        <div class="container" style="max-width: 420px;">

            <?php
            if (!empty($_SESSION['flash'])):
                ?>
                <p style="color:#ff7b00; margin-bottom:1rem;">
                    <?= $_SESSION['flash']; ?>
                </p>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form method="post" action="index.php?controller=auth&action=doRegister">


                <div style="margin-bottom:1rem;">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required style="width:100%; padding:0.6rem;">
                </div>


                <div style="margin-bottom:1rem;">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required style="width:100%; padding:0.6rem;">
                </div>


                <div style="margin-bottom:1.5rem;">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required style="width:100%; padding:0.6rem;">
                </div>

                <button type="submit" class="btn-primary" style="width:100%;">
                    Create Account
                </button>
            </form>

            <p style="margin-top:1.5rem; text-align:center;">
                Already have an account?
                <a href="/mystermash-productions/auth/login">
                    Log in
                </a>
            </p>

        </div>
    </section>
</main>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>