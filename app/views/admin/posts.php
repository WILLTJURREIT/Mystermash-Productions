<?php include __DIR__ . '/../../../includes/header.php'; ?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>All Posts</h1>
            <p class="page-subtext">Manage all user posts</p>
        </div>
    </section>

    <section class="membership-section">
        <div class="container">

            <?php if (empty($posts)): ?>
                <p>No posts found.</p>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div style="margin-bottom:2rem; border-bottom:1px solid #333; padding-bottom:1rem;">
                        <h3><?= htmlspecialchars($post['title']); ?></h3>
                        <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>

                        <small>
                            Posted by <?= htmlspecialchars($post['author']); ?>
                            on <?= $post['created_at']; ?>
                        </small>

                        <div style="margin-top:0.5rem;">
                            <a href="index.php?controller=post&action=delete&id=<?= $post['id']; ?>"
                                onclick="return confirm('Delete this post?');" style="color:#d13a24;">
                                Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </section>
</main>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>