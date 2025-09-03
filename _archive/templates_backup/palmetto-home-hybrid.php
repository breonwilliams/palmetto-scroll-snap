<?php
/**
 * Palmetto Wildlife Extractors - Hybrid Template
 * This template uses native theme header/footer or static fallbacks
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Load settings handler
require_once PSS_PLUGIN_DIR . 'admin/settings-handler.php';

// Determine whether to use native or static header/footer
$use_native = pss_should_use_native_header_footer();

// Get plugin URL for assets
$plugin_url = plugin_dir_url(dirname(__FILE__));
$assets_url = $plugin_url . 'assets/';

// Start output
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="pss-active">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <?php wp_head(); ?>
    
    <!-- Scroll Snap Styles -->
    <style>
        /* Kill smooth scroll globally */
        * {
            scroll-behavior: auto !important;
        }
        
        /* Main wrapper setup */
        html.pss-active,
        body.pss-active {
            overflow: hidden;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        /* Scroll container */
        .pss-scroll-wrapper {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            scroll-snap-type: y mandatory;
            scroll-padding-top: 0;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Snap sections */
        .pss-snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            min-height: 100vh;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Section backgrounds */
        #snap-why-choose {
            background: #f8f9fa;
        }
        
        #snap-services {
            background: white;
        }
        
        #snap-wildlife-control {
            background: #232931;
            color: white;
        }
        
        #snap-components {
            background: #f8f9fa;
        }
        
        #snap-faqs {
            background: white;
        }
        
        #snap-protect-property {
            background: linear-gradient(135deg, #1a7efb 0%, #0056b3 100%);
            color: white;
        }
        
        /* Content container */
        .section-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 60px 20px;
            text-align: center;
        }
        
        /* Progress indicators */
        .pss-progress {
            position: fixed;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .pss-progress-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(26, 126, 251, 0.8);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .pss-progress-dot:hover {
            transform: scale(1.3);
            background: rgba(26, 126, 251, 0.5);
            border-color: #1a7efb;
        }
        
        .pss-progress-dot.active {
            background: #1a7efb;
            border-color: #1a7efb;
            transform: scale(1.4);
            box-shadow: 0 0 15px rgba(26, 126, 251, 0.6);
        }
        
        /* Typography */
        .pss-snap-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        
        .pss-snap-section p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Mobile responsive */
        @media (max-width: 768px) {
            html.pss-active,
            body.pss-active {
                overflow: auto;
                height: auto;
            }
            
            .pss-scroll-wrapper {
                height: auto;
                overflow-y: visible;
                scroll-snap-type: none;
            }
            
            .pss-snap-section {
                min-height: auto;
                scroll-snap-align: none;
                padding: 60px 20px;
            }
            
            .pss-progress {
                display: none;
            }
        }
    </style>
    
    <script>
        // Kill any smooth scroll libraries immediately
        (function() {
            // Disable Lenis
            if (window.lenis || window.Lenis) {
                if (window.lenis) {
                    window.lenis.stop();
                    window.lenis.destroy();
                    window.lenis = null;
                }
                window.Lenis = null;
            }
            
            // Disable Breakdance Lenis
            if (window.EhGlobalLenisInstance) {
                window.EhGlobalLenisInstance.stop();
                window.EhGlobalLenisInstance.destroy();
                window.EhGlobalLenisInstance = null;
            }
            
            // Disable other smooth scroll libraries
            document.documentElement.style.scrollBehavior = 'auto';
            document.body.style.scrollBehavior = 'auto';
        })();
    </script>
</head>

<body <?php body_class('pss-active'); ?>>

<?php
// Load header
if ($use_native) {
    // Use native theme header
    get_header();
} else {
    // Use static Breakdance header
    include PSS_PLUGIN_DIR . 'templates/partials/header-fallback.php';
}
?>

<!-- Main Scroll Container -->
<div class="pss-scroll-wrapper">
    
    <!-- Why Choose Section -->
    <section id="snap-why-choose" class="pss-snap-section">
        <div class="section-container">
            <h2>Why Choose Palmetto Wildlife Extractors?</h2>
            <p>With over 30 years of combined experience and a commitment to humane wildlife management, we're your trusted partner in wildlife control throughout South Carolina and North Carolina.</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 40px;">
                <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h3>🛡️ Wildlife Prevention</h3>
                    <p>Proactive measures to keep wildlife from entering your property</p>
                </div>
                <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h3>🏠 Wildlife Removal</h3>
                    <p>Safe and humane extraction of unwanted wildlife</p>
                </div>
                <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h3>🔧 Wildlife Remediation</h3>
                    <p>Complete cleanup and repair of wildlife damage</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section id="snap-services" class="pss-snap-section">
        <div class="section-container">
            <h2>Our Services</h2>
            <p>Comprehensive wildlife control solutions for every situation</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 40px;">
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🐿️ Squirrels</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🦝 Raccoons</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🦇 Bats</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🐍 Snakes</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🐀 Rodents</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🦨 Skunks</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🦫 Beavers</h4>
                </div>
                <div style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <h4>🐊 Alligators</h4>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Wildlife Control Section -->
    <section id="snap-wildlife-control" class="pss-snap-section">
        <div class="section-container">
            <h2>Professional Wildlife Control</h2>
            <p>We handle all types of wildlife situations with expertise and care. Our team is trained in the latest techniques for safe, effective, and humane wildlife management.</p>
            
            <div style="margin-top: 40px;">
                <p style="font-size: 1.3rem;">✓ Licensed and Insured</p>
                <p style="font-size: 1.3rem;">✓ 24/7 Emergency Service</p>
                <p style="font-size: 1.3rem;">✓ Humane Methods</p>
                <p style="font-size: 1.3rem;">✓ Guaranteed Results</p>
            </div>
        </div>
    </section>
    
    <!-- Components Section -->
    <section id="snap-components" class="pss-snap-section">
        <div class="section-container">
            <h2>Our Process</h2>
            <p>We follow a comprehensive approach to ensure complete wildlife management</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 40px;">
                <div>
                    <h3>1. Inspection</h3>
                    <p>Thorough assessment of your property</p>
                </div>
                <div>
                    <h3>2. Removal</h3>
                    <p>Safe extraction of wildlife</p>
                </div>
                <div>
                    <h3>3. Exclusion</h3>
                    <p>Seal entry points to prevent return</p>
                </div>
                <div>
                    <h3>4. Cleanup</h3>
                    <p>Sanitize and repair damage</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQs Section -->
    <section id="snap-faqs" class="pss-snap-section">
        <div class="section-container">
            <h2>Frequently Asked Questions</h2>
            
            <div style="max-width: 800px; margin: 40px auto; text-align: left;">
                <div style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px;">
                    <h4>How quickly can you respond to an emergency?</h4>
                    <p>We offer 24/7 emergency wildlife removal services and typically respond within 2-4 hours.</p>
                </div>
                
                <div style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px;">
                    <h4>Are your methods humane?</h4>
                    <p>Yes, we use only humane wildlife removal techniques that comply with all state and federal regulations.</p>
                </div>
                
                <div style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px;">
                    <h4>Do you offer warranties?</h4>
                    <p>We provide comprehensive warranties on all our exclusion work and prevention services.</p>
                </div>
                
                <div style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px;">
                    <h4>What areas do you service?</h4>
                    <p>We proudly serve all of South Carolina and North Carolina.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Protect Property Section -->
    <section id="snap-protect-property" class="pss-snap-section">
        <div class="section-container">
            <h2>Protect Your Property Today</h2>
            <p style="font-size: 1.3rem;">Don't wait until wildlife becomes a serious problem. Our expert team is ready to help you maintain a safe, wildlife-free environment.</p>
            
            <div style="margin-top: 40px;">
                <p style="font-size: 1.8rem; font-weight: bold; margin-bottom: 30px;">
                    📞 Call Now: 1-855-WILDLIFE
                </p>
                <a href="/contact" style="display: inline-block; padding: 15px 40px; background: white; color: #1a7efb; text-decoration: none; border-radius: 50px; font-weight: 600; font-size: 1.2rem;">
                    Request Free Consultation
                </a>
            </div>
        </div>
    </section>
    
</div><!-- .pss-scroll-wrapper -->

<!-- Progress Dots -->
<div class="pss-progress" id="progress-dots"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const wrapper = document.querySelector('.pss-scroll-wrapper');
    const sections = document.querySelectorAll('.pss-snap-section');
    const progressContainer = document.getElementById('progress-dots');
    
    if (!wrapper || !sections.length) return;
    
    // Create progress dots
    sections.forEach((section, index) => {
        const dot = document.createElement('div');
        dot.className = 'pss-progress-dot';
        if (index === 0) dot.classList.add('active');
        
        dot.addEventListener('click', function() {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
        
        progressContainer.appendChild(dot);
    });
    
    const dots = document.querySelectorAll('.pss-progress-dot');
    
    // Update active dot on scroll
    let scrollTimeout;
    wrapper.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(function() {
            const scrollTop = wrapper.scrollTop;
            const windowHeight = window.innerHeight;
            
            sections.forEach((section, index) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                
                if (scrollTop >= sectionTop - windowHeight / 2 && 
                    scrollTop < sectionTop + sectionHeight - windowHeight / 2) {
                    dots.forEach(d => d.classList.remove('active'));
                    if (dots[index]) {
                        dots[index].classList.add('active');
                    }
                }
            });
        }, 50);
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
    
    console.log('Palmetto Scroll Snap initialized');
});
</script>

<?php
// Load footer
if ($use_native) {
    // Use native theme footer
    get_footer();
} else {
    // Use static Breakdance footer
    include PSS_PLUGIN_DIR . 'templates/partials/footer-fallback.php';
}
?>

<?php wp_footer(); ?>
</body>
</html>