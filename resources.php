<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM student_resources ORDER BY created_at DESC");
$resources = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>Student Resources</h1>
    <p>Access verified AAMUSTED portals, academic tools, and downloadable materials.</p>
</section>

<section class="page-shell">
    <div class="container">
        <?php if (empty($resources)): ?>
            <div class="card empty-state">
                <i class="fas fa-folder-open"></i>
                <p>No resource is available yet.</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($resources as $res): ?>
                    <div class="card">
                        <div class="card-content resource-row">
                            <div class="resource-icon">
                                <i class="fas <?php echo strpos(strtolower((string)$res['resource_type']), 'pdf') !== false ? 'fa-file-pdf' : (strpos(strtolower((string)$res['resource_type']), 'doc') !== false ? 'fa-file-word' : (strpos(strtolower((string)$res['resource_type']), 'lms') !== false ? 'fa-graduation-cap' : 'fa-link')); ?>"></i>
                            </div>
                            <div>
                                <h3 class="card-title"><?php echo htmlspecialchars($res['title']); ?></h3>
                                <p class="muted"><?php echo htmlspecialchars($res['description']); ?></p>
                                <?php if (preg_match('/^https?:\/\//i', (string)$res['file_url'])): ?>
                                    <a href="<?php echo htmlspecialchars($res['file_url']); ?>" class="btn-primary" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-arrow-up-right-from-square"></i> Open <?php echo htmlspecialchars($res['resource_type']); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo htmlspecialchars($res['file_url']); ?>" class="btn-primary" download>
                                        <i class="fas fa-download"></i> Download <?php echo htmlspecialchars($res['resource_type']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
