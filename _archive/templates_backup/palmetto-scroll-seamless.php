<?php
/**
 * Palmetto Scroll Snap - Seamless Scrolling Version
 * This version allows seamless scrolling from sections to footer
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Palmetto Scroll Snap with Seamless Footer Scrolling -->
<style>
    /* Kill smooth scroll for our container */
    .pss-wrapper * {
        scroll-behavior: auto !important;
    }
    
    /* Main wrapper */
    .pss-wrapper {
        position: relative;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    
    /* Scroll container with controlled overflow */
    .pss-scroll-container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
        scroll-snap-type: y mandatory;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: none; /* Prevent bounce but allow passthrough */
    }
    
    /* When at bottom, allow page scroll */
    .pss-scroll-container.at-bottom {
        overflow-y: hidden;
        pointer-events: none;
    }
    
    .pss-scroll-container.at-bottom .pss-snap-section {
        pointer-events: auto;
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
    
    /* Last section can be shorter to hint at footer */
    .pss-snap-section:last-child {
        min-height: calc(100vh - 100px);
    }
    
    /* Section backgrounds */
    #pss-why-choose { background: #f8f9fa; }
    #pss-services { background: white; }
    #pss-wildlife-control { background: #232931; color: white; }
    #pss-process { background: #f8f9fa; }
    #pss-faqs { background: white; }
    #pss-cta { background: linear-gradient(135deg, #1a7efb 0%, #0056b3 100%); color: white; }
    
    /* Content styling */
    .pss-content {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 60px 20px;
        text-align: center;
    }
    
    .pss-snap-section h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        margin-bottom: 1.5rem;
        font-weight: 700;
    }
    
    .pss-snap-section p {
        font-size: clamp(1rem, 2vw, 1.25rem);
        line-height: 1.8;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Scroll indicator at bottom */
    .pss-scroll-hint {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        animation: bounce 2s infinite;
        z-index: 10;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }
    
    .pss-scroll-hint svg {
        width: 30px;
        height: 30px;
        fill: currentColor;
        opacity: 0.6;
    }
    
    /* Progress dots */
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
        transition: all 0.3s ease;
    }
    
    .pss-progress-dot:hover {
        transform: scale(1.3);
        background: rgba(26, 126, 251, 0.5);
    }
    
    .pss-progress-dot.active {
        background: #1a7efb;
        transform: scale(1.4);
        box-shadow: 0 0 15px rgba(26, 126, 251, 0.6);
    }
    
    /* Grids */
    .pss-grid {
        display: grid;
        gap: 30px;
        margin-top: 40px;
    }
    
    .pss-grid-3 {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
    
    .pss-grid-4 {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .pss-card {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    #pss-wildlife-control .pss-card {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
    }
    
    .pss-service-item {
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background: white;
    }
    
    /* Mobile */
    @media (max-width: 768px) {
        .pss-scroll-container {
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
        
        .pss-scroll-hint {
            display: none;
        }
    }
</style>

<div class="pss-wrapper">
    <div class="pss-scroll-container" id="pss-container">
        
        <!-- Section 1: Why Choose -->
        <section id="pss-why-choose" class="pss-snap-section">
            <div class="pss-content">
                <h2>Why Choose Palmetto Wildlife Extractors?</h2>
                <p>With over 30 years of combined experience and a commitment to humane wildlife management, we're your trusted partner in wildlife control throughout South Carolina and North Carolina.</p>
                
                <div class="pss-grid pss-grid-3">
                    <div class="pss-card">
                        <h3>🛡️ Wildlife Prevention</h3>
                        <p>Proactive measures to keep wildlife from entering your property</p>
                    </div>
                    <div class="pss-card">
                        <h3>🏠 Wildlife Removal</h3>
                        <p>Safe and humane extraction of unwanted wildlife</p>
                    </div>
                    <div class="pss-card">
                        <h3>🔧 Wildlife Remediation</h3>
                        <p>Complete cleanup and repair of wildlife damage</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section 2: Services -->
        <section id="pss-services" class="pss-snap-section">
            <div class="pss-content">
                <h2>Our Services</h2>
                <p>Comprehensive wildlife control solutions for every situation</p>
                
                <div class="pss-grid pss-grid-4">
                    <div class="pss-service-item"><h4>🐿️ Squirrels</h4></div>
                    <div class="pss-service-item"><h4>🦝 Raccoons</h4></div>
                    <div class="pss-service-item"><h4>🦇 Bats</h4></div>
                    <div class="pss-service-item"><h4>🐍 Snakes</h4></div>
                    <div class="pss-service-item"><h4>🐀 Rodents</h4></div>
                    <div class="pss-service-item"><h4>🦨 Skunks</h4></div>
                    <div class="pss-service-item"><h4>🦫 Beavers</h4></div>
                    <div class="pss-service-item"><h4>🐊 Alligators</h4></div>
                </div>
            </div>
        </section>
        
        <!-- Section 3: Wildlife Control -->
        <section id="pss-wildlife-control" class="pss-snap-section">
            <div class="pss-content">
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
        
        <!-- Section 4: Our Process -->
        <section id="pss-process" class="pss-snap-section">
            <div class="pss-content">
                <h2>Our Process</h2>
                <p>We follow a comprehensive approach to ensure complete wildlife management</p>
                
                <div class="pss-grid pss-grid-4">
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
        
        <!-- Section 5: FAQs -->
        <section id="pss-faqs" class="pss-snap-section">
            <div class="pss-content">
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
        
        <!-- Section 6: CTA (Last Section) -->
        <section id="pss-cta" class="pss-snap-section">
            <div class="pss-content">
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
            
            <!-- Scroll hint to indicate more content below -->
            <div class="pss-scroll-hint">
                <p style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 10px;">Scroll for more</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                </svg>
            </div>
        </section>
        
    </div>
</div>

<!-- Progress Dots -->
<div class="pss-progress" id="pss-progress"></div>

<script>
(function() {
    'use strict';
    
    function initSeamlessScroll() {
        // Disable smooth scroll libraries
        if (window.EhGlobalLenisInstance) {
            try {
                window.EhGlobalLenisInstance.stop();
                window.EhGlobalLenisInstance.destroy();
                window.EhGlobalLenisInstance = null;
            } catch(e) {}
        }
        
        // Block Lenis
        window.Lenis = function() {
            return {
                start: function() {},
                stop: function() {},
                destroy: function() {},
                raf: function() {},
                scrollTo: function() {}
            };
        };
        
        const container = document.getElementById('pss-container');
        const sections = container ? container.querySelectorAll('.pss-snap-section') : [];
        const progressContainer = document.getElementById('pss-progress');
        
        if (!container || !sections.length || !progressContainer) {
            console.log('[PSS] Waiting for elements...');
            setTimeout(initSeamlessScroll, 100);
            return;
        }
        
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
        
        const dots = progressContainer.querySelectorAll('.pss-progress-dot');
        
        // Handle seamless scrolling to footer
        let isAtBottom = false;
        let lastScrollTop = 0;
        
        container.addEventListener('wheel', function(e) {
            const scrollTop = container.scrollTop;
            const scrollHeight = container.scrollHeight;
            const clientHeight = container.clientHeight;
            const isScrollingDown = e.deltaY > 0;
            const isScrollingUp = e.deltaY < 0;
            
            // Check if at bottom of container
            const atBottom = Math.abs(scrollHeight - clientHeight - scrollTop) < 5;
            const atTop = scrollTop < 5;
            
            // If at bottom and scrolling down, pass scroll to page
            if (atBottom && isScrollingDown) {
                e.preventDefault();
                container.style.overflowY = 'hidden';
                window.scrollBy(0, e.deltaY);
                
                // Re-enable container scroll after a moment
                setTimeout(() => {
                    container.style.overflowY = 'auto';
                }, 100);
            }
            
            // If container is scrolled out of view upward and scrolling up, scroll page first
            if (window.pageYOffset > 0 && isScrollingUp && atTop) {
                e.preventDefault();
                window.scrollBy(0, e.deltaY);
            }
        }, { passive: false });
        
        // Handle page scroll to detect when container comes back into view
        window.addEventListener('scroll', function() {
            const containerRect = container.getBoundingClientRect();
            const containerInView = containerRect.top <= 0 && containerRect.bottom >= window.innerHeight;
            
            // If scrolling up and container is back in full view, focus scroll on container
            if (containerInView && window.pageYOffset === 0) {
                container.focus();
            }
        });
        
        // Update active dot on scroll
        let scrollTimeout;
        container.addEventListener('scroll', function() {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(function() {
                const scrollTop = container.scrollTop;
                const containerHeight = container.offsetHeight;
                
                sections.forEach((section, index) => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    
                    if (scrollTop >= sectionTop - containerHeight / 2 && 
                        scrollTop < sectionTop + sectionHeight - containerHeight / 2) {
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
            
            const containerRect = container.getBoundingClientRect();
            const containerInView = containerRect.top <= window.innerHeight && containerRect.bottom >= 0;
            
            if (!containerInView) return;
            
            const currentIndex = Array.from(dots).findIndex(dot => dot.classList.contains('active'));
            
            if (e.key === 'ArrowDown' || e.key === ' ') {
                const atLastSection = currentIndex === sections.length - 1;
                const scrollTop = container.scrollTop;
                const scrollHeight = container.scrollHeight;
                const clientHeight = container.clientHeight;
                const atBottom = Math.abs(scrollHeight - clientHeight - scrollTop) < 5;
                
                if (atLastSection && atBottom) {
                    // Allow default page scroll
                    return;
                }
                
                e.preventDefault();
                if (currentIndex < sections.length - 1) {
                    sections[currentIndex + 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else if (e.key === 'ArrowUp') {
                if (window.pageYOffset > 0) {
                    // Let page scroll handle it
                    return;
                }
                
                e.preventDefault();
                if (currentIndex > 0) {
                    sections[currentIndex - 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
        
        console.log('[PSS] Seamless scroll initialized');
    }
    
    // Initialize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSeamlessScroll);
    } else {
        setTimeout(initSeamlessScroll, 100);
    }
})();
</script>