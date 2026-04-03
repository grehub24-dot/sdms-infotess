<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch Projects from Database
$stmt = $pdo->query("SELECT * FROM projects ORDER BY project_date DESC");
$projects = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>Projects & Innovations</h1>
    <p>Showcase of student projects and department innovations.</p>
</section>

<section class="page-shell">
    <div class="container">
        <?php if (empty($projects)): ?>
            <div class="card empty-state">
                <i class="fas fa-diagram-project"></i>
                <p>Project showcase is being updated. Check back soon!</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($projects as $project): ?>
                <div class="card">
                    <?php if ($project['image_url']): ?>
                    <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                    <?php endif; ?>
                    <div class="card-content">
                        <span class="card-tag" style="background: <?php 
                            echo $project['status'] === 'completed' ? '#28a745' : ($project['status'] === 'ongoing' ? '#ffc107' : '#17a2b8'); 
                        ?>; color: #fff;">
                            <?php echo ucfirst($project['status']); ?>
                        </span>
                        <h3 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo htmlspecialchars((string)$project['description']); ?></p>
                        <p class="date-text"><i class="fas fa-calendar"></i> <?php echo date('M d, Y', strtotime($project['project_date'])); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
