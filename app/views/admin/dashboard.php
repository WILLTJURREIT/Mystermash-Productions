<?php include __DIR__ . '/../../../includes/header.php'; ?>


<!-- ADMIN DASHBOARD-->


<section class="page-header">
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p class="page-subtext">
            Manage platform content and moderation tools
        </p>
    </div>
</section>

<section class="membership-section">
    <h2>Admin Tools</h2>

    <div class="admin-tools">
        <a href="/mystermash-productions/admin/users" class="btn-primary">Manage Users</a>
        <a href="/mystermash-productions/post/community" class="btn-primary">Manage Community</a>
        <a href="/mystermash-productions/admin/quotes" class="btn-primary">Manage Quotes</a>
    </div>
</section>


<!-- CREATE A POST SECTION -->

<section class="create-post">
    <h2>Create a Post</h2>

    <form method="post" action="index.php?controller=post&action=create">

        <div style="margin-bottom:1rem;">
            <label>Title</label>
            <input type="text" name="title" required style="width:100%;">
        </div>

        <div style="margin-bottom:1rem;">
            <label>Content</label>
            <textarea name="content" rows="4" required style="width:100%;"></textarea>
        </div>

        <button class="btn-primary">Post</button>
    </form>

    <hr>

    <h2>Your Posts</h2>

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
                    <form method="post" action="index.php?controller=post&action=update" style="margin-top:0.75rem;">
                        <input type="hidden" name="id" value="<?= (int) $post['id']; ?>">

                        <div style="margin-bottom:0.5rem;">
                            <input type="text" name="title" value="<?= htmlspecialchars($post['title']); ?>" required
                                style="width:100%;">
                        </div>

                        <div style="margin-bottom:0.5rem;">
                            <textarea name="content" rows="3" required
                                style="width:100%;"><?= htmlspecialchars($post['content']); ?></textarea>
                        </div>

                        <button class="btn-primary">Update</button>

                        <a href="index.php?controller=post&action=delete&id=<?= (int) $post['id']; ?>"
                            onclick="return confirm('Delete this post?');" style="margin-left:1rem; color:#d13a24;">
                            Delete
                        </a>
                    </form>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>