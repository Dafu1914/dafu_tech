<?php
require_once '../config.php';
include '../includes/header.php';

$success_message = '';
$error_message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $service_interest = mysqli_real_escape_string($conn, $_POST['service_interest']);
    
    if(empty($full_name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'Please fill in all required fields.';
    } else {
        $sql = "INSERT INTO contact_messages (full_name, email, phone, subject, message, service_interest, status) 
                VALUES ('$full_name', '$email', '$phone', '$subject', '$message', '$service_interest', 'unread')";
        
        if(mysqli_query($conn, $sql)) {
            $success_message = '✅ Your message has been sent successfully! We will get back to you soon.';
        } else {
            $error_message = '❌ Error sending message. Please try again.';
        }
    }
}
?>

<!-- Page Header -->
<section class="hero" style="min-height: 40vh; padding: 100px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 style="font-size: 3.5rem;">Get In <span class="highlight">Touch</span></h1>
                <p class="subtitle" style="font-size: 1.3rem;">Let's discuss your project and find the best solution</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5" style="background: var(--white);">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <h2 style="color: var(--primary-color); font-weight: 700; margin-bottom: 20px;">Send Us a Message</h2>
                
                <?php if($success_message): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?php echo $success_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($error_message): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?php echo $error_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="service_interest" class="form-label">Service Interested In</label>
                            <select class="form-select" id="service_interest" name="service_interest" style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                                <option value="">Select a service</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="Desktop Development">Desktop Development</option>
                                <option value="System Development">System Development</option>
                                <option value="API Integration">API Integration</option>
                                <option value="Website Development">Website Development</option>
                                <option value="Redesign & Consulting">Redesign & Consulting</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" required style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" name="message" rows="5" required style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: var(--secondary-color); border-color: var(--secondary-color); padding: 14px 40px; border-radius: 50px; font-weight: 600; width: 100%;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="col-lg-5">
                <div style="background: var(--light-grey); padding: 40px; border-radius: 15px; height: 100%;">
                    <h2 style="color: var(--primary-color); font-weight: 700; margin-bottom: 25px;">Contact Information</h2>
                    
                    <div style="display: flex; gap: 15px; margin-bottom: 25px; align-items: flex-start;">
                        <div style="width: 50px; height: 50px; background: rgba(44,196,182,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="color: var(--secondary-color); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h6 style="color: var(--primary-color); font-weight: 700; margin: 0;">Address</h6>
                            <p style="color: var(--dark-grey); margin: 0;">Addis Ababa, Ethiopia</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 15px; margin-bottom: 25px; align-items: flex-start;">
                        <div style="width: 50px; height: 50px; background: rgba(44,196,182,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-phone" style="color: var(--secondary-color); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h6 style="color: var(--primary-color); font-weight: 700; margin: 0;">Phone</h6>
                            <p style="color: var(--dark-grey); margin: 0;">+251 914 063 678</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 15px; margin-bottom: 25px; align-items: flex-start;">
                        <div style="width: 50px; height: 50px; background: rgba(44,196,182,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="color: var(--secondary-color); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h6 style="color: var(--primary-color); font-weight: 700; margin: 0;">Email</h6>
                            <p style="color: var(--dark-grey); margin: 0;">fuad.dafu16@gmail.com</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 15px; margin-bottom: 25px; align-items: flex-start;">
                        <div style="width: 50px; height: 50px; background: rgba(44,196,182,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-clock" style="color: var(--secondary-color); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h6 style="color: var(--primary-color); font-weight: 700; margin: 0;">Working Hours</h6>
                            <p style="color: var(--dark-grey); margin: 0;">Mon - Sun: 6:00 AM - 10:00 PM</p>
                        </div>
                    </div>
                    
                    <hr style="border-color: #ddd;">
                    
                    <h6 style="color: var(--primary-color); font-weight: 700; margin-bottom: 15px;">Follow Us</h6>
                    <div style="display: flex; gap: 15px;">
                        <a href="#" style="width: 45px; height: 45px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" style="width: 45px; height: 45px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" style="width: 45px; height: 45px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" style="width: 45px; height: 45px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" style="width: 45px; height: 45px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>