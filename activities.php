<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM activities ORDER BY activity_date DESC");
$activities = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>INFOTESS Activities</h1>
    <p>Explore workshops, community events, and society highlights shaping the student experience.</p>
</section>

<section class="page-shell">
    <div class="container">
    <?php if (!empty($activities)): ?>
        <div class="card-grid">
            <?php foreach ($activities as $activity): ?>
                <div class="card">
                    <img src="<?php echo !empty($activity['image_url']) ? htmlspecialchars($activity['image_url']) : 'images/aamusted.jpg'; ?>" alt="Activity">
                    <div class="card-content">
                        <span class="card-tag">Activity</span>
                        <h3 class="card-title"><?php echo htmlspecialchars($activity['title']); ?></h3>
                        <p class="date-text"><?php echo date('F j, Y', strtotime($activity['activity_date'])); ?></p>
                        <p><?php echo htmlspecialchars($activity['description']); ?></p>
                        <?php if (!empty($activity['registration_link'])): ?>
                            <a href="<?php echo htmlspecialchars($activity['registration_link']); ?>" class="btn-primary">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="card-grid">
            <div class="card">
                <img src="images/aamusted.jpg" alt="USTED Update Placeholder">
                <div class="card-content">
                    <span class="card-tag">Update</span>
                    <h3 class="card-title">USTED Transition Update</h3>
                    <p>INFOTESS activities gallery and highlights are being refreshed with USTED-branded updates.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/infotess.png" alt="Workshop Placeholder">
                <div class="card-content">
                    <span class="card-tag">Workshop</span>
                    <h3 class="card-title">Tech Workshops</h3>
                    <p>Upcoming workshops, training sessions, and student engagement activities will appear here soon.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aamusted-logo.svg" alt="Community Placeholder">
                <div class="card-content">
                    <span class="card-tag">Community</span>
                    <h3 class="card-title">Community Activities</h3>
                    <p>Community of Practice, Assembly meetings, and special INFOTESS events will be published here.</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
