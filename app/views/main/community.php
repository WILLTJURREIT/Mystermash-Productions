<?php include __DIR__ . '/../../../includes/header.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Community Feed</h1>
        <p class="page-subtext">Motivation shared by the Mystermash community.</p>
    </div>
</section>

<section class="membership-section">
    <div class="container">

        <h2>Latest Community Posts</h2>

        <?php if (empty($posts)): ?>
            <p>No community posts yet.</p>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div style="margin-bottom:1.5rem; padding:1rem; border:1px solid rgba(255,255,255,0.15); border-radius:12px;">

                    <!--Post title -->
                    <h3><?= htmlspecialchars($post['title']); ?></h3>

                    <!-- Post content-->
                    <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>

                    <small>
                        Posted by <?= htmlspecialchars($post['author']); ?> on <?= htmlspecialchars($post['created_at']); ?>
                    </small>

                    <!--ADMIN -TOOL -->
                    <?php if (isAdmin()): ?>
                        <form method="post" action="index.php?controller=post&action=adminDelete" style="margin-top:0.75rem;">
                            <input type="hidden" name="id" value="<?= (int) $post['id']; ?>">
                            <button class="btn-primary" style="background:#d13a24;"
                                onclick="return confirm('Delete this community post as admin?');">
                                Delete User Post
                            </button>
                        </form>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>