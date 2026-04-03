<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch department info from scraped data
$stmt = $pdo->prepare("SELECT content FROM department_info WHERE key_name = ?");
$stmt->execute(['dite_overview']);
$overview = $stmt->fetchColumn();

// Staff Images Array (Based on provided files)
$staff_members = [
    ['name' => 'Prof. Yarhands Dissou Arthur', 'image' => 'images/PROF-YARHANDS.png', 'role' => 'Dean, FASME'],
    ['name' => 'Dr. George Asante', 'image' => 'images/George-Asante.png', 'role' => 'H.O.D, Department of IT Education'],
    ['name' => 'Prof. Francis Ohene Boateng', 'image' => 'images/PROF-FO-BOATENG.png', 'role' => 'Associate Professor'],
    ['name' => 'Prof. Ebenezer Bonyah', 'image' => 'images/PROF_BONYAH-.png', 'role' => 'Professor'],
    ['name' => 'Dr. Adasa Nkrumah Kofi Frimpong', 'image' => 'images/Dr.-Adasa-Nkrumah-K.-F.jpg', 'role' => 'Ag. Head, Academic & Admin Computing'],
    ['name' => 'Rev. Dr. Benjamin Adu Obeng', 'image' => 'images/Rev.-Dr.-Adu-Obeng.png', 'role' => 'Lecturer'],
    ['name' => 'Dr. Joseph Frank Gordon', 'image' => 'images/Dr.-Joseph-Gordon.png', 'role' => 'Lecturer'],
    ['name' => 'Dr. Emmanuel Akweittey', 'image' => 'images/AKWEITTEY-.jpg', 'role' => 'Senior Lecturer'],
    ['name' => 'Dr. Ernest Larbi', 'image' => 'images/Mr.-Ernest-Larbi.png', 'role' => 'Lecturer'],
    ['name' => 'Mr. Franco Osei-Wusu', 'image' => 'images/franco.png', 'role' => 'Assistant Lecturer'],
    ['name' => 'Mr. Kennedy Gyimah', 'image' => 'images/Kennedy-Gyimah.png', 'role' => 'Lecturer']
];
?>

<section class="page-hero">
    <h1>Department Overview</h1>
    <p>Learn about the Department of Information Technology Education, its mission, and its faculty leadership.</p>
</section>

<section class="page-shell">
    <div class="container">
    <div class="content-card" style="margin-bottom: 34px;">
        <?php if ($overview): ?>
            <div class="department-content">
                <?php echo $overview; ?>
            </div>
        <?php else: ?>
            <p>The Department of Information Technology Education (DITE) is a leading department in the Faculty of Applied Sciences and Mathematics Education (FASME) at USTED.</p>
            <p>We are dedicated to training competent teachers and professionals in Information Technology who can contribute meaningfully to national development.</p>
            <h3 class="title-left">Our Mission</h3>
            <p>To provide high-quality education in Information Technology, fostering innovation, research, and community service.</p>
            <h3 class="title-left">Programs Offered</h3>
            <ul class="list-styled">
                <li>B.Sc. Information Technology Education</li>
                <li>Diploma in Information Technology</li>
                <li>M.Phil. Information Technology etc</li>
            </ul>
        <?php endif; ?>
    </div>

    <h2 class="section-title">Meet Our Faculty & Staff</h2>
    <div class="card-grid">
        <?php foreach ($staff_members as $staff): ?>
            <a href="staff_profile.php?name=<?php echo urlencode($staff['name']); ?>" class="card" style="text-align: center; display: block;">
                <img src="<?php echo $staff['image']; ?>" alt="<?php echo htmlspecialchars($staff['name']); ?>" style="height: 250px;">
                <div class="card-content">
                    <h3 class="card-title"><?php echo htmlspecialchars($staff['name']); ?></h3>
                    <p class="role-text"><?php echo htmlspecialchars($staff['role']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
</section>

<?php require_once 'includes/footer.php'; ?>
