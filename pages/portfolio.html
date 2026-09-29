<?php
require_once '../config.php';
include '../includes/header.php';

// Fetch projects from database
$projects_sql = "SELECT * FROM projects ORDER BY id DESC";
$projects_result = mysqli_query($conn, $projects_sql);
?>

<!-- Page Header -->
<section class="hero" style="min-height: 40vh; padding: 100px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 style="font-size: 3.5rem;">Our <span class="highlight">Portfolio</span></h1>
                <p class="subtitle" style="font-size: 1.3rem;">Check out some of the amazing projects we've delivered</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-5" style="background: var(--white);">
    <div class="container">
        <div class="row g-4">
            <?php if(mysqli_num_rows($projects_result) > 0): ?>
                <?php while($project = mysqli_fetch_assoc($projects_result)): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            <div class="image-placeholder" style="height: 220px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; position: relative; overflow: hidden;">
                                <?php if($project['image'] && file_exists('../assets/images/' . $project['image'])): ?>
                                    <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $project['image']; ?>" alt="<?php echo $project['project_name']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php else: ?>
                                    <i class="fas fa-briefcase"></i>
                                <?php endif; ?>
                                <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(44,196,182,0.85); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                                    <button class="btn btn-light" style="border-radius: 30px; padding: 10px 30px; font-weight: 600; color: var(--primary-color); border: none;" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $project['id']; ?>">
                                        <i class="fas fa-eye"></i> View Details
                                    </button>
                                </div>
                            </div>
                            <div class="body" style="padding: 25px;">
                                <span class="badge" style="background: rgba(44,196,182,0.12); color: var(--secondary-color); font-weight: 600; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;"><?php echo $project['category']; ?></span>
                                <h5 style="color: var(--primary-color); font-weight: 700; margin: 10px 0;"><?php echo $project['project_name']; ?></h5>
                                <p style="color: var(--dark-grey); font-size: 0.9rem; line-height: 1.6;"><?php echo substr($project['description'], 0, 80); ?>...</p>
                                <?php if($project['technologies']): ?>
                                    <div class="tech-tags" style="display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px;">
                                        <?php 
                                        $techs = explode(',', $project['technologies']);
                                        foreach($techs as $tech): 
                                        ?>
                                            <span style="background: var(--light-grey); padding: 3px 10px; border-radius: 15px; font-size: 0.7rem; color: var(--dark-grey);"><?php echo trim($tech); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project Detail Modal -->
                    <div class="modal fade" id="projectModal<?php echo $project['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: var(--primary-color); color: white;">
                                    <h5 class="modal-title"><?php echo $project['project_name']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if($project['image'] && file_exists('../assets/images/' . $project['image'])): ?>
                                                <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $project['image']; ?>" alt="<?php echo $project['project_name']; ?>" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                                            <?php else: ?>
                                                <div style="width: 100%; height: 250px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                                                    <i class="fas fa-briefcase"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="color: var(--primary-color); font-weight: 700;">Project Details</h5>
                                            <p><strong>Category:</strong> <?php echo $project['category']; ?></p>
                                            <p><strong>Technologies:</strong> <?php echo $project['technologies']; ?></p>
                                            <?php if($project['project_url']): ?>
                                                <p><strong>URL:</strong> <a href="<?php echo $project['project_url']; ?>" target="_blank">Visit Project</a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 style="color: var(--primary-color); font-weight: 700;">Description</h5>
                                    <p style="font-size: 1rem; line-height: 1.8;"><?php echo $project['description']; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <?php if($project['project_url']): ?>
                                        <a href="<?php echo $project['project_url']; ?>" target="_blank" class="btn btn-primary" style="background-color: var(--secondary-color); border-color: var(--secondary-color);">
                                            <i class="fas fa-external-link-alt"></i> View Live Project
                                        </a>
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <?php
                $projects_data = [
                    ['Twsta Tours Website', 'Web Development', 'Complete tourism website with tour booking, admin panel, and payment integration.', 'PHP, MySQL, Bootstrap, JavaScript'],
                    ['Proforma Management System', 'System Development', 'Enterprise-grade proforma invoice management system with reporting and analytics.', 'PHP, MySQL, Laravel, jQuery'],
                    ['Home Appliance Repair App', 'Mobile Development', 'Mobile app for scheduling and managing home appliance repair services.', 'React Native, Node.js, MongoDB'],
                    ['School Management System', 'System Development', 'Comprehensive school management system with student, teacher, and admin modules.', 'PHP, MySQL, Bootstrap, JavaScript'],
                    ['E-commerce Website', 'Web Development', 'Full-featured e-commerce platform with payment gateway integration.', 'PHP, MySQL, Laravel, Stripe API'],
                    ['Inventory Management System', 'System Development', 'Real-time inventory tracking and management system for businesses.', 'PHP, MySQL, Ajax, Bootstrap']
                ];
                foreach($projects_data as $index => $project): 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            <div class="image-placeholder" style="height: 220px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; position: relative; overflow: hidden;">
                                <i class="fas fa-briefcase"></i>
                                <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(44,196,182,0.85); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                                    <button class="btn btn-light" style="border-radius: 30px; padding: 10px 30px; font-weight: 600; color: var(--primary-color); border: none;" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $index; ?>">
                                        <i class="fas fa-eye"></i> View Details
                                    </button>
                                </div>
                            </div>
                            <div class="body" style="padding: 25px;">
                                <span class="badge" style="background: rgba(44,196,182,0.12); color: var(--secondary-color); font-weight: 600; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;"><?php echo $project[1]; ?></span>
                                <h5 style="color: var(--primary-color); font-weight: 700; margin: 10px 0;"><?php echo $project[0]; ?></h5>
                                <p style="color: var(--dark-grey); font-size: 0.9rem; line-height: 1.6;"><?php echo substr($project[2], 0, 80); ?>...</p>
                                <div class="tech-tags" style="display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px;">
                                    <?php 
                                    $techs = explode(',', $project[3]);
                                    foreach($techs as $tech): 
                                    ?>
                                        <span style="background: var(--light-grey); padding: 3px 10px; border-radius: 15px; font-size: 0.7rem; color: var(--dark-grey);"><?php echo trim($tech); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project Detail Modal -->
                    <div class="modal fade" id="projectModal<?php echo $index; ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: var(--primary-color); color: white;">
                                    <h5 class="modal-title"><?php echo $project[0]; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div style="width: 100%; height: 250px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="color: var(--primary-color); font-weight: 700;">Project Details</h5>
                                            <p><strong>Category:</strong> <?php echo $project[1]; ?></p>
                                            <p><strong>Technologies:</strong> <?php echo $project[3]; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 style="color: var(--primary-color); font-weight: 700;">Description</h5>
                                    <p style="font-size: 1rem; line-height: 1.8;"><?php echo $project[2]; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" style="padding: 60px 0;">
    <div class="container">
        <h2 style="font-size: 2rem;">Have a Project in Mind?</h2>
        <p>Let's bring your idea to life. Contact us today!</p>
        <a href="<?php echo BASE_URL; ?>pages/contact.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Start Your Project
        </a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>