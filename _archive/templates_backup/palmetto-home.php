<?php
/**
 * Palmetto Wildlife Extractors - Home Page Template
 * Phase 1: Header Implementation with Mega Menu
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Remove admin bar on frontend for this template
add_filter('show_admin_bar', '__return_false');

// Get plugin URL for assets
$plugin_url = plugin_dir_url(dirname(__FILE__));
$assets_url = $plugin_url . 'assets/';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="pss-active breakdance">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palmetto Wildlife Extractors - Animal Removal Services</title>
    
    <?php wp_head(); ?>
    
    <!-- Original Breakdance CSS Files -->
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/awesome-menu.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/global-settings.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/presets.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/selectors.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-322-defaults.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-322.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-329-defaults.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-329.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-111-defaults.css">
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-111.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo+Black:wght@400&family=Roboto:wght@300;400;500;700&display=swap">
    
    <!-- Custom Scroll Snap Styles -->
    <link rel="stylesheet" href="<?php echo $assets_url; ?>css/scroll-snap-override.css">
    
    <style>
        /* Kill smooth scroll */
        * {
            scroll-behavior: auto !important;
        }
        
        /* Ensure header stays fixed properly */
        .bde-header-builder-322-100 {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 99999 !important;
            width: 100%;
        }
        
        body {
            margin: 0;
            padding: 0;
            padding-top: 100px; /* Account for fixed header */
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        
        
        /* Mega Menu Dropdown Styles */
        .breakdance-dropdown-floater {
            max-width: 1250px !important;
        }
        
        .breakdance-dropdown-body {
            overflow: auto !important;
        }
        
        .bde-menu-dropdown-219-122 .breakdance-dropdown-column.breakdance-dropdown-column:first-child:not(.breakdance-dropdown-section--additional .breakdance-dropdown-column.breakdance-dropdown-column:first-child) .breakdance-dropdown-links {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 0px;
        }
        
        .breakdance-dropdown-link__description {
            width: 280px;
            white-space: break-spaces;
        }
        
        @media screen and (max-width: 1150px) {
            .breakdance-dropdown-floater {
                max-width: 1120px !important;
            }
        }
        
        @media screen and (max-width: 1023px) {
            .bde-menu-dropdown-219-122 .breakdance-dropdown-column.breakdance-dropdown-column:first-child:not(.breakdance-dropdown-section--additional .breakdance-dropdown-column.breakdance-dropdown-column:first-child) .breakdance-dropdown-links {
                grid-template-columns: 1fr;
            }
        }
        
        /* Temporary test content styles */
        .test-content {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            text-align: center;
            padding: 40px;
        }
    </style>
</head>

<body <?php body_class('pss-active breakdance'); ?>>

<!-- Original Palmetto Wildlife Header -->
<header class="bde-header-builder-322-100 bde-header-builder palmetto-header bde-header-builder--sticky bde-header-builder--sticky-scroll-slide">
    <div class="bde-header-builder__container">
        <div class="bde-div-322-129 bde-div">
            
            <!-- Top Bar with Phone and Social Icons -->
            <div class="bde-div-322-102 bde-div">
                <div class="bde-icon-list-322-107 bde-icon-list">
                    <ul>
                        <li>
                            <a class="breakdance-link bde-icon-list__item-wrapper" href="tel:855-465-1088" target="_self">
                                <span class="bde-icon-list__icon">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <span class="bde-icon-list__text">+1 855-465-1088</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <h1 class="bde-heading-322-140 bde-heading">
                    &gt;&gt;&gt;We do not deal with domesticated animals or provide rescue services &lt;&lt;&lt;
                </h1>
                
                <div class="bde-div-322-103 bde-div">
                    <!-- Social Icons -->
                    <div class="bde-icon-322-105 bde-icon">
                        <a class="breakdance-link bde-icon-icon" href="https://www.facebook.com/PalmettoWildlifeExtractor/" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                    <div class="bde-icon-322-139 bde-icon">
                        <a class="breakdance-link bde-icon-icon" href="https://www.instagram.com/palmetto_wildlife/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <div class="bde-icon-322-138 bde-icon">
                        <a class="breakdance-link bde-icon-icon" href="https://www.tiktok.com/@palmetto_wildlife" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                    <div class="bde-icon-322-131 bde-icon">
                        <a class="breakdance-link bde-icon-icon" href="https://www.linkedin.com/in/palmetto-wildlife-extractors-6582abb3" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Why Choose Section (Snap) -->
        <section id="snap-why-choose" class="snap-section">
            <div class="section-content">
                <h2>Why Choose Palmetto Wildlife Extractors?</h2>
                <p>With years of experience and a commitment to humane wildlife management, we're your trusted partner in wildlife control.</p>
                
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">🛡️</div>
                        <h3>Wildlife Prevention</h3>
                        <p>Proactive measures to keep wildlife from entering your property</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏠</div>
                        <h3>Wildlife Removal</h3>
                        <p>Safe and humane extraction of unwanted wildlife</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🔧</div>
                        <h3>Wildlife Remediation</h3>
                        <p>Complete cleanup and repair of wildlife damage</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Services Section (Snap) -->
        <section id="snap-services" class="snap-section">
            <div class="section-content">
                <h2>Our Services</h2>
                <p>Comprehensive wildlife control solutions for every situation</p>
                
                <div class="services-grid">
                    <div class="service-card">
                        <h3>Squirrels</h3>
                        <p>Expert squirrel removal and prevention</p>
                    </div>
                    <div class="service-card">
                        <h3>Raccoons</h3>
                        <p>Safe raccoon extraction and exclusion</p>
                    </div>
                    <div class="service-card">
                        <h3>Bats</h3>
                        <p>Humane bat removal and guano cleanup</p>
                    </div>
                    <div class="service-card">
                        <h3>Snakes</h3>
                        <p>Professional snake removal services</p>
                    </div>
                    <div class="service-card">
                        <h3>Rats & Mice</h3>
                        <p>Complete rodent control solutions</p>
                    </div>
                    <div class="service-card">
                        <h3>Birds</h3>
                        <p>Bird removal and nesting prevention</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Wildlife Control Section (Snap) -->
        <section id="snap-wildlife-control" class="snap-section">
            <div class="section-content">
                <h2>Professional Wildlife Control</h2>
                <p>We handle all types of wildlife situations with expertise and care. Our team is trained in the latest techniques for safe, effective, and humane wildlife management.</p>
                
                <div style="margin-top: 40px;">
                    <p style="font-size: 1.3rem; margin-bottom: 10px;">✓ Licensed and Insured</p>
                    <p style="font-size: 1.3rem; margin-bottom: 10px;">✓ 24/7 Emergency Service</p>
                    <p style="font-size: 1.3rem; margin-bottom: 10px;">✓ Humane Methods</p>
                    <p style="font-size: 1.3rem;">✓ Guaranteed Results</p>
                </div>
                
                <a href="#contact" class="cta-button white">Schedule Inspection</a>
            </div>
        </section>
        
        <!-- FAQs Section (Snap) -->
        <section id="snap-faqs" class="snap-section">
            <div class="section-content">
                <h2>Frequently Asked Questions</h2>
                
                <div style="max-width: 800px; margin: 0 auto;">
                    <div class="faq-item">
                        <div class="faq-question">How quickly can you respond to an emergency?</div>
                        <div class="faq-answer">We offer 24/7 emergency wildlife removal services and typically respond within 2-4 hours.</div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">Are your methods humane?</div>
                        <div class="faq-answer">Yes, we use only humane wildlife removal techniques that comply with all state and federal regulations.</div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">Do you offer warranties?</div>
                        <div class="faq-answer">We provide comprehensive warranties on all our exclusion work and prevention services.</div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">What areas do you service?</div>
                        <div class="faq-answer">We proudly serve all of South Carolina and North Carolina.</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Protect Property Section (Snap) -->
        <section id="snap-protect-property" class="snap-section">
            <div class="section-content">
                <h2>Protect Your Property Today</h2>
                <p style="font-size: 1.3rem;">Don't wait until wildlife becomes a serious problem. Our expert team is ready to help you maintain a safe, wildlife-free environment.</p>
                
                <div style="margin-top: 40px;">
                    <p style="font-size: 1.5rem; font-weight: 600; margin-bottom: 30px;">📞 Call Now: 1-855-WILDLIFE</p>
                    <a href="#contact" class="cta-button white">Request Free Consultation</a>
                </div>
            </div>
        </section>
        
        <!-- Footer Section (No Snap) -->
        <footer id="footer-section">
            <div class="section-content">
                <p style="font-size: 1.2rem; margin-bottom: 20px;">Palmetto Wildlife Extractors</p>
                <p>© <?php echo date('Y'); ?> All Rights Reserved</p>
                <p style="margin-top: 20px;">Licensed • Insured • Professional</p>
            </div>
        </footer>
        
    </div><!-- .pss-main-wrapper -->
    
    <!-- Progress Dots -->
    <div class="progress-dots" id="progress-dots"></div>
    
    <?php wp_footer(); ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Kill any smooth scroll libraries
        if (window.EhGlobalLenisInstance) {
            try {
                window.EhGlobalLenisInstance.stop();
                window.EhGlobalLenisInstance.destroy();
                window.EhGlobalLenisInstance = null;
            } catch(e) {}
        }
        
        // Get elements
        const wrapper = document.querySelector('.pss-main-wrapper');
        const sections = document.querySelectorAll('.snap-section');
        const progressContainer = document.getElementById('progress-dots');
        
        // Create progress dots
        sections.forEach((section, index) => {
            const dot = document.createElement('div');
            dot.className = 'progress-dot';
            if (index === 0) dot.classList.add('active');
            
            dot.addEventListener('click', function() {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
            
            progressContainer.appendChild(dot);
        });
        
        const dots = document.querySelectorAll('.progress-dot');
        
        // Update active dot on scroll
        wrapper.addEventListener('scroll', function() {
            const scrollTop = wrapper.scrollTop;
            const windowHeight = window.innerHeight;
            
            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const sectionTop = section.offsetTop;
                
                if (scrollTop >= sectionTop - windowHeight / 2 && 
                    scrollTop < sectionTop + section.offsetHeight - windowHeight / 2) {
                    dots.forEach(d => d.classList.remove('active'));
                    if (dots[index]) {
                        dots[index].classList.add('active');
                    }
                }
            });
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
            
            const currentIndex = Array.from(dots).findIndex(dot => dot.classList.contains('active'));
            
            if (e.key === 'ArrowDown' || e.key === ' ') {
                e.preventDefault();
                if (currentIndex < sections.length - 1) {
                    sections[currentIndex + 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (currentIndex > 0) {
                    sections[currentIndex - 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
        
        console.log('Palmetto Scroll Snap initialized successfully');
    });
    </script>
    
</body>
</html>