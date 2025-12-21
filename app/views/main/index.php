<?php include __DIR__ . '/../../../includes/header.php'; ?>

<section class="hero">
    <div class="container hero-inner">
        <div class="hero-text">
            <p class="hero-kicker">Create • Inspire • Grow</p>
            <h1>MysterMash Productions</h1>
            <p class="hero-subtitle">
                A central hub for motivational content, behind-the-scenes ideas, and a growing community of
                people pushing to become better.
            </p>
            <div class="hero-actions">
                <a href="/mystermash-productions/auth/register" class="btn-primary">Join the Community</a>
                <a href="/mystermash-productions/main/tutorials" class="btn-ghost">Explore Videos</a>
            </div>
        </div>

        <div class="hero-side">
            <!-- CHARACTER IMAGE -->
            <div class="hero-character"></div>
            <!-- QUOTE CARD -->
        </div>
        <div class="hero-card">
            <p class="hero-card-label">Daily Quote</p>

            <?php if (!empty($dailyQuote)): ?>
                <p class="hero-card-quote">
                    “<?= htmlspecialchars($dailyQuote['quote_text']); ?>”
                    <?php if (!empty($dailyQuote['author'])): ?>
                        <br>
                        <span style="color: var(--mm-text-muted);">
                            — <?= htmlspecialchars($dailyQuote['author']); ?>
                        </span>
                    <?php endif; ?>
                </p>
            <?php else: ?>
                <p class="hero-card-quote">
                    No quote yet. Admin can add one.
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>