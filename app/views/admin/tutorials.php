<?php include __DIR__ . '/../../../includes/header.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Manage Tutorials</h1>
        <p class="page-subtext">Admin-only tutorial management</p>
    </div>
</section>

<section class="membership-section">
    <div class="container">

        <h2>Add New Tutorial</h2>

        <form method="post" action="index.php?controller=admin&action=createTutorial">

            <div style="margin-bottom:1rem;">
                <label>Title</label>
                <input type="text" name="title" required style="width:100%;">
            </div>

            <div style="margin-bottom:1rem;">
                <label>Description</label>
                <textarea name="description" rows="3" style="width:100%;"></textarea>
            </div>

            <div style="margin-bottom:1rem;">
                <label>YouTube Embed URL</label>
                <input type="text" name="video_url" required style="width:100%;">
            </div>

            <button class="btn-primary">Add Tutorial</button>
        </form>

        <hr>

        <h2>Existing Tutorials</h2>

        <?php if (empty($tutorials)): ?>
            <p>No tutorials yet.</p>
        <?php else: ?>
            <?php foreach ($tutorials as $tutorial): ?>
                <div style="margin-bottom:1rem;">
                    <strong><?= htmlspecialchars($tutorial['title']); ?></strong><br>
                    <small><?= htmlspecialchars($tutorial['video_url']); ?></small>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>