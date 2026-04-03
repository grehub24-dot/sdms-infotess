<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch Alumni from Database
$stmt = $pdo->query("SELECT * FROM alumni ORDER BY graduation_year DESC");
$alumni = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>Alumni Network</h1>
    <p>Connect with former students and industry professionals.</p>
</section>

<section class="page-shell">
    <div class="container">
        <?php if (empty($alumni)): ?>
            <div class="card empty-state">
                <i class="fas fa-user-graduate"></i>
                <p>Our alumni records are being updated. Check back soon!</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($alumni as $alum): ?>
                <div class="card" style="text-align: center;">
                    <div class="profile-ring-wrap">
                        <img src="<?php echo htmlspecialchars($alum['image_url'] ?: 'images/aamusted.jpg'); ?>" alt="<?php echo htmlspecialchars($alum['full_name']); ?>" class="profile-ring">
                        <div class="card-tag">Class of <?php echo htmlspecialchars((string)$alum['graduation_year']); ?></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo htmlspecialchars($alum['full_name']); ?></h3>
                        <p class="muted">
                            <strong><?php echo htmlspecialchars($alum['position'] ?? 'Alumni Member'); ?></strong>
                            <?php if (!empty($alum['company'])): ?>
                                at <?php echo htmlspecialchars($alum['company']); ?>
                            <?php endif; ?>
                        </p>
                        <?php if (!empty($alum['testimonial'])): ?>
                            <p class="quote-box">"<?php echo htmlspecialchars($alum['testimonial']); ?>"</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
