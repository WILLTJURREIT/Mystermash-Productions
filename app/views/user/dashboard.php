<!-- This page is the User dashboard view if the user session exists, the access control is done in UserController, not with this page. -->
<?php include __DIR__ . '/../../../includes/header.php'; ?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>Create a Post</h1>

            <!--prevents XSS attacks, displays session user name, converts to special characters-->
            <!-- <p class="page-subtext">
              // htmlspecialchars($_SESSION['user']['name']); 
            </p> -->
        </div>
    </section>
    <section class="membership-section">
        <div class="container">
            <h2>Dashboard Options</h2>
            <ul>
                <li>
                    <p>
                        Create motivational posts, build a strong community.
                    </p>
                </li>
                <li>
                    <b>(More options coming soon!)</b>
                </li>
            </ul>

        </div>
    </section>


    <section class="user-create-post">
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

                    <!--  EDIT and DELETE controls for the posts -->
                    <form method="post" action="index.php?controller=post&action=update" style="margin-top:0.75rem;">

                        <!-- the required tells PHP which post is being updated -->
                        <input type="hidden" name="id" value="<?= $post['id']; ?>">

                        <!-- edit the title -->
                        <div style="margin-bottom:0.5rem;">
                            <input type="text" name="title" value="<?= htmlspecialchars($post['title']); ?>" required
                                style="width:100%;">
                        </div>

                        <!-- edit the content-->
                        <div style="margin-bottom:0.5rem;">
                            <textarea name="content" rows="3" required
                                style="width:100%;"><?= htmlspecialchars($post['content']); ?></textarea>
                        </div>
                        <button class="btn-primary">Update</button>
                        <!-- delete link-->
                        <a href="index.php?controller=post&action=delete&id=<?= $post['id']; ?>"
                            onclick="return confirm('Delete this post?');" style="margin-left:1rem; color:#d13a24;">
                            Delete
                        </a>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>