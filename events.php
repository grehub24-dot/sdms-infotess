<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM events ORDER BY event_date DESC");
$events = $stmt->fetchAll();
?>

<section class="page-hero">
    <h1>Upcoming Events</h1>
    <p>Join us for our upcoming academic and social gatherings</p>
</section>

<section class="page-shell">
    <div class="container">
        <h2 class="section-title">Calendar of Events</h2>
        
        <?php if (empty($events)): ?>
            <div class="card empty-state">
                <i class="fas fa-calendar-xmark"></i>
                <p>No events are available yet.</p>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <?php foreach ($events as $event): ?>
                    <div class="card">
                        <div class="card-content">
                            <div class="event-top">
                                <div class="event-date">
                                    <div class="event-day"><?php echo date('d', strtotime((string)$event['event_date'])); ?></div>
                                    <div class="event-month"><?php echo date('M', strtotime((string)$event['event_date'])); ?></div>
                                </div>
                                <div>
                                    <h3 class="card-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <span class="date-text"><i class="fas fa-clock"></i> <?php echo date('l, Y', strtotime((string)$event['event_date'])); ?></span>
                                </div>
                            </div>

                            <p><strong><i class="fas fa-map-marker-alt"></i> Location:</strong> <?php echo htmlspecialchars($event['location'] ?? 'TBA'); ?></p>
                            <p class="muted"><?php echo htmlspecialchars((string)($event['description'] ?? '')); ?></p>
                            <?php if (!empty($event['source_url'])): ?>
                                <a href="<?php echo htmlspecialchars($event['source_url']); ?>" target="_blank" class="card-link">View Event Details &rarr;</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <div class="center-wrap">
            <a href="https://aamusted.edu.gh/" target="_blank" class="btn-primary">View Official AAMUSTED Site</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
