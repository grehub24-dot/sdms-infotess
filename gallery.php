<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch Gallery from Database
$stmt = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC");
$gallery = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>Gallery</h1>
    <p>Photos from our recent events and student life.</p>
</section>

<section class="page-shell">
    <div class="container">
        <?php if (empty($gallery)): ?>
            <div class="card empty-state">
                <i class="fas fa-images"></i>
                <p>No gallery items are available yet.</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($gallery as $item): ?>
                <div class="card gallery-item">
                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="height: 250px;">
                    <div class="card-content">
                        <h4 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h4>
                        <p class="date-text"><?php echo htmlspecialchars($item['category']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
