<!-- This page is the User dashboard view if the user session exists, the access control is done in UserController, not with this page. -->
<?php include __DIR__ . '/../../../includes/header.php'; ?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>Welcome Back</h1>

            <!--prevents XSS attacks, displays session user name, converts to special characters-->
            <p class="page-subtext">
                <?= htmlspecialchars($_SESSION['user']['name'] . "'s" . " " . "dashboard"); ?>
            </p>
        </div>
    </section>
    <section class="membership-section">
        <div class="container">

            <p>
                Welcome to your dashboard.
            </p>

            <p>
                From here, you are able to:
            </p>

            <ul>
                <li>Create motivational posts</li>
                <li>Upload media</li>
                <li>Manage your own content</li>
            </ul>
        </div>
    </section>
    <hr>

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
        <p>You haven not posted anything yet.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div style="margin-bottom:1.5rem;">
                <h3><?= htmlspecialchars($post['title']); ?></h3>
                <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
                <small>Posted on <?= $post['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>


</main>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>