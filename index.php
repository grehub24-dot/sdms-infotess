<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch recent news/events for the homepage
$stmt = $pdo->query("SELECT * FROM activities ORDER BY activity_date DESC LIMIT 3");
$activities = $stmt->fetchAll();
?>

<section class="hero">
    <div class="hero-content">
        <span class="hero-kicker">INFOTESS USTED</span>
        <h1>Build, Lead, and Innovate With the Future of Tech</h1>
        <p>Information Technology Students’ Society of USTED. Empowering students through technology, innovation, and leadership with practical skills and strong community.</p>
        <div class="hero-actions">
            <a href="about.php" class="btn-cta">Explore INFOTESS</a>
            <a href="register.php" class="btn-ghost">Join INFOTESS</a>
        </div>
        <div class="hero-metrics">
            <div class="metric">
                <strong>300+</strong>
                <span>Student Members</span>
            </div>
            <div class="metric">
                <strong>20+</strong>
                <span>Events & Workshops</span>
            </div>
            <div class="metric">
                <strong>100%</strong>
                <span>Tech-Driven Community</span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Who We Are</h2>
        <div class="intro-panel">
            <p>INFOTESS is the official student body for the Department of Information Technology Education (DITE) at USTED. We bridge academic learning with real-world practice through workshops, seminars, networking, and collaborative projects.</p>
        </div>
        <div class="feature-grid">
            <article class="feature-card">
                <i class="fas fa-laptop-code"></i>
                <h3>Hands-on Learning</h3>
                <p>Practical labs, peer sessions, and guided projects that transform classroom theory into portfolio-ready skills.</p>
            </article>
            <article class="feature-card">
                <i class="fas fa-people-group"></i>
                <h3>Strong Community</h3>
                <p>A vibrant network of students, alumni, and mentors supporting career growth and collaboration.</p>
            </article>
            <article class="feature-card">
                <i class="fas fa-lightbulb"></i>
                <h3>Innovation Culture</h3>
                <p>Hackathons, leadership opportunities, and events designed to cultivate creativity and impactful ideas.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <h2 class="section-title">Latest Activities</h2>
        <div class="card-grid">
            <?php if (count($activities) > 0): ?>
                <?php foreach ($activities as $activity): ?>
                <div class="card">
                    <img src="<?php echo !empty($activity['image_url']) ? $activity['image_url'] : 'images/default-activity.jpg'; ?>" alt="Activity">
                    <div class="card-content">
                        <span class="card-tag">Activity</span>
                        <h3 class="card-title"><?php echo htmlspecialchars($activity['title']); ?></h3>
                        <p><?php echo substr(htmlspecialchars($activity['description']), 0, 100) . '...'; ?></p>
                        <a href="activities.php" class="card-link">Read More &rarr;</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card">
                    <img src="images/aamusted.jpg" alt="Freshers Week Celebration">
                    <div class="card-content">
                        <span class="card-tag">Activity</span>
                        <h3 class="card-title">Freshers Week Celebration</h3>
                        <p>Welcome program for new students with orientation, networking, and onboarding activities.</p>
                        <a href="activities.php" class="card-link">Read More &rarr;</a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/infotess.png" alt="Community of Practice">
                    <div class="card-content">
                        <span class="card-tag">Activity</span>
                        <h3 class="card-title">Community of Practice</h3>
                        <p>Peer-led knowledge sharing sessions focused on practical skills and collaborative learning.</p>
                        <a href="activities.php" class="card-link">Read More &rarr;</a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/aamusted-logo.svg" alt="Infotess Cloud 9 Connection">
                    <div class="card-content">
                        <span class="card-tag">Activity</span>
                        <h3 class="card-title">Infotess Cloud 9 Connection: Chocolate + Photoshoot (Valentine)</h3>
                        <p>Valentine special social-tech event featuring community bonding, treats, and themed photoshoot moments.</p>
                        <a href="activities.php" class="card-link">Read More &rarr;</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-panel">
            <h2>Ready to join the movement?</h2>
            <p>Become an active member of INFOTESS today and take your tech journey to the next level.</p>
            <div class="hero-actions">
                <a href="contact.php" class="btn-cta">Contact Us</a>
                <a href="membership.php" class="btn-ghost">Membership Info</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div id="framer-motion-root">
            <div class="motion-showcase">
                <div class="motion-head">
                    <span class="motion-kicker">React + Framer Motion</span>
                    <h2>Live Animated UI Block</h2>
                    <p>Loading interactive animation preview...</p>
                </div>
                <div class="motion-grid">
                    <article class="motion-card">
                        <h3>Smooth Entrance</h3>
                        <p>Hero-grade reveal animations with elegant easing and depth.</p>
                    </article>
                    <article class="motion-card">
                        <h3>Interactive Hover</h3>
                        <p>Micro-interactions that feel premium and responsive to user intent.</p>
                    </article>
                    <article class="motion-card">
                        <h3>Staggered Content</h3>
                        <p>Sequential rhythm for clearer visual hierarchy and attention flow.</p>
                    </article>
                </div>
                <div class="motion-pulse-wrap">
                    <span class="motion-pulse"></span>
                    <strong>Preparing animation engine...</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="module">
const mount = document.getElementById("framer-motion-root");

async function importFromList(urls) {
    let lastError = null;
    for (const url of urls) {
        try {
            return await import(url);
        } catch (error) {
            lastError = error;
        }
    }
    throw lastError || new Error("Unable to import module");
}

async function initFramerMotionDemo() {
    if (!mount) {
        return;
    }

    try {
        const [reactMod, reactDomMod, framerMod] = await Promise.all([
            importFromList([
                "https://esm.sh/react@18.3.1",
                "https://cdn.jsdelivr.net/npm/react@18.3.1/+esm",
                "https://cdn.skypack.dev/react@18.3.1"
            ]),
            importFromList([
                "https://esm.sh/react-dom@18.3.1/client",
                "https://cdn.jsdelivr.net/npm/react-dom@18.3.1/client/+esm",
                "https://cdn.skypack.dev/react-dom@18.3.1/client"
            ]),
            importFromList([
                "https://esm.sh/framer-motion@12.38.0?external=react,react-dom",
                "https://cdn.jsdelivr.net/npm/framer-motion@12.38.0/+esm",
                "https://cdn.skypack.dev/framer-motion@12.38.0"
            ])
        ]);
        const React = reactMod.default || reactMod;
        const createRoot = reactDomMod.createRoot;
        const motion = framerMod.motion;
        if (!React || !createRoot || !motion) {
            throw new Error("Invalid Framer Motion module shape");
        }

        function FramerMotionShowcase() {
            const cards = [
                { 
                    title: "3D Perspective", 
                    text: "Experience immersive depth with responsive 3D transforms that react to user interaction.",
                    icon: React.createElement("svg", { width: "32", height: "32", viewBox: "0 0 24 24", fill: "none", stroke: "currentColor", strokeWidth: "2", strokeLinecap: "round", strokeLinejoin: "round", style: { marginBottom: '16px', color: '#A16207' } }, 
                        React.createElement("path", { d: "M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" }),
                        React.createElement("polyline", { points: "3.27 6.96 12 12.01 20.73 6.96" }),
                        React.createElement("line", { x1: "12", y1: "22.08", x2: "12", y2: "12" })
                    )
                },
                { 
                    title: "Liquid Physics", 
                    text: "Smooth glassmorphism interfaces that mimic fluid dynamics and elegant transitions.",
                    icon: React.createElement("svg", { width: "32", height: "32", viewBox: "0 0 24 24", fill: "none", stroke: "currentColor", strokeWidth: "2", strokeLinecap: "round", strokeLinejoin: "round", style: { marginBottom: '16px', color: '#A16207' } }, 
                        React.createElement("path", { d: "M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" })
                    )
                },
                { 
                    title: "Staggered Flow", 
                    text: "Sequential animations that guide the user's eye and create a premium visual hierarchy.",
                    icon: React.createElement("svg", { width: "32", height: "32", viewBox: "0 0 24 24", fill: "none", stroke: "currentColor", strokeWidth: "2", strokeLinecap: "round", strokeLinejoin: "round", style: { marginBottom: '16px', color: '#A16207' } }, 
                        React.createElement("polyline", { points: "22 12 18 12 15 21 9 3 6 12 2 12" })
                    )
                }
            ];

            return React.createElement(
                motion.div,
                {
                    className: "motion-showcase",
                    initial: { opacity: 0, y: 40 },
                    whileInView: { opacity: 1, y: 0 },
                    viewport: { once: true, amount: 0.2 },
                    transition: { duration: 0.8, ease: [0.16, 1, 0.3, 1] }
                },
                React.createElement(
                    "div",
                    { className: "motion-head" },
                    React.createElement(motion.span, { 
                        className: "motion-kicker",
                        initial: { opacity: 0, scale: 0.8 },
                        whileInView: { opacity: 1, scale: 1 },
                        transition: { delay: 0.2, duration: 0.5 }
                    }, "Enterprise Premium Engine"),
                    React.createElement(motion.h2, {
                        initial: { opacity: 0, y: 20 },
                        whileInView: { opacity: 1, y: 0 },
                        transition: { delay: 0.3, duration: 0.6 }
                    }, "Stunning 3D Elements"),
                    React.createElement(motion.p, {
                        initial: { opacity: 0, y: 20 },
                        whileInView: { opacity: 1, y: 0 },
                        transition: { delay: 0.4, duration: 0.6 }
                    }, "Powered by React and Framer Motion, delivering unparalleled interactive experiences.")
                ),
                React.createElement(
                    "div",
                    { 
                        className: "motion-grid",
                        style: { perspective: 1200 }
                    },
                    cards.map((card, i) =>
                        React.createElement(
                            motion.article,
                            {
                                key: card.title,
                                className: "motion-card",
                                initial: { opacity: 0, rotateX: 15, y: 40, z: -100 },
                                whileInView: { opacity: 1, rotateX: 0, y: 0, z: 0 },
                                viewport: { once: true, amount: 0.4 },
                                transition: { delay: 0.3 + (i * 0.15), duration: 0.8, ease: [0.16, 1, 0.3, 1] },
                                whileHover: { 
                                    y: -15, 
                                    scale: 1.05, 
                                    rotateX: 5, 
                                    rotateY: -5,
                                    z: 50,
                                    boxShadow: "0 25px 50px -12px rgba(0, 0, 0, 0.5)",
                                    borderColor: "rgba(255, 255, 255, 0.3)",
                                    transition: { duration: 0.4, ease: "easeOut" } 
                                },
                                style: { transformStyle: "preserve-3d" }
                            },
                            React.createElement(motion.div, {
                                animate: { y: [0, -5, 0] },
                                transition: { duration: 4, repeat: Infinity, ease: "easeInOut", delay: i * 0.5 }
                            }, card.icon),
                            React.createElement("h3", { style: { transform: "translateZ(20px)" } }, card.title),
                            React.createElement("p", { style: { transform: "translateZ(10px)" } }, card.text)
                        )
                    )
                ),
                React.createElement(
                    motion.div,
                    {
                        className: "motion-pulse-wrap",
                        initial: { opacity: 0, scale: 0.9 },
                        whileInView: { opacity: 1, scale: 1 },
                        viewport: { once: true, amount: 0.4 },
                        transition: { delay: 0.45, duration: 0.45 }
                    },
                    React.createElement(motion.span, {
                        className: "motion-pulse",
                        animate: { scale: [1, 1.2, 1], opacity: [0.85, 0.3, 0.85] },
                        transition: { duration: 2.2, repeat: Infinity, ease: "easeInOut" }
                    }),
                    React.createElement("strong", null, "Framer Motion is active")
                )
            );
        }

        createRoot(mount).render(React.createElement(FramerMotionShowcase));
    } catch (error) {
        const fallback = mount.querySelector(".motion-showcase");
        if (fallback) {
            fallback.classList.add("motion-local-fallback");
            const message = fallback.querySelector(".motion-head p");
            if (message) {
                message.textContent = "Framer Motion CDN access is blocked here, so local fallback animation is shown.";
            }
            const status = fallback.querySelector(".motion-pulse-wrap strong");
            if (status) {
                status.textContent = "Fallback animation active";
            }
        }
    }
}

initFramerMotionDemo();
</script>

<?php require_once 'includes/footer.php'; ?>
