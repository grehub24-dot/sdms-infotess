<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Staff Data (Same as in department.php)
$staff_members = [
    'Prof. Yarhands Dissou Arthur' => [
        'role' => 'Dean, FASME', 
        'image' => 'images/PROF-YARHANDS.png',
        'bio' => 'Prof. Yarhands Dissou Arthur is the Dean of the Faculty of Applied Sciences and Mathematics Education. He is a distinguished scholar with extensive experience in educational leadership and research.',
        'email' => 'ydarthur@usted.edu.gh',
        'research' => ['Educational Leadership', 'Applied Sciences', 'Curriculum Development']
    ],
    'Dr. George Asante' => [
        'role' => 'H.O.D, Department of IT Education', 
        'image' => 'images/George-Asante.png',
        'bio' => 'Dr. George Asante serves as the Head of the Department of Information Technology Education. He is committed to advancing IT education and fostering a culture of innovation among students.',
        'email' => 'gasante@usted.edu.gh',
        'research' => ['Information Technology Education', 'E-Learning', 'Educational Technology']
    ],
    'Prof. Francis Ohene Boateng' => [
        'role' => 'Associate Professor', 
        'image' => 'images/PROF-FO-BOATENG.png',
        'bio' => 'Prof. Francis Ohene Boateng is an Associate Professor with a focus on computing and technology integration in education.',
        'email' => 'foboateng@usted.edu.gh',
        'research' => ['Computing', 'Artificial Intelligence', 'Data Science']
    ],
    'Prof. Ebenezer Bonyah' => [
        'role' => 'Professor', 
        'image' => 'images/PROF_BONYAH-.png',
        'bio' => 'Prof. Ebenezer Bonyah is a Professor known for his contributions to mathematics and its applications in technology.',
        'email' => 'ebonyah@usted.edu.gh',
        'research' => ['Mathematical Modeling', 'Applied Mathematics', 'Statistics']
    ],
    'Dr. Adasa Nkrumah Kofi Frimpong' => [
        'role' => 'Ag. Head, Academic & Admin Computing', 
        'image' => 'images/Dr.-Adasa-Nkrumah-K.-F.jpg',
        'bio' => 'Dr. Adasa Nkrumah Kofi Frimpong heads the Academic and Administrative Computing unit, ensuring robust digital infrastructure for the university.',
        'email' => 'ankfrimpong@usted.edu.gh',
        'research' => ['Cloud Computing', 'Network Security', 'IT Infrastructure']
    ],
    'Rev. Dr. Benjamin Adu Obeng' => [
        'role' => 'Lecturer', 
        'image' => 'images/Rev.-Dr.-Adu-Obeng.png',
        'bio' => 'Rev. Dr. Benjamin Adu Obeng combines his pastoral and academic roles to mentor students in both character and learning.',
        'email' => 'baobeng@usted.edu.gh',
        'research' => ['Ethics in IT', 'Software Engineering', 'Database Management']
    ],
    'Dr. Joseph Frank Gordon' => [
        'role' => 'Lecturer', 
        'image' => 'images/Dr.-Joseph-Gordon.png',
        'bio' => 'Dr. Joseph Frank Gordon is a dedicated lecturer with a passion for teaching and research in computer science.',
        'email' => 'jfgordon@usted.edu.gh',
        'research' => ['Computer Science Education', 'Programming', 'Algorithms']
    ],
    'Dr. Emmanuel Akweittey' => [
        'role' => 'Senior Lecturer', 
        'image' => 'images/AKWEITTEY-.jpg',
        'bio' => 'Dr. Emmanuel Akweittey is a Senior Lecturer with expertise in advanced computing concepts and methodologies.',
        'email' => 'eakweittey@usted.edu.gh',
        'research' => ['Advanced Computing', 'Machine Learning', 'Cybersecurity']
    ],
    'Dr. Ernest Larbi' => [
        'role' => 'Lecturer', 
        'image' => 'images/Mr.-Ernest-Larbi.png',
        'bio' => 'Dr. Ernest Larbi is a lecturer focused on practical IT skills and student development.',
        'email' => 'elarbi@usted.edu.gh',
        'research' => ['Web Technologies', 'Mobile Application Development', 'HCI']
    ],
    'Mr. Franco Osei-Wusu' => [
        'role' => 'Assistant Lecturer', 
        'image' => 'images/franco.png',
        'bio' => 'Mr. Franco Osei-Wusu is an Assistant Lecturer supporting the department in various academic and technical capacities.',
        'email' => 'foseiwusu@usted.edu.gh',
        'research' => ['Network Administration', 'System Analysis', 'Tech Support']
    ],
    'Mr. Kennedy Gyimah' => [
        'role' => 'Lecturer', 
        'image' => 'images/Kennedy-Gyimah.png',
        'bio' => 'Mr. Kennedy Gyimah is a Lecturer with expertise in Applied Mathematics, Machine Learning, and Computer Vision. He is dedicated to integrating technology into mathematical education.',
        'email' => 'kennedygyimah@usted.edu.gh',
        'research' => ['Applied Mathematics', 'Machine Learning', 'Computer Vision']
    ]
];

$name = isset($_GET['name']) ? urldecode($_GET['name']) : '';
$staff = isset($staff_members[$name]) ? $staff_members[$name] : null;

if (!$staff) {
    echo '<section class="page-shell"><div class="container"><div class="card empty-state"><h2>Staff Member Not Found</h2><a href="department.php" class="btn-primary">Back to Department</a></div></div></section>';
    require_once 'includes/footer.php';
    exit;
}
?>

<section class="page-shell">
    <div class="container">
        <a href="department.php" class="back-link">&larr; Back to Department</a>
        
        <div class="card" style="overflow: hidden;">
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px; max-width: 400px;">
                    <img src="<?php echo $staff['image']; ?>" alt="<?php echo htmlspecialchars($name); ?>" style="width: 100%; height: 100%; object-fit: cover; min-height: 400px;">
                </div>
                <div style="flex: 2; padding: 40px; min-width: 300px;">
                    <h1 class="title-left"><?php echo htmlspecialchars($name); ?></h1>
                    <h3 class="role-text"><?php echo htmlspecialchars($staff['role']); ?></h3>
                    
                    <div class="soft-note">
                        <h4 class="section-heading-line">Biography</h4>
                        <p class="muted"><?php echo $staff['bio']; ?></p>
                    </div>

                    <div class="soft-note">
                        <h4 class="section-heading-line">Contact Information</h4>
                        <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $staff['email']; ?>"><?php echo $staff['email']; ?></a></p>
                        <p><i class="fas fa-map-marker-alt"></i> Department of IT Education, USTED</p>
                    </div>

                    <?php if (!empty($staff['research'])): ?>
                    <div>
                        <h4 class="section-heading-line">Research Interests</h4>
                        <div class="chip-row">
                            <?php foreach ($staff['research'] as $interest): ?>
                                <span class="chip"><?php echo htmlspecialchars($interest); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
