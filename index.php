<?php
require_once 'config.php';
include 'includes/header.php';

// Fetch services from database
$services_sql = "SELECT * FROM services LIMIT 6";
$services_result = mysqli_query($conn, $services_sql);

// Fetch projects from database
$projects_sql = "SELECT * FROM projects LIMIT 3";
$projects_result = mysqli_query($conn, $projects_sql);

// Fetch testimonials from database
$testimonials_sql = "SELECT * FROM testimonials LIMIT 3";
$testimonials_result = mysqli_query($conn, $testimonials_sql);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1>
                    Accelerate Your<br>
                    <span class="highlight">Digital World</span>
                </h1>
                <p class="subtitle">
                    We build innovative tech solutions – from mobile apps to enterprise systems, 
                    websites to API integrations. Let's bring your ideas to life.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo BASE_URL; ?>pages/services.php" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Explore Services
                    </a>
                    <a href="<?php echo BASE_URL; ?>pages/contact.php" class="btn btn-outline-light">
                        <i class="fas fa-comment"></i> Let's Talk
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number" id="projectsCount">50+</span>
                        <span class="stat-label">Projects Delivered</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="clientsCount">30+</span>
                        <span class="stat-label">Happy Clients</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="experienceCount">5+</span>
                        <span class="stat-label">Years Experience</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <div style="font-size: 8rem; opacity: 0.15; color: white; position: relative; z-index: 1;">
                    <i class="fas fa-code"></i>
                </div>
                <div style="font-size: 4rem; opacity: 0.08; color: white; position: relative; z-index: 1; margin-top: -40px;">
                    <i class="fas fa-robot"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
            <p>We deliver cutting-edge technology solutions tailored to your business needs</p>
        </div>
        <div class="row g-4">
            <?php if(mysqli_num_rows($services_result) > 0): ?>
                <?php while($service = mysqli_fetch_assoc($services_result)): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <div class="icon">
                                <i class="fas <?php echo $service['icon']; ?>"></i>
                            </div>
                            <h5><?php echo $service['service_name']; ?></h5>
                            <p><?php echo $service['description']; ?></p>
                            <?php if($service['features']): ?>
                                <ul class="features">
                                    <?php 
                                    $features = explode(',', $service['features']);
                                    foreach($features as $feature): 
                                    ?>
                                        <li><i class="fas fa-check-circle"></i> <?php echo trim($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <?php
                // Sample services if no data
                $sample_services = [
                    ['fa-mobile-alt', 'Mobile Development', 'High-performance Android and iOS apps tailored to your business.'],
                    ['fa-desktop', 'Desktop Development', 'Custom desktop applications for Windows, Mac, and Linux platforms.'],
                    ['fa-server', 'System Development', 'Complete management systems for schools, inventory, and businesses.'],
                    ['fa-plug', 'API Integration', 'Seamless integration with third-party APIs and services.'],
                    ['fa-globe', 'Website Development', 'Custom websites from landing pages to complex web applications.'],
                    ['fa-sync-alt', 'Redesign & Consulting', 'Revamp your digital presence with modern design and technology.']
                ];
                foreach($sample_services as $service): 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <div class="icon">
                                <i class="fas <?php echo $service[0]; ?>"></i>
                            </div>
                            <h5><?php echo $service[1]; ?></h5>
                            <p><?php echo $service[2]; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section" id="portfolio">
    <div class="container">
        <div class="section-title">
            <h2>Our Portfolio</h2>
            <p>Check out some of the amazing projects we've delivered</p>
        </div>
        <div class="row g-4">
            <?php if(mysqli_num_rows($projects_result) > 0): ?>
                <?php while($project = mysqli_fetch_assoc($projects_result)): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            <div class="image-placeholder">
                                <?php if($project['image']): ?>
                                    <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $project['image']; ?>" alt="<?php echo $project['project_name']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php else: ?>
                                    <i class="fas fa-briefcase"></i>
                                <?php endif; ?>
                                <div class="overlay">
                                    <a href="<?php echo BASE_URL; ?>pages/portfolio.php">View Project</a>
                                </div>
                            </div>
                            <div class="body">
                                <span class="badge"><?php echo $project['category']; ?></span>
                                <h5><?php echo $project['project_name']; ?></h5>
                                <p><?php echo substr($project['description'], 0, 80); ?>...</p>
                                <?php if($project['technologies']): ?>
                                    <div class="tech-tags">
                                        <?php 
                                        $techs = explode(',', $project['technologies']);
                                        foreach($techs as $tech): 
                                        ?>
                                            <span><?php echo trim($tech); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <?php
                $sample_projects = [
                    ['Twsta Tours Website', 'Web Development', 'Complete tourism website with tour booking and admin panel.', 'PHP, MySQL, Bootstrap'],
                    ['Proforma Management System', 'System Development', 'Enterprise-grade proforma invoice management system.', 'PHP, MySQL, Laravel'],
                    ['Home Appliance Repair App', 'Mobile Development', 'Mobile app for scheduling repair services.', 'React Native, Node.js']
                ];
                foreach($sample_projects as $project): 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            <div class="image-placeholder">
                                <i class="fas fa-briefcase"></i>
                                <div class="overlay">
                                    <a href="<?php echo BASE_URL; ?>pages/portfolio.php">View Project</a>
                                </div>
                            </div>
                            <div class="body">
                                <span class="badge"><?php echo $project[1]; ?></span>
                                <h5><?php echo $project[0]; ?></h5>
                                <p><?php echo $project[2]; ?></p>
                                <div class="tech-tags">
                                    <?php 
                                    $techs = explode(',', $project[3]);
                                    foreach($techs as $tech): 
                                    ?>
                                        <span><?php echo trim($tech); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo BASE_URL; ?>pages/portfolio.php" class="btn btn-outline-primary" style="border-color: var(--primary-color); color: var(--primary-color);">
                View All Projects <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-title">
            <h2>What Our Clients Say</h2>
            <p>Hear from the clients who trusted us with their projects</p>
        </div>
        <div class="row g-4">
            <?php if(mysqli_num_rows($testimonials_result) > 0): ?>
                <?php while($testimonial = mysqli_fetch_assoc($testimonials_result)): ?>
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <div class="stars">
                                <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="testimonial-text">"<?php echo $testimonial['testimonial']; ?>"</p>
                            <p class="client-name"><?php echo $testimonial['client_name']; ?></p>
                            <p class="client-company"><?php echo $testimonial['company']; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <?php
                $sample_testimonials = [
                    ['Abebe Kebede', 'Twsta Tours', 'DAFU Tech delivered an amazing tourism website with a custom booking system. Highly professional!', 5],
                    ['Tigist Worku', 'Tech Solutions PLC', 'The proforma management system they built transformed our business operations. Excellent work!', 5],
                    ['Solomon Hailu', 'HomeFix Services', 'The mobile app for our repair services has increased our customer engagement significantly.', 5]
                ];
                foreach($sample_testimonials as $testimonial): 
                ?>
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <div class="stars">
                                <?php for($i = 0; $i < $testimonial[3]; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="testimonial-text">"<?php echo $testimonial[2]; ?>"</p>
                            <p class="client-name"><?php echo $testimonial[0]; ?></p>
                            <p class="client-company"><?php echo $testimonial[1]; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Accelerate Your Digital World?</h2>
        <p>Let's discuss your project and find the best tech solution for your business.</p>
        <a href="<?php echo BASE_URL; ?>pages/contact.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Get in Touch
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>