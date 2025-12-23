<!-- Admin User Management which allows the admin to enable, disable, or delete user accounts-->


<?php include __DIR__ . '/../../../includes/header.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Manage Users</h1>
        <p class="page-subtext">Admin-only user account management</p>
    </div>
</section>

<section class="membership-section">
    <div class="container">
        <!-- Loop through all registered users -->
        <?php foreach ($users as $user): ?>
            <div style="margin-bottom:1.25rem; padding:1rem; border-bottom:1px solid #333;">
                <strong><?= htmlspecialchars($user['name']); ?></strong><br>
                <small><?= htmlspecialchars($user['email']); ?></small><br>
                Role: <?= htmlspecialchars($user['role']); ?><br>
                Status: <?= htmlspecialchars($user['status']); ?>

                <div style="margin-top:0.5rem;">
                    <?php if ($user['status'] === 'active'): ?>
                        <form method="post" action="index.php?controller=admin&action=disableUser" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">

                            <!-- Toggle user account status -->
                            <button class="btn-primary">Disable</button>
                        </form>
                    <?php else: ?>
                        <form method="post" action="index.php?controller=admin&action=enableUser" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <button class="btn-primary">Enable</button>
                        </form>
                    <?php endif; ?>


                    <!-- For the admin to delete a user account -->
                    <form method="post" action="index.php?controller=admin&action=deleteUser" style="display:inline;"
                        onsubmit="return confirm('Delete this user permanently?');">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <button class="btn-primary" style="background:#d13a24;">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>