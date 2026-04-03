<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM news ORDER BY published_at DESC LIMIT 12");
$news_items = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>News & Updates</h1>
    <p>Stay informed with the latest news from USTED</p>
</section>

<section class="page-shell">
    <div class="container">
        <h2 class="section-title">Latest News</h2>
        
        <?php if (empty($news_items)): ?>
            <div class="card empty-state">
                <i class="fas fa-newspaper"></i>
                <p>No news is available yet.</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($news_items as $news): ?>
                <div class="card">
                    <div style="height: 200px;">
                        <img src="<?php echo htmlspecialchars($news['image_url'] ?: 'images/aamusted.jpg'); ?>" alt="News Image" style="height: 100%;">
                    </div>
                    <div class="card-content">
                        <span class="date-text">
                            <i class="far fa-calendar-alt"></i> <?php echo date('F j, Y', strtotime((string)$news['published_at'])); ?>
                        </span>
                        <h3 class="card-title">
                            <?php if (!empty($news['source_url'])): ?>
                                <a href="<?php echo htmlspecialchars($news['source_url']); ?>" target="_blank">
                                    <?php echo htmlspecialchars($news['title']); ?>
                                </a>
                            <?php else: ?>
                                <?php echo htmlspecialchars($news['title']); ?>
                            <?php endif; ?>
                        </h3>
                        <p class="muted">
                            <?php echo htmlspecialchars(substr((string)$news['content'], 0, 150)) . '...'; ?>
                        </p>
                        <?php if (!empty($news['source_url'])): ?>
                            <a href="<?php echo htmlspecialchars($news['source_url']); ?>" target="_blank" class="card-link">Read More &rarr;</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <div class="center-wrap">
            <a href="https://aamusted.edu.gh/news/" target="_blank" class="btn-primary">View All News on Official Site</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
