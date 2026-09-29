<?php
require_once '../config.php';
include '../includes/header.php';

// Fetch services from database
$services_sql = "SELECT * FROM services ORDER BY id";
$services_result = mysqli_query($conn, $services_sql);
?>

<!-- Page Header -->
<section class="hero" style="min-height: 40vh; padding: 100px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 style="font-size: 3.5rem;">Our <span class="highlight">Services</span></h1>
                <p class="subtitle" style="font-size: 1.3rem;">Comprehensive tech solutions for your business</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5" style="background: var(--white);">
    <div class="container">
        <div class="section-title">
            <h2>What We Offer</h2>
            <p>We provide end-to-end technology solutions to accelerate your digital transformation</p>
        </div>
        
        <div class="row g-4">
            <?php if(mysqli_num_rows($services_result) > 0): ?>
                <?php while($service = mysqli_fetch_assoc($services_result)): ?>
                    <div class="col-lg-4 col-md-6" id="<?php echo strtolower(str_replace(' ', '-', $service['service_name'])); ?>">
                        <div class="service-card" style="text-align: left; padding: 35px 30px;">
                            <div class="icon" style="margin: 0 0 20px 0;">
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
                $services_data = [
                    ['fa-mobile-alt', 'Mobile Development', 'We build high-performance Android and iOS apps tailored to your business needs.', 'Native Apps, Cross-Platform, UI/UX Design, App Store Deployment'],
                    ['fa-desktop', 'Desktop Development', 'Custom desktop applications for Windows, Mac, and Linux platforms.', 'Windows Apps, Mac Apps, Linux Apps, Enterprise Software'],
                    ['fa-server', 'System Development', 'Complete management systems for schools, inventory, and businesses.', 'School Management, Inventory Systems, HR Systems, CRM'],
                    ['fa-plug', 'API Integration', 'Seamless integration with third-party APIs and services.', 'REST APIs, SOAP APIs, Payment Gateways, Third-party Services'],
                    ['fa-globe', 'Website Development', 'Custom websites from simple landing pages to complex web applications.', 'Corporate Websites, E-commerce, Web Apps, CMS Development'],
                    ['fa-sync-alt', 'Redesign & Consulting', 'Revamp your existing digital presence with modern design and technology.', 'UI/UX Redesign, Performance Optimization, Technology Upgrade']
                ];
                foreach($services_data as $service): 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card" style="text-align: left; padding: 35px 30px;">
                            <div class="icon" style="margin: 0 0 20px 0;">
                                <i class="fas <?php echo $service[0]; ?>"></i>
                            </div>
                            <h5><?php echo $service[1]; ?></h5>
                            <p><?php echo $service[2]; ?></p>
                            <ul class="features">
                                <?php 
                                $features = explode(',', $service[3]);
                                foreach($features as $feature): 
                                ?>
                                    <li><i class="fas fa-check-circle"></i> <?php echo trim($feature); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5" style="background: var(--light-grey);">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose DAFU TECH</h2>
            <p>What sets us apart from the competition</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div style="background: var(--white); padding: 30px; border-radius: 15px; text-align: center; height: 100%; box-shadow: 0 5px 30px rgba(15,51,93,0.06);">
                    <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 15px;">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h5 style="color: var(--primary-color); font-weight: 700;">Fast Delivery</h5>
                    <p style="color: var(--dark-grey);">We work efficiently to deliver your project on time without compromising quality.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: var(--white); padding: 30px; border-radius: 15px; text-align: center; height: 100%; box-shadow: 0 5px 30px rgba(15,51,93,0.06);">
                    <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 15px;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 style="color: var(--primary-color); font-weight: 700;">Quality Assurance</h5>
                    <p style="color: var(--dark-grey);">We follow industry best practices and rigorous testing to ensure top-notch quality.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: var(--white); padding: 30px; border-radius: 15px; text-align: center; height: 100%; box-shadow: 0 5px 30px rgba(15,51,93,0.06);">
                    <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 15px;">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5 style="color: var(--primary-color); font-weight: 700;">24/7 Support</h5>
                    <p style="color: var(--dark-grey);">We provide ongoing support and maintenance to ensure your systems run smoothly.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" style="padding: 60px 0;">
    <div class="container">
        <h2 style="font-size: 2rem;">Need a Custom Solution?</h2>
        <p>Let's discuss your specific requirements and build something amazing</p>
        <a href="<?php echo BASE_URL; ?>pages/contact.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Contact Us
        </a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>