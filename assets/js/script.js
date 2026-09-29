// ============================================
// DAFU TECH SOLUTIONS - Main JavaScript
// ============================================

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // 1. Navbar Scroll Effect
    // ============================================
    const navbar = document.querySelector('.navbar');
    
    if(navbar) {
        window.addEventListener('scroll', function() {
            if(window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 30px rgba(15, 51, 93, 0.25)';
                navbar.style.padding = '8px 0';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(15, 51, 93, 0.3)';
                navbar.style.padding = '10px 0';
            }
        });
    }
    
    // ============================================
    // 2. Smooth Scrolling for Anchor Links
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            if(targetId !== '#') {
                const target = document.querySelector(targetId);
                
                if(target) {
                    e.preventDefault();
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // ============================================
    // 3. Auto-dismiss Alerts
    // ============================================
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    
    alerts.forEach(alert => {
        setTimeout(() => {
            const closeBtn = alert.querySelector('.btn-close');
            if(closeBtn) {
                closeBtn.click();
            } else {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }
        }, 5000);
    });
    
    // ============================================
    // 4. Counter Animation (Hero Stats)
    // ============================================
    function animateCounters() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const text = stat.textContent;
            const numericValue = parseInt(text.replace(/[^0-9]/g, ''));
            
            if(!isNaN(numericValue) && numericValue > 0) {
                const suffix = text.replace(/[0-9]/g, '');
                let current = 0;
                const increment = Math.ceil(numericValue / 60);
                const duration = 2000;
                const stepTime = Math.floor(duration / 60);
                
                const counter = setInterval(() => {
                    current += increment;
                    
                    if(current >= numericValue) {
                        current = numericValue;
                        clearInterval(counter);
                    }
                    
                    stat.textContent = current + suffix;
                }, stepTime);
            }
        });
    }
    
    // Only run if elements exist
    if(document.querySelectorAll('.stat-number').length > 0) {
        // Check if element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        });
        
        const statSection = document.querySelector('.hero');
        if(statSection) {
            observer.observe(statSection);
        }
    }
    
    // ============================================
    // 5. Portfolio Card Hover Effect
    // ============================================
    document.querySelectorAll('.portfolio-card .image-placeholder').forEach(card => {
        card.addEventListener('mouseenter', function() {
            const overlay = this.querySelector('.overlay');
            if(overlay) {
                overlay.style.opacity = '1';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const overlay = this.querySelector('.overlay');
            if(overlay) {
                overlay.style.opacity = '0';
            }
        });
    });
    
    // ============================================
    // 6. Service Card Animation on Scroll
    // ============================================
    const serviceCards = document.querySelectorAll('.service-card');
    
    if(serviceCards.length > 0) {
        const serviceObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if(entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });
        
        serviceCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            serviceObserver.observe(card);
        });
    }
    
    // ============================================
    // 7. Mobile Menu Close on Link Click
    // ============================================
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const toggler = document.querySelector('.navbar-toggler');
    
    if(navbarCollapse && toggler) {
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if(window.innerWidth <= 991) {
                    toggler.click();
                }
            });
        });
    }
    
    // ============================================
    // 8. Back to Top Button (Optional)
    // ============================================
    // Create back to top button if not exists
    let backToTop = document.querySelector('.back-to-top');
    
    if(!backToTop) {
        backToTop = document.createElement('button');
        backToTop.className = 'back-to-top';
        backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
        backToTop.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #2CC4B6;
            color: white;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(44, 196, 182, 0.4);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        `;
        document.body.appendChild(backToTop);
        
        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Show/hide back to top button
    window.addEventListener('scroll', () => {
        if(window.scrollY > 400) {
            backToTop.style.opacity = '1';
            backToTop.style.visibility = 'visible';
            backToTop.style.transform = 'translateY(0)';
        } else {
            backToTop.style.opacity = '0';
            backToTop.style.visibility = 'hidden';
            backToTop.style.transform = 'translateY(20px)';
        }
    });
    
    // ============================================
    // 9. Contact Form Validation (Basic)
    // ============================================
    const contactForm = document.querySelector('form[action*="contact"]');
    
    if(contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if(!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if(!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }
    
    // ============================================
    // 10. Real-time Input Validation
    // ============================================
    document.querySelectorAll('input[required], textarea[required], select[required]').forEach(field => {
        field.addEventListener('blur', function() {
            if(this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
    
    console.log('🚀 DAFU TECH SOLUTIONS - Website Loaded Successfully!');
    console.log('📱 Accelerate Your Digital World');
});