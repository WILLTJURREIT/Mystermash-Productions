<!-- 
 This is the quote Management Page where admin can create, delete, and select which quote is displayed on the main homepage
-->

<?php include __DIR__ . '/../../../includes/header.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Manage Quotes</h1>
        <p class="page-subtext">Create and delete daily quotes shown on the home page.</p>
    </div>
</section>

<section class="membership-section">
    <div class="container">

        <?php if (!empty($_SESSION['flash'])): ?>
            <p style="color: var(--mm-accent-gold);">
                <?= htmlspecialchars($_SESSION['flash']);
                unset($_SESSION['flash']); ?>
            </p>
        <?php endif; ?>


        <!-- Form to create a new quote-->
        <h2>Add a Quote</h2>

        <form method="post" action="/mystermash-productions/admin/createQuote" style="margin-bottom: 2rem;">
            <div style="margin-bottom: 1rem;">
                <label>Quote</label>
                <textarea name="quote_text" rows="3" required style="width:100%;"></textarea>
            </div>

            <div style="margin-bottom: 1rem;">
                <label>Author</label>
                <input type="text" name="author" style="width:100%;" />
            </div>

            <button class="btn-primary" type="submit">Save Quote</button>
        </form>


        <!-- This is al ist of all quotes in the system where the admin can delete quotes or set one as the active homepage quote-->

        <h2>Existing Quotes</h2>

        <?php if (empty($quotes)): ?>
            <p>No quotes yet.</p>
        <?php else: ?>
            <?php foreach ($quotes as $quote): ?>
                <div style="border:1px solid var(--mm-border-subtle); padding: 1rem; border-radius: 12px; margin-bottom: 1rem;">
                    <p style="margin:0 0 0.5rem 0;">
                        “<?= htmlspecialchars($quote['quote_text']); ?>”
                    </p>

                    <small style="color: var(--mm-text-muted);">
                        <?= htmlspecialchars($quote['author'] ?? 'Unknown'); ?> • <?= htmlspecialchars($quote['created_at']); ?>
                    </small>

                    <form method="post" action="/mystermash-productions/admin/deleteQuote" style="margin-top: 0.75rem;">
                        <input type="hidden" name="id" value="<?= (int) $quote['id']; ?>">
                        <button type="submit" class="btn-ghost" onclick="return confirm('Delete this quote?');">
                            Delete
                        </button>
                    </form>
                    <form method="post" action="/mystermash-productions/admin/activateQuote" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $quote['id']; ?>">
                        <button class="btn-ghost">
                            <?= $quote['is_active'] ? 'Current Quote' : 'Set as Current' ?>
                        </button>
                    </form>
                    <?php if ($quote['is_active']): ?>
                        <span style="color: #ffaa32; margin-left:1rem;"> Active</span>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>