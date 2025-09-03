<?php
/**
 * Palmetto Scroll Snap - Final Version
 * Fixes slow scrolling and Breakdance container constraints
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Palmetto Scroll Snap Final -->
<style>
    /* ================================================
       DESIGN SYSTEM - 2025 Modern Standards
       ================================================ */
    
    :root {
        /* === Color System === */
        /* Primary Green Palette */
        --color-primary-dark: #1d3a0f;
        --color-primary: #2d5016;
        --color-primary-light: #4a6b2a;
        --color-primary-accent: #6ab04c;
        --color-primary-tint: #e8f5e9;
        
        /* Secondary Orange Palette */
        --color-secondary: #ff6b35;
        --color-secondary-hover: #ff5722;
        --color-secondary-light: #ff8a65;
        --color-secondary-tint: #fff3e0;
        
        /* Neutral Colors */
        --color-text-primary: #1a1a1a;
        --color-text-secondary: #4a4a4a;
        --color-text-muted: #6c757d;
        --color-border: #e0e0e0;
        --color-border-light: #f0f0f0;
        --color-bg-light: #f8f9fa;
        --color-bg-white: #ffffff;
        
        /* Semantic Colors */
        --color-success: #6ab04c;
        --color-success-dark: #5a9b3d;
        --color-info: #4a90e2;
        --color-warning: #ffc107;
        --color-error: #dc3545;
        
        /* === Typography System (1.25 Scale) === */
        --font-family-base: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        --font-family-heading: "Montserrat", var(--font-family-base);
        
        /* Font Sizes */
        --font-size-xs: 0.8rem;      /* 12.8px */
        --font-size-sm: 0.875rem;    /* 14px */
        --font-size-base: 1rem;      /* 16px */
        --font-size-md: 1.125rem;    /* 18px */
        --font-size-lg: 1.25rem;     /* 20px */
        --font-size-xl: 1.563rem;    /* 25px */
        --font-size-2xl: 1.953rem;   /* 31.2px */
        --font-size-3xl: 2.441rem;   /* 39px */
        --font-size-4xl: 3.052rem;   /* 48.8px */
        
        /* Line Heights */
        --line-height-tight: 1.2;
        --line-height-snug: 1.375;
        --line-height-base: 1.5;
        --line-height-relaxed: 1.625;
        --line-height-loose: 1.75;
        
        /* Font Weights */
        --font-weight-normal: 400;
        --font-weight-medium: 500;
        --font-weight-semibold: 600;
        --font-weight-bold: 700;
        
        /* === Spacing System (8px Grid) === */
        --space-0: 0;
        --space-xs: 0.5rem;   /* 8px */
        --space-sm: 1rem;     /* 16px */
        --space-md: 1.5rem;   /* 24px */
        --space-lg: 2rem;     /* 32px */
        --space-xl: 3rem;     /* 48px */
        --space-2xl: 4rem;    /* 64px */
        --space-3xl: 6rem;    /* 96px */
        --space-4xl: 8rem;    /* 128px */
        
        /* === Layout === */
        --container-max-width: 1280px;
        --container-padding: var(--space-md);
        --section-padding-y: var(--space-2xl);
        --section-padding-y-mobile: var(--space-xl);
        
        /* === Border Radius === */
        --radius-sm: 4px;
        --radius-base: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
        --radius-full: 9999px;
        
        /* === Shadows (Elevation System) === */
        --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.05);
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
        --shadow-xl: 0 12px 32px rgba(0, 0, 0, 0.15);
        --shadow-2xl: 0 16px 48px rgba(0, 0, 0, 0.18);
        
        /* === Transitions === */
        --transition-fast: 150ms ease-out;
        --transition-base: 250ms ease-out;
        --transition-slow: 350ms ease-out;
        --transition-slower: 500ms ease-out;
        --transition-button: 400ms ease-in-out;
        
        /* === Button System === */
        --button-padding-y: 1rem;
        --button-padding-x: 1.5rem;
        --button-font-size: 0.9375rem;
        --button-font-weight: 700;
        --button-line-height: 1.07;
        --button-border-radius: 6px;
        --button-primary-bg: #ff7000;
        --button-primary-hover-bg: #e56000;
        --button-secondary-bg: transparent;
        --button-secondary-border: 2px solid currentColor;
        
        /* Easing Functions */
        --ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
        --ease-out: cubic-bezier(0, 0, 0.2, 1);
        --ease-in: cubic-bezier(0.4, 0, 1, 1);
        
        /* === Z-Index Scale === */
        --z-dropdown: 1000;
        --z-sticky: 1020;
        --z-fixed: 1030;
        --z-modal-backdrop: 1040;
        --z-modal: 1050;
        --z-popover: 1060;
        --z-tooltip: 1070;
        
        /* === Breakpoints === */
        --breakpoint-sm: 640px;
        --breakpoint-md: 768px;
        --breakpoint-lg: 1024px;
        --breakpoint-xl: 1280px;
        --breakpoint-2xl: 1536px;
    }
    
    /* === Global Design System Styles === */
    * {
        box-sizing: border-box;
    }
    
    body {
        font-family: var(--font-family-base);
        font-size: var(--font-size-base);
        line-height: var(--line-height-base);
        color: var(--color-text-primary);
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-family-heading);
        line-height: var(--line-height-tight);
        font-weight: var(--font-weight-bold);
        margin-top: 0;
        margin-bottom: var(--space-md);
    }
    
    h1 { font-size: var(--font-size-4xl); }
    h2 { font-size: var(--font-size-3xl); }
    h3 { font-size: var(--font-size-2xl); }
    h4 { font-size: var(--font-size-xl); }
    
    p {
        margin-top: 0;
        margin-bottom: var(--space-sm);
        line-height: var(--line-height-relaxed);
    }
    
    /* === Utility Classes === */
    .container {
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--container-padding);
    }
    
    .btn {
        display: inline-block;
        padding: var(--space-sm) var(--space-md);
        border-radius: var(--radius-base);
        font-weight: var(--font-weight-semibold);
        text-decoration: none;
        transition: all var(--transition-fast);
        cursor: pointer;
        border: none;
        font-size: var(--font-size-base);
    }
    
    .btn-primary {
        background: var(--color-secondary);
        color: var(--color-bg-white);
        box-shadow: var(--shadow-sm);
    }
    
    .btn-primary:hover {
        background: var(--color-secondary-hover);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--color-primary);
        border: 2px solid var(--color-primary);
    }
    
    .btn-secondary:hover {
        background: var(--color-primary);
        color: var(--color-bg-white);
    }
    
    /* === Card Component === */
    .card {
        background: var(--color-bg-white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        padding: var(--space-md);
        transition: all var(--transition-base);
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    /* === End Design System === */
    
    /* Override Breakdance container constraints ONLY for this plugin/page */
    body.pss-active .breakdance .bde-section .section-container,
    body.pss-active .bde-section .section-container,
    .pss-wrapper .bde-section .section-container,
    .breakdance .pss-wrapper .section-container {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        --bde-section-vertical-padding: 0 !important;
        --bde-section-horizontal-padding: 0 !important;
    }
    
    /* More specific override for the exact selector you mentioned */
    body.pss-active .breakdance .bde-section .section-container {
        padding: 0 !important;
        max-width: 100% !important;
    }
    
    /* Override any section that might be above our wrapper */
    body.pss-active .bde-section {
        padding: 0 !important;
    }
    
    /* Kill smooth scroll for our container */
    .pss-wrapper * {
        scroll-behavior: auto !important;
    }
    
    /* Main wrapper - break out of Breakdance constraints */
    .pss-wrapper {
        position: relative;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        padding: 0;
    }
    
    /* Scroll container */
    .pss-scroll-container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
        scroll-snap-type: y mandatory;
        -webkit-overflow-scrolling: touch;
    }
    
    /* Snap sections - full width */
    .pss-snap-section {
        scroll-snap-align: start;
        scroll-snap-stop: always;
        min-height: 100vh;
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin: 0;
    }
    
    /* Override flex for wildlife section to fix layout */
    .pss-snap-section.pss-wildlife-section {
        display: block;
        padding-top: 60px;
    }
    
    /* Make last section slightly shorter as a visual cue */
    .pss-snap-section:last-child {
        min-height: 95vh;
    }
    
    /* Section backgrounds - full width */
    #pss-why-choose { 
        background: var(--color-bg-light); 
    }
    #pss-services { 
        background: var(--color-bg-white); 
    }
    #pss-wildlife-control { 
        background: var(--color-bg-white); 
        color: var(--color-text-primary); 
    }
    #pss-process { 
        background: var(--color-bg-light); 
    }
    #pss-faqs { 
        background: var(--color-bg-white); 
    }
    #pss-cta { 
        background: linear-gradient(135deg, var(--color-info) 0%, #0056b3 100%); 
        color: var(--color-bg-white); 
    }
    
    /* Content styling - centered within full-width sections */
    .pss-content {
        max-width: var(--container-max-width);
        width: 100%;
        margin: 0 auto;
        padding: var(--section-padding-y) var(--container-padding);
        text-align: center;
    }
    
    .pss-snap-section h2 {
        font-size: var(--font-size-3xl);
        margin-bottom: var(--space-md);
        font-weight: var(--font-weight-bold);
    }
    
    .pss-snap-section p {
        font-size: var(--font-size-lg);
        line-height: var(--line-height-relaxed);
        margin-bottom: var(--space-lg);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Scroll indicator */
    .pss-scroll-hint {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        opacity: 0.7;
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { 
            transform: translateX(-50%) translateY(0); 
        }
        40% { 
            transform: translateX(-50%) translateY(-10px); 
        }
        60% { 
            transform: translateX(-50%) translateY(-5px); 
        }
    }
    
    /* Progress dots */
    .pss-progress {
        position: fixed;
        right: var(--space-lg);
        top: 50%;
        transform: translateY(-50%);
        z-index: var(--z-fixed);
        display: flex;
        flex-direction: column;
        gap: var(--space-sm);
    }
    
    .pss-progress-dot {
        width: 14px;
        height: 14px;
        border-radius: var(--radius-full);
        background: rgba(255, 255, 255, 0.3);
        border: 2px solid rgba(26, 126, 251, 0.8);
        cursor: pointer;
        transition: all var(--transition-fast);
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
    
    /* Trust Badges Section - Third Section - Circular Design */
    .pss-trust-badges {
        background: var(--color-bg-light);
        padding: var(--section-padding-y) var(--container-padding);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .pss-trustindex-container {
        width: 100%;
        max-width: var(--container-max-width);
        margin: 0 auto var(--space-xl);
        padding: 0 var(--container-padding);
        display: block;
        clear: both;
        min-height: 100px; /* Reserve space for widget */
        position: relative;
    }
    
    /* TrustIndex widget styles */
    .pss-trustindex-container > div,
    .pss-trustindex-container iframe,
    #ti-widget-container-cfc8cc643d5d833d873607bd747 {
        width: 100% !important;
        max-width: 100% !important;
        display: block !important;
    }
    
    .pss-trust-container {
        max-width: var(--container-max-width);
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: var(--space-xl);
        flex-wrap: wrap;
        width: 100%;
        clear: both;
    }
    
    .pss-trust-badge {
        width: clamp(200px, 25vw, 280px);
        height: clamp(200px, 25vw, 280px);
        border-radius: var(--radius-full);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        text-decoration: none;
        color: var(--color-bg-white);
        position: relative;
        transition: all var(--transition-base);
        gap: var(--space-sm);
        padding: var(--space-md);
        box-sizing: border-box;
    }
    
    .pss-trust-badge:hover {
        transform: translateY(-5px) scale(1.05);
        text-decoration: none;
        color: white;
    }
    
    /* Google Badge - Dark Green */
    .pss-trust-badge.google {
        background: linear-gradient(135deg, #2d5016, #4a6b2a);
    }
    
    /* BBB Badge - Dark Blue */
    .pss-trust-badge.bbb {
        background: linear-gradient(135deg, #1e3a5f, #2c4f7c);
    }
    
    /* Facebook Badge - Teal Green */
    .pss-trust-badge.facebook {
        background: linear-gradient(135deg, #2d5f4f, #4a7c6b);
    }
    
    .pss-badge-icon {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: bold;
        color: white;
        line-height: 1;
        margin-bottom: clamp(5px, 1vw, 10px);
    }
    
    .pss-badge-stars {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: clamp(2px, 0.5vw, 4px);
        margin-bottom: clamp(5px, 1vw, 8px);
    }
    
    .pss-badge-stars svg {
        width: clamp(16px, 4vw, 24px);
        height: clamp(16px, 4vw, 24px);
        fill: #ff6b35;
    }
    
    .pss-badge-title {
        font-size: var(--font-size-lg);
        font-weight: var(--font-weight-bold);
        color: var(--color-bg-white);
        margin: 0;
        line-height: var(--line-height-tight);
    }
    
    .pss-badge-subtitle {
        font-size: var(--font-size-base);
        color: #90c695;
        margin: 0;
        font-weight: var(--font-weight-medium);
    }
    
    /* BBB specific styling */
    .pss-trust-badge.bbb .pss-badge-subtitle {
        color: #90c695;
    }
    
    .pss-bbb-text {
        font-size: clamp(1rem, 2.2vw, 1.3rem);
        font-weight: bold;
        color: white;
        margin: 0;
        line-height: 1.1;
        text-align: center;
    }
    
    .pss-bbb-logo {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        font-weight: bold;
        color: white;
        margin-bottom: clamp(5px, 1vw, 10px);
    }

    /* Wildlife Carousel Section Styles */
    .pss-wildlife-section {
        background: var(--color-bg-white);
        padding: var(--section-padding-y) 0;
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    
    .pss-wildlife-header {
        text-align: center;
        max-width: 100%;
        margin: 0 auto var(--space-xl);
        padding: 0 var(--container-padding);
    }
    
    .pss-wildlife-header h2 {
        font-size: var(--font-size-3xl);
        color: var(--color-primary);
        margin-bottom: var(--space-md);
        font-weight: var(--font-weight-bold);
        letter-spacing: -0.5px;
    }
    
    .pss-wildlife-header p {
        font-size: var(--font-size-lg);
        color: var(--color-text-secondary);
        line-height: var(--line-height-relaxed);
        margin-bottom: var(--space-lg);
    }
    
    .pss-wildlife-header p strong {
        color: #2d5016;
        font-weight: 600;
    }
    
    .pss-wildlife-header .pss-btn-primary {
        display: inline-block;
        background: var(--color-secondary);
        color: var(--color-bg-white);
        padding: var(--space-sm) var(--space-lg);
        border-radius: var(--radius-full);
        text-decoration: none;
        font-weight: var(--font-weight-bold);
        font-size: var(--font-size-md);
        transition: all var(--transition-base);
        box-shadow: var(--shadow-md);
    }
    
    .pss-wildlife-header .pss-btn-primary:hover {
        background: var(--color-secondary-hover);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Carousel Container */
    .pss-carousel-wrapper {
        position: relative;
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--container-padding);
        width: 100%;
        box-sizing: border-box;
    }
    
    .pss-carousel-container {
        overflow: hidden;
        position: relative;
        width: 100%;
        margin: 0 auto;
    }
    
    .pss-carousel-track {
        display: flex;
        transition: transform var(--transition-slower);
        gap: var(--space-md);
        padding: 0 var(--space-xs);
    }
    
    /* Wildlife Cards */
    .pss-wildlife-card {
        flex: 0 0 calc(33.333% - 16px);
        min-width: 0;
        background: var(--color-bg-white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        transition: all var(--transition-base);
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        box-sizing: border-box;
    }
    
    .pss-wildlife-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    .pss-wildlife-card-image {
        width: 100%;
        height: 250px;
        background: var(--color-bg-light);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: var(--space-md);
    }
    
    .pss-wildlife-card-image img {
        width: auto;
        max-width: 100%;
        height: auto;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    
    .pss-wildlife-card:hover .pss-wildlife-card-image img {
        transform: scale(1.05);
    }
    
    .pss-wildlife-card-content {
        padding: var(--space-lg) var(--space-md);
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .pss-wildlife-card-title {
        font-size: var(--font-size-xl);
        font-weight: var(--font-weight-bold);
        color: var(--color-primary);
        margin-bottom: var(--space-sm);
        letter-spacing: -0.3px;
    }
    
    .pss-wildlife-card-description {
        font-size: var(--font-size-base);
        color: var(--color-text-secondary);
        line-height: var(--line-height-relaxed);
        margin-bottom: var(--space-md);
        flex-grow: 1;
    }
    
    .pss-wildlife-card-link {
        display: inline-block;
        color: var(--color-primary-accent);
        font-weight: var(--font-weight-bold);
        font-size: var(--font-size-base);
        text-decoration: none;
        transition: all var(--transition-fast);
        padding: var(--space-sm) 0;
        border-bottom: 2px solid transparent;
    }
    
    .pss-wildlife-card-link:hover {
        color: var(--color-primary-light);
        border-bottom-color: var(--color-primary-accent);
    }
    
    /* Pagination Dots */
    .pss-carousel-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: var(--space-xs);
        margin-top: var(--space-lg);
    }
    
    .pss-carousel-dot {
        width: 8px;
        height: 8px;
        border-radius: var(--radius-full);
        background: #c8d6e5;
        cursor: pointer;
        transition: all var(--transition-fast);
        border: none;
        padding: 0;
    }
    
    .pss-carousel-dot.active {
        background: var(--color-info);
        width: 10px;
        height: 10px;
    }
    
    .pss-carousel-dot:hover:not(.active) {
        background: #8395a7;
    }
    
    /* Tablet View */
    @media (max-width: 1024px) {
        .pss-wildlife-card {
            flex: 0 0 calc(50% - 10px);
        }
        
        .pss-carousel-wrapper {
            padding: 0 20px;
        }
        
        .pss-carousel-track {
            gap: 15px;
        }
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .pss-wrapper {
            margin-left: 0;
            width: 100%;
        }
        
        .pss-scroll-container {
            height: auto;
            overflow-y: visible;
            scroll-snap-type: none;
        }
        
        .pss-snap-section {
            min-height: auto;
            scroll-snap-align: none;
            padding: var(--space-3xl) var(--space-lg);
        }
        
        .pss-progress {
            display: none;
        }
        
        .pss-scroll-hint {
            display: none;
        }
        
        .pss-trust-container {
            flex-direction: column;
            gap: var(--space-xl);
        }
        
        .pss-trust-badge {
            width: clamp(180px, 60vw, 250px);
            height: clamp(180px, 60vw, 250px);
        }
        
        /* Wildlife Carousel Mobile */
        .pss-wildlife-card {
            flex: 0 0 calc(100% - var(--space-sm));
            max-width: 100%;
        }
        
        .pss-carousel-wrapper {
            padding: 0 var(--space-md);
        }
        
        .pss-carousel-track {
            gap: var(--space-sm);
            padding: 0;
        }
        
        .pss-wildlife-section {
            padding: var(--space-2xl) 0;
        }
        
        .pss-wildlife-header {
            padding: 0 var(--space-md);
        }
    }
    
    /* Hero Section Styles - Comprehensive Solution */
    .pss-hero-section {
        --hero-padding: 20px;
        --hero-min-height: 100vh;
        --hero-green: rgba(32, 61, 10, 0.87);
        --hero-yellow: #ffd906;
        --hero-white: #ffffff;
        
        position: relative;
        min-height: var(--hero-min-height);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;  /* Contain all elements within section */
        box-sizing: border-box;
    }
    
    /* Background Layers */
    .pss-hero-bg-wrapper {
        position: absolute;
        inset: 0;
        z-index: 0;
    }
    
    .pss-hero-bg-primary {
        position: absolute;
        inset: 0;
        /* Fallback gradient - background image will be set via inline style */
        background: linear-gradient(135deg, #2C5F72 0%, #4A90A4 30%, #6B8C9B 70%, #2C5F72 100%);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }
    
    .pss-hero-bg-overlay {
        position: absolute;
        inset: 0;
        /* Subtle texture overlay */
        background: linear-gradient(45deg, rgba(32, 61, 10, 0.3) 0%, transparent 60%);
        background-size: cover;
        background-position: left bottom;
        background-repeat: no-repeat;
    }
    
    /* Main Content Container */
    .pss-hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
        height: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: var(--hero-padding);
        display: flex;
        align-items: center;  /* Center vertically */
        justify-content: center;
    }
    
    /* Decorative Plank */
    .pss-hero-plank {
        position: absolute;
        top: clamp(100px, 18vh, 180px);  /* Position near top where headline will be */
        left: -14%;
        width: 65%;
        height: auto;
        z-index: 5;
        pointer-events: none;
    }
    
    /* Brush Background behind truck */
    .pss-hero-brush {
        position: absolute;
        bottom: 0%;
        left: -5%;
        width: 80%;
        height: 70%;
        z-index: 7;
        pointer-events: none;
        background-size: cover;
        background-position: left bottom;
        background-repeat: no-repeat;
        opacity: 0.8;
    }

    /* Truck/Vehicle Image - Positioned to be visible */
    .pss-hero-truck {
        position: absolute;
        bottom: 5%;  /* Percentage-based for better responsiveness */
        left: -5%;   /* Closer to ensure visibility */
        z-index: 8;
        pointer-events: none;
    }
    
    .pss-hero-truck img {
        width: clamp(400px, 50vw, 700px);  /* Responsive sizing */
        height: auto;
        filter: drop-shadow(10px 20px 10px rgba(0,0,0,0.6));
    }
    
    /* Main Content Grid - Two Columns */
    .pss-hero-main {
        display: flex;
        flex-wrap: nowrap;
        align-items: flex-start;  /* Align to top to work with plank */
        justify-content: space-between;
        gap: 40px;
        z-index: 15;
        width: 100%;
        position: relative;
        height: 100%;  /* Use full height */
    }
    
    /* Left Column - Headline */
    .pss-hero-left {
        flex: 1 1 50%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding-right: 20px;
        margin-top: clamp(80px, 12vh, 140px);  /* Align with plank */
    }
    
    /* Right Column - Form and Badge */
    .pss-hero-right {
        flex: 1 1 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 25px;
        max-width: 500px;
        padding: 60px 0;  /* Ensure adequate padding for form and badge */
        margin: auto 0;  /* Center vertically within available space */
    }
    
    /* Headline Styling */
    .pss-hero-headline h1 {
        font-family: "Montserrat", sans-serif;
        font-size: clamp(1.5rem, 4vw, 2.2rem);
        font-weight: 900;
        line-height: 1.12;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--hero-white);
        margin: 0;
        filter: drop-shadow(2px 2px 1px #203D0A) 
                drop-shadow(-2px -2px 1px #203D0A) 
                drop-shadow(-2px 2px 1px #203D0A) 
                drop-shadow(2px -2px 1px #203D0A);
    }
    
    .pss-hero-headline h1 span {
        color: var(--hero-yellow);
    }
    
    /* Form Container */
    .pss-hero-form-container {
        background-color: var(--hero-green);
        border: 1px solid rgba(255, 217, 6, 0.3);
        border-radius: 12px;
        padding: 25px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        width: 100%;
        max-width: 450px;
    }
    
    .pss-hero-form-container h2 {
        color: var(--hero-white);
        font-size: var(--font-size-xl);
        font-weight: var(--font-weight-semibold);
        margin: 0;
        text-align: center;
    }
    
    .pss-hero-divider {
        width: 250px;
        height: 2px;
        background-color: var(--hero-yellow);
        margin: 10px 0;
    }
    
    /* Form Wrapper */
    .pss-hero-form {
        width: 100%;
        max-width: 500px;
    }
    
    /* Google Review Badge */
    .pss-hero-badge-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 20px;  /* Add bottom margin to prevent cutoff */
        position: relative;
        z-index: 10;
    }
    
    .pss-hero-badge {
        width: 200px;
        height: 200px;
        min-height: 200px;
        flex-shrink: 0;  /* Prevent badge from shrinking */
        background-color: rgba(32, 61, 10, 0.87);
        border: 1px solid rgba(255, 217, 6, 0.3);
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0px 10px 20px rgba(0,0,0,0.4);
        text-decoration: none;
        transition: transform 0.3s ease;
        box-sizing: border-box;
    }
    
    .pss-hero-badge:hover {
        transform: scale(1.05);
    }
    
    .pss-hero-google-icon {
        width: 60px;
        height: 60px;
        margin-top: -10px;
    }
    
    .pss-hero-google-icon path {
        fill: var(--hero-white);  /* White color for icon */
    }
    
    .pss-hero-stars {
        color: var(--hero-yellow);
        font-size: 1.5rem;
        margin: 10px 0;
    }
    
    .pss-hero-badge-text {
        color: var(--hero-white);
        text-align: center;
    }
    
    .pss-hero-badge-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 5px;
        color: var(--hero-white);
    }
    
    .pss-hero-badge-subtitle {
        font-size: 0.9rem;
        color: var(--hero-yellow);
    }
    
    /* Remove raccoon character - not visible in screenshot */
    /* Focus on truck image instead */
    
    /* ===== WHY CHOOSE SECTION STYLES ===== */
    .pss-why-choose-section {
        background: var(--color-bg-white);
        padding: var(--space-4xl) var(--space-lg);
    }
    
    .pss-why-choose-section .pss-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--space-3xl);
    }
    
    /* Badge Images Container */
    .pss-badges-container {
        display: flex;
        justify-content: center;
        gap: var(--space-3xl);
        width: 100%;
        flex-wrap: wrap;
    }
    
    .pss-badge {
        flex: 0 0 auto;
        transition: transform var(--transition-base);
    }
    
    .pss-badge:hover {
        transform: scale(1.05);
    }
    
    .pss-badge img {
        width: 180px;
        height: auto;
        object-fit: contain;
    }
    
    /* Main Heading */
    .pss-why-choose-heading {
        font-size: var(--font-size-4xl);
        color: var(--color-primary-dark);
        text-align: center;
        font-weight: var(--font-weight-bold);
        margin: 0;
        line-height: var(--line-height-tight);
    }
    
    /* Features Row */
    .pss-features-row {
        display: flex;
        justify-content: center;
        gap: var(--space-4xl);
        width: 100%;
        flex-wrap: wrap;
    }
    
    .pss-feature {
        flex: 0 1 auto;
        text-align: center;
    }
    
    .pss-feature h3 {
        color: var(--color-success);
        font-size: var(--font-size-xl);
        font-weight: var(--font-weight-semibold);
        margin: 0;
        transition: color var(--transition-fast);
    }
    
    .pss-feature h3:hover {
        color: var(--color-success-dark);
    }
    
    /* Statistics Container */
    .pss-stats-container {
        display: flex;
        justify-content: center;
        gap: var(--space-2xl);
        width: 100%;
        flex-wrap: wrap;
    }
    
    .pss-stat-card {
        background: var(--color-bg-light);
        border-radius: var(--radius-lg);
        padding: var(--space-xl) var(--space-2xl);
        text-align: center;
        flex: 0 1 280px;
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-base);
    }
    
    .pss-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    .pss-stat-number {
        font-size: var(--font-size-3xl);
        font-weight: var(--font-weight-bold);
        color: var(--color-success);
        margin-bottom: var(--space-sm);
    }
    
    .pss-stat-label {
        font-size: var(--font-size-base);
        color: var(--color-text-secondary);
        font-weight: var(--font-weight-medium);
        line-height: var(--line-height-relaxed);
    }
    
    /* Local Experts */
    .pss-local-experts {
        text-align: center;
    }
    
    .pss-local-experts h3 {
        font-size: var(--font-size-2xl);
        color: var(--color-success);
        margin: 0 0 var(--space-sm) 0;
        font-weight: var(--font-weight-semibold);
    }
    
    .pss-local-experts p {
        font-size: var(--font-size-lg);
        color: var(--color-text-secondary);
        margin: 0;
    }
    
    /* Why Choose Section Responsive */
    @media (max-width: 768px) {
        .pss-why-choose-section {
            padding: var(--space-3xl) var(--space-md);
        }
        
        .pss-why-choose-section .pss-content {
            gap: var(--space-2xl);
        }
        
        .pss-badges-container {
            gap: var(--space-xl);
        }
        
        .pss-badge img {
            width: 140px;
        }
        
        .pss-features-row {
            flex-direction: column;
            gap: var(--space-xl);
        }
        
        .pss-feature h3 {
            font-size: var(--font-size-lg);
        }
        
        .pss-stats-container {
            flex-direction: column;
            align-items: center;
            gap: var(--space-lg);
        }
        
        .pss-stat-card {
            width: 100%;
            max-width: 350px;
            padding: var(--space-lg) var(--space-xl);
        }
    }
    
    @media (max-width: 480px) {
        .pss-why-choose-section {
            padding: var(--space-2xl) var(--space-sm);
        }
        
        .pss-why-choose-section .pss-content {
            gap: var(--space-xl);
        }
        
        .pss-badge img {
            width: 100px;
        }
        
        .pss-why-choose-heading {
            font-size: 1.8rem;
        }
        
        .pss-stat-number {
            font-size: 2rem;
        }
    }
    /* ===== END WHY CHOOSE SECTION ===== */
    
    /* Responsive Design - Comprehensive Solution */
    @media (max-width: 1119px) {
        .pss-hero-plank {
            width: 80%;
            left: -30%;
        }
        
        .pss-hero-truck {
            bottom: 3%;  /* Keep visible */
            left: -8%;
        }
        
        .pss-hero-truck img {
            width: clamp(350px, 45vw, 600px);
        }
    }
    
    @media (max-width: 1023px) {
        .pss-hero-left,
        .pss-hero-right {
            flex: 0 0 100%;
        }
        
        .pss-hero-left {
            margin-top: 40px;  /* Less margin on tablet */
        }
        
        .pss-hero-section {
            --hero-min-height: auto;
            min-height: 100vh;
        }
        
        .pss-hero-plank {
            position: absolute;
            top: 100px;
            left: 0;
            right: 0;
            width: 100%;
        }
        
        .pss-hero-bg-overlay {
            background-size: 200vw auto;
        }
        
        .pss-hero-headline h1 {
            text-align: center;
            font-size: clamp(1.8rem, 6vw, 2.5rem);
        }
        
        .pss-hero-truck {
            position: absolute;
            left: -15%;
            bottom: 50px;
        }
        
        .pss-hero-truck img {
            width: 600px;
        }
    }
    
    @media (max-width: 767px) {
        .pss-hero-bg-primary {
            background-position: 64% center;
        }
        
        .pss-hero-plank {
            top: 125px;
        }
        
        .pss-hero-headline h1 {
            font-size: clamp(1.2rem, 5vw, 1.8rem);
        }
        
        .pss-hero-form-container {
            padding: 15px;
        }
        
        .pss-hero-divider {
            width: 100%;
            max-width: 200px;
        }
    }
    
    @media (max-width: 479px) {
        .pss-hero-section {
            padding-top: 120px;
        }
        
        .pss-hero-bg-overlay {
            background-size: 250vw auto;
        }
        
        .pss-hero-plank {
            left: -25%;
            min-width: 600px;
        }
        
        .pss-hero-headline h1 {
            font-size: 6.7vw;
        }
        
        .pss-hero-truck img {
            max-width: 100%;
            width: 100%;
        }
    }
    
    /* ===== WILDLIFE CONTROL & PREVENTION SERVICES SECTION ===== */
    .pss-wildlife-control-section {
        background: linear-gradient(135deg, #6ab04c 0%, #5a9b3d 100%);
        padding: var(--space-2xl) var(--space-lg);
        position: relative;
        overflow: visible;
    }
    
    .pss-wildlife-control-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect width="100" height="100" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></svg>');
        background-size: 50px 50px;
        pointer-events: none;
    }
    
    .pss-control-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    
    /* Main Heading */
    .pss-control-heading {
        font-size: var(--font-size-2xl);
        color: white;
        text-align: center;
        font-weight: var(--font-weight-bold);
        margin: 0 0 var(--space-xl) 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        line-height: var(--line-height-tight);
    }
    
    /* Central Card */
    .pss-control-card-center {
        background: white;
        border-radius: var(--radius-lg);
        padding: var(--space-lg) var(--space-xl);
        text-align: center;
        margin: calc(50px + var(--space-md)) auto var(--space-xl);
        max-width: 750px;
        box-shadow: var(--shadow-xl);
        position: relative;
    }
    
    .pss-control-badge-center {
        position: absolute;
        top: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 140px;
        height: 140px;
        object-fit: contain;
        background: white;
        border-radius: 50%;
        padding: var(--space-sm);
        box-shadow: var(--shadow-lg);
    }
    
    .pss-control-card-title {
        font-size: var(--font-size-lg);
        color: var(--color-primary-dark);
        font-weight: var(--font-weight-bold);
        margin: calc(90px + var(--space-sm)) 0 var(--space-sm) 0;
        line-height: var(--line-height-tight);
    }
    
    .pss-control-card-text {
        font-size: var(--font-size-sm);
        color: var(--color-text-secondary);
        line-height: var(--line-height-normal);
        margin-bottom: var(--space-md);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Control Buttons */
    .pss-control-buttons {
        display: flex;
        justify-content: center;
        gap: var(--space-lg);
        flex-wrap: wrap;
    }
    
    .pss-control-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: var(--button-padding-y) var(--button-padding-x);
        background: var(--button-primary-bg);
        color: white;
        font-size: var(--button-font-size);
        font-weight: var(--button-font-weight);
        line-height: var(--button-line-height);
        text-decoration: none;
        border: 1px solid transparent;
        border-radius: var(--button-border-radius);
        transition: all var(--transition-button);
        cursor: pointer;
        user-select: none;
        min-height: 50px;
        text-align: center;
    }
    
    .pss-control-btn:hover {
        background: var(--button-primary-hover-bg);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(255, 112, 0, 0.25);
    }
    
    .pss-control-btn:active {
        transform: translateY(0);
    }
    
    /* Service Cards Row */
    .pss-control-cards-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-md);
        margin-top: calc(var(--space-xl) + 40px);
    }
    
    /* Individual Service Card */
    .pss-control-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: var(--space-md);
        text-align: center;
        box-shadow: var(--shadow-lg);
        position: relative;
        padding-top: calc(80px + var(--space-md));
        transition: all var(--transition-base);
    }
    
    .pss-control-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .pss-control-badge {
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 100px;
        object-fit: contain;
        background: white;
        border-radius: 50%;
        padding: var(--space-xs);
        box-shadow: var(--shadow-md);
    }
    
    .pss-control-card-heading {
        font-size: var(--font-size-base);
        color: var(--color-primary-dark);
        font-weight: var(--font-weight-bold);
        margin: 0 0 var(--space-xs) 0;
        line-height: var(--line-height-tight);
    }
    
    .pss-control-card-description {
        font-size: var(--font-size-xs);
        color: var(--color-text-secondary);
        line-height: var(--line-height-normal);
        margin-bottom: var(--space-md);
        min-height: 60px;
    }
    
    .pss-control-card-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: calc(var(--button-padding-y) * 0.75) var(--button-padding-x);
        background: var(--button-secondary-bg);
        color: var(--color-primary-dark);
        font-size: var(--button-font-size);
        font-weight: var(--button-font-weight);
        line-height: var(--button-line-height);
        text-decoration: none;
        border: var(--button-secondary-border);
        border-color: var(--color-primary-dark);
        border-radius: var(--button-border-radius);
        transition: all var(--transition-button);
        cursor: pointer;
        user-select: none;
        min-height: 44px;
    }
    
    .pss-control-card-btn:hover {
        background: var(--color-primary-dark);
        color: white;
        border-color: var(--color-primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(32, 61, 10, 0.2);
    }
    
    .pss-control-card-btn:active {
        transform: translateY(0);
    }
    
    /* Responsive Design */
    @media (max-width: 1024px) {
        .pss-control-cards-row {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .pss-control-card:last-child {
            grid-column: 1 / -1;
            max-width: 500px;
            margin: 0 auto;
        }
    }
    
    @media (max-width: 768px) {
        .pss-wildlife-control-section {
            padding: var(--space-3xl) var(--space-md);
        }
        
        .pss-control-heading {
            font-size: var(--font-size-3xl);
            margin-bottom: var(--space-2xl);
        }
        
        .pss-control-card-center {
            padding: var(--space-xl) var(--space-lg);
            margin-bottom: var(--space-2xl);
        }
        
        .pss-control-badge-center {
            width: 150px;
            height: 150px;
            top: -50px;
        }
        
        .pss-control-card-title {
            margin-top: calc(100px + var(--space-lg));
            font-size: var(--font-size-xl);
        }
        
        .pss-control-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .pss-control-btn {
            width: 100%;
            max-width: 300px;
        }
        
        .pss-control-cards-row {
            grid-template-columns: 1fr;
            gap: calc(var(--space-3xl) + 50px);
            margin-top: calc(var(--space-3xl) + 50px);
        }
        
        .pss-control-card {
            max-width: 400px;
            margin: 0 auto;
        }
    }
    
    @media (max-width: 480px) {
        .pss-control-heading {
            font-size: var(--font-size-2xl);
        }
        
        .pss-control-card-center {
            padding: var(--space-lg) var(--space-md);
        }
        
        .pss-control-badge-center {
            width: 120px;
            height: 120px;
            top: -40px;
        }
        
        .pss-control-card-title {
            margin-top: calc(80px + var(--space-md));
            font-size: var(--font-size-lg);
        }
        
        .pss-control-badge {
            width: 120px;
            height: 120px;
            top: -40px;
        }
        
        .pss-control-card {
            padding-top: calc(80px + var(--space-lg));
        }
    }
</style>

<div class="pss-wrapper">
    <div class="pss-scroll-container" id="pss-container">
        
        <!-- Hero Section -->
        <section id="pss-hero" class="pss-snap-section pss-hero-section">
            <!-- Background Layers -->
            <div class="pss-hero-bg-wrapper">
                <div class="pss-hero-bg-primary" style="background-image: url('<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/hero/cityscape-darker.webp'; ?>');"></div>
                <div class="pss-hero-bg-overlay"></div>
            </div>
            
            <!-- Decorative Plank -->
            <img class="pss-hero-plank" 
                 src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/hero/plank-but-smaller.webp'; ?>" 
                 alt="Decorative wooden plank"
                 loading="lazy">
            
            <!-- Main Content Container -->
            <div class="pss-hero-content">
                <div class="pss-hero-main">
                    <!-- Left Column - Headline -->
                    <div class="pss-hero-left">
                        <div class="pss-hero-headline">
                            <h1>Expert <span>Wildlife Removal</span> & <span>Animal Control Services</span><br> in SC & NC</h1>
                        </div>
                    </div>
                    
                    <!-- Right Column - Form and Badge -->
                    <div class="pss-hero-right">
                        <!-- Form Container -->
                        <div class="pss-hero-form-container">
                            <h2>Request A Free Consultation</h2>
                            <div class="pss-hero-divider"></div>
                            <div class="pss-hero-form">
                                <?php 
                                // Check if Fluent Forms is active and shortcode exists
                                if (shortcode_exists('fluentform')) {
                                    echo do_shortcode('[fluentform id="5"]');
                                } else {
                                    // Fallback form
                                    ?>
                                    <form class="pss-fallback-form" action="#" method="post">
                                        <div class="pss-form-step">
                                            <div class="pss-step-header">
                                                <span>Step 1 of 3 -</span>
                                                <div class="pss-progress-bar">
                                                    <div class="pss-progress-fill" style="width: 33%;"></div>
                                                </div>
                                            </div>
                                            <p><strong>Contact Information</strong></p>
                                            <div class="pss-form-row">
                                                <input type="text" name="first_name" placeholder="First Name" required>
                                                <input type="text" name="last_name" placeholder="Last Name" required>
                                            </div>
                                            <div class="pss-form-row">
                                                <input type="email" name="email" placeholder="Email Address" required>
                                                <input type="tel" name="phone" placeholder="Phone" required>
                                            </div>
                                            <button type="button" class="pss-btn-next">Next</button>
                                        </div>
                                    </form>
                                    <style>
                                        .pss-fallback-form {
                                            width: 100%;
                                        }
                                        .pss-form-step {
                                            display: flex;
                                            flex-direction: column;
                                            gap: var(--space-md);
                                        }
                                        .pss-step-header {
                                            color: white;
                                            font-size: var(--font-size-sm);
                                            margin-bottom: var(--space-sm);
                                        }
                                        .pss-progress-bar {
                                            height: 8px;
                                            background: rgba(255,255,255,0.2);
                                            border-radius: var(--radius-sm);
                                            margin-top: var(--space-xs);
                                        }
                                        .pss-progress-fill {
                                            height: 100%;
                                            background: var(--color-success);
                                            border-radius: var(--radius-sm);
                                            transition: width var(--transition-base);
                                        }
                                        .pss-form-row {
                                            display: flex;
                                            gap: var(--space-sm);
                                        }
                                        .pss-fallback-form input {
                                            flex: 1;
                                            padding: var(--space-sm) var(--space-md);
                                            border: none;
                                            border-bottom: 2px solid var(--hero-yellow);
                                            background: rgba(255,255,255,0.1);
                                            color: white;
                                            font-size: var(--font-size-base);
                                            transition: all var(--transition-fast);
                                        }
                                        .pss-fallback-form input::placeholder {
                                            color: rgba(255,255,255,0.7);
                                        }
                                        .pss-fallback-form input:focus {
                                            outline: none;
                                            background: rgba(255,255,255,0.15);
                                            border-bottom-color: var(--color-success);
                                        }
                                        .pss-btn-next {
                                            align-self: flex-end;
                                            padding: var(--space-sm) var(--space-xl);
                                            background: var(--color-success);
                                            color: white;
                                            border: none;
                                            border-radius: var(--radius-sm);
                                            font-size: var(--font-size-base);
                                            font-weight: var(--font-weight-bold);
                                            cursor: pointer;
                                            transition: all var(--transition-fast);
                                        }
                                        .pss-btn-next:hover {
                                            background: var(--color-success-dark);
                                            transform: translateY(-2px);
                                            box-shadow: var(--shadow-md);
                                        }
                                    </style>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        
                        <!-- Google Review Badge -->
                        <div class="pss-hero-badge-container">
                            <a href="https://g.co/kgs/DwhpN7n" target="_blank" class="pss-hero-badge">
                                <svg class="pss-hero-google-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M16.319 13.713v5.487h9.075c-0.369 2.356-2.744 6.9-9.075 6.9-5.463 0-9.919-4.525-9.919-10.1s4.456-10.1 9.919-10.1c3.106 0 5.188 1.325 6.375 2.469l4.344-4.181c-2.788-2.612-6.4-4.188-10.719-4.188-8.844 0-16 7.156-16 16s7.156 16 16 16c9.231 0 15.363-6.494 15.363-15.631 0-1.050-0.113-1.85-0.25-2.65l-15.113-0.006z" fill="currentColor"></path>
                                </svg>
                                <div class="pss-hero-stars">★★★★★</div>
                                <div class="pss-hero-badge-text">
                                    <div class="pss-hero-badge-title">5 Star Rating</div>
                                    <div class="pss-hero-badge-subtitle">Over 90 Reviews</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Brush Background behind truck -->
            <div class="pss-hero-brush" style="background-image: url('<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/hero/brushbg-alt-small-scaled-1.webp'; ?>');"></div>
            
            <!-- Truck Image - Absolutely Positioned -->
            <div class="pss-hero-truck">
                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/hero/truck-edit.webp'; ?>" 
                     alt="Palmetto Wildlife Extractors Truck"
                     loading="lazy">
            </div>
        </section>
        
        <!-- Section 1: Why Choose -->
        <section id="pss-why-choose" class="pss-snap-section pss-why-choose-section">
            <div class="pss-content">
                <!-- Badge Images -->
                <div class="pss-badges-container">
                    <div class="pss-badge">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-prevention.webp'; ?>" 
                             alt="Wildlife Prevention" 
                             loading="lazy">
                    </div>
                    <div class="pss-badge">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-removal.webp'; ?>" 
                             alt="Wildlife Removal" 
                             loading="lazy">
                    </div>
                    <div class="pss-badge">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-remediation.webp'; ?>" 
                             alt="Wildlife Remediation" 
                             loading="lazy">
                    </div>
                </div>
                
                <!-- Main Heading -->
                <h2 class="pss-why-choose-heading">Why Choose Palmetto Wildlife Extractors?</h2>
                
                <!-- Two Column Features -->
                <div class="pss-features-row">
                    <div class="pss-feature">
                        <h3>Licensed, Certified, & Insured Professionals</h3>
                    </div>
                    <div class="pss-feature">
                        <h3>Eco-Friendly & Humane Practices</h3>
                    </div>
                </div>
                
                <!-- Statistics Cards -->
                <div class="pss-stats-container">
                    <div class="pss-stat-card">
                        <div class="pss-stat-number">10,000+</div>
                        <div class="pss-stat-label">Satisfied Customers</div>
                    </div>
                    <div class="pss-stat-card">
                        <div class="pss-stat-number">30+</div>
                        <div class="pss-stat-label">Years of Combined Experience</div>
                    </div>
                    <div class="pss-stat-card">
                        <div class="pss-stat-number">24/7</div>
                        <div class="pss-stat-label">Emergency Wildlife Removal Services</div>
                    </div>
                </div>
                
                <!-- Local Experts -->
                <div class="pss-local-experts">
                    <h3>Local Experts</h3>
                    <p>in South Carolina & North Carolina</p>
                </div>
            </div>
        </section>
        
        <!-- Section 2: Trust Badges -->
        <section id="pss-services" class="pss-snap-section pss-trust-badges">
            <!-- TrustIndex Widget Container -->
            <div class="pss-trustindex-container">
                <!-- TrustIndex widget placeholder - the script will populate this -->
                <div id="ti-widget-container-cfc8cc643d5d833d873607bd747"></div>
            </div>
            
            <!-- Trust Badges Container -->
            <div class="pss-trust-container">
                
                <!-- Google Reviews Badge -->
                <a href="https://g.co/kgs/DwhpN7n" target="_blank" class="pss-trust-badge google">
                    <div class="pss-badge-icon">G</div>
                    <div class="pss-badge-stars">
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                    </div>
                    <div class="pss-badge-title">5 Star Rating</div>
                    <div class="pss-badge-subtitle">Over 90 Reviews</div>
                </a>

                <!-- BBB Badge -->
                <a href="https://www.bbb.org/us/sc/columbia/profile/animal-trapping/palmetto-wildlife-extractors-0663-34103856" target="_blank" class="pss-trust-badge bbb">
                    <div class="pss-bbb-logo">BBB</div>
                    <div class="pss-bbb-text">Better Business<br>Bureau</div>
                    <div class="pss-badge-subtitle">Accredited Business</div>
                </a>

                <!-- Facebook Reviews Badge -->
                <a href="https://www.facebook.com/PalmettoWildlifeExtractor/" target="_blank" class="pss-trust-badge facebook">
                    <div class="pss-badge-icon">f</div>
                    <div class="pss-badge-stars">
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <svg viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                    </div>
                    <div class="pss-badge-title">5 Star Rating</div>
                    <div class="pss-badge-subtitle">Over 40 Reviews</div>
                </a>
                
            </div>
        </section>
        
        <!-- Section 3: Comprehensive Wildlife Removal Services -->
        <section id="pss-wildlife-control" class="pss-snap-section pss-wildlife-section">
            <!-- Header Section -->
            <div class="pss-wildlife-header">
                <h2>Comprehensive Wildlife Removal Services</h2>
                <p>Our expert team provides <strong>safe, humane, and effective wildlife control solutions</strong> for homes and businesses. From identifying infestations to securing your property, we handle every step of the process.</p>
                <a href="/wildlife-removal/" class="pss-btn-primary">View All Wildlife Removal Services</a>
            </div>
            
            <!-- Carousel Section -->
            <div class="pss-carousel-wrapper">
                <!-- Carousel Container -->
                <div class="pss-carousel-container">
                    <div class="pss-carousel-track" id="wildlife-carousel-track">
                        
                        <!-- Squirrel Removal -->
                        <a href="/wildlife-removal/squirrels/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Squirrel-Isolated-Color-Corrected.webp'; ?>" 
                                     alt="Squirrel Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Squirrel Removal</h3>
                                <p class="pss-wildlife-card-description">Squirrels can cause serious damage by chewing through walls, insulation, and electrical wiring. Our humane squirrel removal services ensure safe removal and prevention.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Snake Removal -->
                        <a href="/wildlife-removal/snakes/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Snake-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Snake Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Snake Removal</h3>
                                <p class="pss-wildlife-card-description">Whether venomous or non-venomous, snakes can pose serious dangers. We provide professional snake identification and removal services to ensure your property is safe.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Raccoon Removal -->
                        <a href="/wildlife-removal/raccoons/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Raccoon-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Raccoon Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Raccoon Removal</h3>
                                <p class="pss-wildlife-card-description">Raccoons in attics and crawl spaces can cause extensive damage. Our experts safely remove raccoons and implement exclusion techniques to prevent re-entry.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Opossum Removal -->
                        <a href="/wildlife-removal/opossums/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Opossum-Isolated-Color-Corrected.webp'; ?>" 
                                     alt="Opossum Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Opossum Removal</h3>
                                <p class="pss-wildlife-card-description">Opossums often seek shelter in attics, sheds, and under porches. We humanely trap and relocate these animals while securing entry points.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Bat Removal (Note: No bat image available, using placeholder) -->
                        <a href="/wildlife-removal/bats/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <!-- Bat image placeholder - no bat image in assets -->
                                <div style="font-size: 3rem; color: #6c757d;">🦇</div>
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Bat Removal</h3>
                                <p class="pss-wildlife-card-description">Bats in your home pose health risks. Our bat exclusion services safely remove colonies and prevent re-entry while complying with wildlife protection laws.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Rat/Rodent Removal -->
                        <a href="/wildlife-removal/rats/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Rat-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Rat Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Rat & Rodent Removal</h3>
                                <p class="pss-wildlife-card-description">Rats and mice can spread diseases and cause property damage. Our comprehensive rodent control includes removal, exclusion, and prevention strategies.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Skunk Removal -->
                        <a href="/wildlife-removal/skunks/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Skunk-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Skunk Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Skunk Removal</h3>
                                <p class="pss-wildlife-card-description">Skunks under structures pose odor and disease risks. We safely trap and remove skunks while implementing exclusion methods to prevent future problems.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Beaver Removal -->
                        <a href="/wildlife-removal/beavers/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Beaver-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Beaver Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Beaver Removal</h3>
                                <p class="pss-wildlife-card-description">Beavers can cause flooding and property damage. Our beaver management services include dam removal and population control to protect your property.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Pigeon/Bird Removal -->
                        <a href="/wildlife-removal/birds/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Pigeon-Isolated-Color-Corrected.webp'; ?>" 
                                     alt="Bird Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Bird & Pigeon Control</h3>
                                <p class="pss-wildlife-card-description">Birds nesting in buildings create health hazards. We provide humane bird removal and deterrent installation to keep your property bird-free.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Mole Removal -->
                        <a href="/wildlife-removal/moles/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Mole-Isolated-Color-Corrected.webp'; ?>" 
                                     alt="Mole Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Mole Removal</h3>
                                <p class="pss-wildlife-card-description">Moles destroy lawns and gardens with their tunneling. Our mole control services eliminate current populations and prevent future lawn damage.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Coyote Removal -->
                        <a href="/wildlife-removal/coyotes/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Coyote-Isolated-Color-Corrected-scaled.webp'; ?>" 
                                     alt="Coyote Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Coyote Removal</h3>
                                <p class="pss-wildlife-card-description">Coyotes near residential areas pose risks to pets and people. Our coyote management includes deterrence, hazing, and safe removal when necessary.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                        <!-- Feral Hog Removal -->
                        <a href="/wildlife-removal/feral-hogs/" class="pss-wildlife-card">
                            <div class="pss-wildlife-card-image">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/animals/Feral-Hog-Isolated-Color-Corrected.webp'; ?>" 
                                     alt="Feral Hog Removal" loading="lazy">
                            </div>
                            <div class="pss-wildlife-card-content">
                                <h3 class="pss-wildlife-card-title">Feral Hog Removal</h3>
                                <p class="pss-wildlife-card-description">Feral hogs cause extensive property and crop damage. Our hog control services include trapping and removal to protect your land and livelihood.</p>
                                <span class="pss-wildlife-card-link">Learn More</span>
                            </div>
                        </a>
                        
                    </div>
                </div>
                
                <!-- Pagination Dots -->
                <div class="pss-carousel-dots" id="wildlife-carousel-dots"></div>
            </div>
        </section>
        
        <!-- Section 4: Wildlife Control & Prevention Services -->
        <section id="pss-wildlife-control" class="pss-snap-section pss-wildlife-control-section">
            <div class="pss-control-content">
                <!-- Main Heading -->
                <h1 class="pss-control-heading">Wildlife Control & Prevention Services</h1>
                
                <!-- Central Card with Badge -->
                <div class="pss-control-card-center">
                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/general-commercial-wildlife-control-corrected.webp'; ?>" 
                         alt="Wildlife Control General & Commercial" 
                         class="pss-control-badge-center"
                         loading="lazy">
                    
                    <h3 class="pss-control-card-title">General & Commercial<br>Wildlife Control</h3>
                    
                    <p class="pss-control-card-text">
                        Whether you're managing a home, office, warehouse, or retail space, wildlife issues can disrupt 
                        daily operations and pose health and safety risks. We offer customized wildlife control solutions for 
                        both residential and commercial properties, ensuring effective and humane removal tailored to your 
                        specific environment.
                    </p>
                    
                    <div class="pss-control-buttons">
                        <a href="#" class="pss-control-btn">General Control</a>
                        <a href="#" class="pss-control-btn">Commercial Control</a>
                    </div>
                </div>
                
                <!-- Three Service Cards -->
                <div class="pss-control-cards-row">
                    <!-- Prevention Card -->
                    <div class="pss-control-card">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-prevention.webp'; ?>" 
                             alt="Wildlife Prevention" 
                             class="pss-control-badge"
                             loading="lazy">
                        
                        <h3 class="pss-control-card-heading">Wildlife<br>Prevention</h3>
                        
                        <p class="pss-control-card-description">
                            Our wildlife prevention services include sealing entry points, habitat 
                            modification, and deterrent installation to protect your home.
                        </p>
                        
                        <a href="#" class="pss-control-card-btn">Learn More</a>
                    </div>
                    
                    <!-- Remediation Card -->
                    <div class="pss-control-card">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-remediation.webp'; ?>" 
                             alt="Wildlife Remediation" 
                             class="pss-control-badge"
                             loading="lazy">
                        
                        <h3 class="pss-control-card-heading">Wildlife<br>Remediation</h3>
                        
                        <p class="pss-control-card-description">
                            After wildlife has been removed, damage and contamination often remain. 
                            Our remediation services include cleanup, sanitization, odor removal, and 
                            structural repairs to restore your property to a safe, healthy condition and 
                            prevent future infestations.
                        </p>
                        
                        <a href="#" class="pss-control-card-btn">Learn More</a>
                    </div>
                    
                    <!-- Removal Card -->
                    <div class="pss-control-card">
                        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'assets/images/badges/module-wildlife-removal.webp'; ?>" 
                             alt="Wildlife Removal" 
                             class="pss-control-badge"
                             loading="lazy">
                        
                        <h3 class="pss-control-card-heading">Emergency<br>Wildlife Removal</h3>
                        
                        <p class="pss-control-card-description">
                            Need immediate assistance? Our 24/7 emergency wildlife removal services 
                            ensure fast, effective solutions for urgent wildlife problems.
                        </p>
                        
                        <a href="#" class="pss-control-card-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section 5: Our Process -->
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
        
        <!-- Section 6: CTA -->
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
            
            <!-- Scroll hint -->
            <div class="pss-scroll-hint">
                <p style="font-size: 0.9rem; margin-bottom: 5px;">Continue scrolling</p>
                <svg width="20" height="20" viewBox="0 0 384 512" fill="currentColor" opacity="0.6">
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
    
    // Add class to body for CSS targeting
    document.body.classList.add('pss-active');
    
    function initFinalScroll() {
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
            setTimeout(initFinalScroll, 100);
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
        
        // FIXED: Better scroll handling without lag
        let isTransitioning = false;
        
        container.addEventListener('wheel', function(e) {
            // Don't interfere during transition
            if (isTransitioning) {
                e.preventDefault();
                return;
            }
            
            const scrollTop = container.scrollTop;
            const scrollHeight = container.scrollHeight;
            const clientHeight = container.clientHeight;
            const atBottom = (scrollHeight - clientHeight - scrollTop) <= 1;
            const atTop = scrollTop <= 1;
            
            // If at bottom and scrolling down
            if (atBottom && e.deltaY > 0) {
                // Don't prevent default - let browser handle it naturally
                isTransitioning = true;
                
                // Temporarily disable container scroll
                container.style.pointerEvents = 'none';
                container.style.overflow = 'hidden';
                
                // Re-enable after a brief moment
                setTimeout(() => {
                    container.style.pointerEvents = '';
                    container.style.overflow = '';
                    isTransitioning = false;
                }, 50);
                
                return; // Let the event bubble naturally
            }
            
            // If page is scrolled and at top of container scrolling up
            if (window.pageYOffset > 0 && atTop && e.deltaY < 0) {
                // Let page scroll handle it
                container.style.pointerEvents = 'none';
                
                setTimeout(() => {
                    container.style.pointerEvents = '';
                }, 50);
                
                return;
            }
            
            // Otherwise, let container handle the scroll
            e.stopPropagation();
        }, { passive: true });
        
        // Monitor page scroll for returning to container
        let lastPageScroll = 0;
        window.addEventListener('scroll', function() {
            const currentPageScroll = window.pageYOffset;
            const containerTop = container.getBoundingClientRect().top;
            
            // If scrolling up and container is coming into view
            if (currentPageScroll < lastPageScroll && containerTop >= 0 && containerTop < 100) {
                // Focus back on container
                if (container.scrollTop < container.scrollHeight - container.clientHeight - 10) {
                    container.style.pointerEvents = '';
                    container.style.overflow = '';
                }
            }
            
            lastPageScroll = currentPageScroll;
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
            
            const currentIndex = Array.from(dots).findIndex(dot => dot.classList.contains('active'));
            const atLastSection = currentIndex === sections.length - 1;
            const scrollTop = container.scrollTop;
            const scrollHeight = container.scrollHeight;
            const clientHeight = container.clientHeight;
            const atBottom = (scrollHeight - clientHeight - scrollTop) <= 1;
            
            if (e.key === 'ArrowDown' || e.key === ' ') {
                // If at last section and bottom, let page scroll
                if (atLastSection && atBottom) {
                    return;
                }
                
                e.preventDefault();
                if (currentIndex < sections.length - 1) {
                    sections[currentIndex + 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else if (e.key === 'ArrowUp') {
                // If page is scrolled, let it handle
                if (window.pageYOffset > 0) {
                    return;
                }
                
                e.preventDefault();
                if (currentIndex > 0) {
                    sections[currentIndex - 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
        
        console.log('[PSS] Final scroll initialized - smooth footer access enabled');
    }
    
    // Initialize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFinalScroll);
    } else {
        setTimeout(initFinalScroll, 100);
    }
})();
</script>

<!-- TrustIndex Widget Script -->
<script>
(function() {
    // Load TrustIndex widget script
    var script = document.createElement('script');
    script.src = 'https://cdn.trustindex.io/loader.js?cfc8cc643d5d833d873607bd747';
    script.defer = true;
    script.async = true;
    
    // Add error handling
    script.onerror = function() {
        console.error('[PSS] Failed to load TrustIndex widget');
    };
    
    script.onload = function() {
        console.log('[PSS] TrustIndex widget loaded');
    };
    
    document.head.appendChild(script);
})();
</script>

<!-- Wildlife Carousel JavaScript -->
<script>
(function() {
    'use strict';
    
    // Wildlife Carousel Implementation
    function initWildlifeCarousel() {
        const track = document.getElementById('wildlife-carousel-track');
        const dotsContainer = document.getElementById('wildlife-carousel-dots');
        
        if (!track || !dotsContainer) return;
        
        const cards = track.querySelectorAll('.pss-wildlife-card');
        
        let currentIndex = 0;
        let cardsPerView = 3;
        let autoPlayInterval;
        let isHovering = false;
        
        // Calculate cards per view based on viewport
        function calculateCardsPerView() {
            const width = window.innerWidth;
            if (width <= 768) {
                cardsPerView = 1;
            } else if (width <= 1024) {
                cardsPerView = 2;
            } else {
                cardsPerView = 3;
            }
        }
        
        // Create pagination dots
        function createDots() {
            dotsContainer.innerHTML = '';
            const totalDots = Math.ceil(cards.length / cardsPerView);
            
            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement('button');
                dot.className = 'pss-carousel-dot';
                dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                if (i === 0) dot.classList.add('active');
                
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
        }
        
        // Update carousel position
        function updateCarousel() {
            const cardWidth = 100 / cardsPerView;
            const offset = -currentIndex * cardWidth;
            track.style.transform = `translateX(${offset}%)`;
            
            // Update dots
            const dots = dotsContainer.querySelectorAll('.pss-carousel-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === Math.floor(currentIndex / cardsPerView));
            });
            
        }
        
        // Go to specific slide
        function goToSlide(dotIndex) {
            currentIndex = dotIndex * cardsPerView;
            if (currentIndex > cards.length - cardsPerView) {
                currentIndex = cards.length - cardsPerView;
            }
            updateCarousel();
        }
        
        // Next slide
        function nextSlide() {
            if (currentIndex < cards.length - cardsPerView) {
                currentIndex += cardsPerView;
                if (currentIndex > cards.length - cardsPerView) {
                    currentIndex = cards.length - cardsPerView;
                }
            } else {
                // Loop back to start
                currentIndex = 0;
            }
            updateCarousel();
        }
        
        // Previous slide
        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex -= cardsPerView;
                if (currentIndex < 0) currentIndex = 0;
            } else {
                // Loop to end
                currentIndex = Math.max(0, cards.length - cardsPerView);
            }
            updateCarousel();
        }
        
        // Auto-play functionality
        function startAutoPlay() {
            if (!isHovering) {
                autoPlayInterval = setInterval(nextSlide, 5000);
            }
        }
        
        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }
        
        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        
        function handleTouchStart(e) {
            touchStartX = e.changedTouches[0].screenX;
        }
        
        function handleTouchEnd(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        }
        
        // Touch events
        track.addEventListener('touchstart', handleTouchStart, { passive: true });
        track.addEventListener('touchend', handleTouchEnd, { passive: true });
        
        // Hover pause
        const carouselWrapper = document.querySelector('.pss-carousel-wrapper');
        carouselWrapper.addEventListener('mouseenter', () => {
            isHovering = true;
            stopAutoPlay();
        });
        
        carouselWrapper.addEventListener('mouseleave', () => {
            isHovering = false;
            startAutoPlay();
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            // Only work if carousel is in viewport
            const rect = carouselWrapper.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (isVisible) {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    stopAutoPlay();
                    startAutoPlay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    stopAutoPlay();
                    startAutoPlay();
                }
            }
        });
        
        // Responsive handling
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                const oldCardsPerView = cardsPerView;
                calculateCardsPerView();
                
                if (oldCardsPerView !== cardsPerView) {
                    currentIndex = 0;
                    createDots();
                    updateCarousel();
                }
            }, 250);
        });
        
        // Initialize
        calculateCardsPerView();
        createDots();
        updateCarousel();
        startAutoPlay();
        
        console.log('[PSS] Wildlife carousel initialized');
    }
    
    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWildlifeCarousel);
    } else {
        setTimeout(initWildlifeCarousel, 100);
    }
})();
</script>