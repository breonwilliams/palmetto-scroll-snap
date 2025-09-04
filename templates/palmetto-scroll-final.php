<?php
/**
 * Palmetto Scroll Snap - Clean Foundation
 * Core scroll-snap functionality with placeholder sections for redesign
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get plugin URL for assets
$plugin_url = plugin_dir_url(dirname(__FILE__));
$assets_url = $plugin_url . 'assets/';
?>

<!-- Palmetto Scroll Snap - Clean Foundation -->
<style>
    /* ===== CORE SCROLL SNAP CSS ONLY ===== */
    
    /* Kill smooth scroll globally */
    * {
        scroll-behavior: auto !important;
    }

    /* Body can scroll normally, but we'll manage when scroll-snap is active */
    html.pss-active,
    body.pss-active {
        margin: 0;
        padding: 0;
    }

    /* Main wrapper for scroll snap - stable container */
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

    /* Temporarily disable scroll-snap without breaking container */
    .pss-scroll-wrapper.snap-disabled {
        scroll-snap-type: none;
    }

    .pss-scroll-wrapper.snap-disabled .pss-snap-section {
        scroll-snap-align: none;
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
        position: relative;
        transition: all 0.3s ease;
    }

    .pss-progress-dot:hover {
        transform: scale(1.2);
    }

    .pss-progress-dot.active {
        background: #1a7efb;
        border-color: #1a7efb;
        transform: scale(1.3);
        box-shadow: 0 0 15px rgba(26, 126, 251, 0.6);
    }

    /* Custom scrollbar */
    .pss-scroll-wrapper::-webkit-scrollbar {
        width: 8px;
    }

    .pss-scroll-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
    }

    .pss-scroll-wrapper::-webkit-scrollbar-thumb {
        background: rgba(26, 126, 251, 0.3);
        border-radius: 4px;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        /* Disable scroll snap on mobile */
        .pss-scroll-wrapper {
            height: auto;
            overflow: visible;
            scroll-snap-type: none;
            position: static;
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

    /* ===== DESIGN SYSTEM FOUNDATION ===== */
    
    :root {
        /* === PRIMARY BRAND COLORS === */
        --brand-primary: #203D0A;       /* Dark forest green - primary brand */
        --brand-secondary: #6DAB3C;     /* Vibrant green - CTAs, accents */
        --brand-tertiary: #FFD906;      /* Golden yellow - highlights, energy */
        --brand-accent: #FF7000;        /* Vibrant orange - urgent actions */
        
        /* === NEUTRAL COLORS === */
        --neutral-white: #FFFFFF;       /* Pure white */
        --neutral-black: #121415;       /* Near black - primary text */
        --neutral-light: #EEEEEE;       /* Light gray - subtle backgrounds */
        --neutral-card: #F3F4F6;        /* Card gray - individual containers */
        --neutral-medium: #9CA3AF;      /* Medium gray - secondary text */
        --neutral-dark: #374151;        /* Dark gray - headings */
        
        /* === SEMANTIC COLORS === */
        --color-success: var(--brand-secondary);
        --color-warning: var(--brand-tertiary);
        --color-error: var(--brand-accent);
        --color-info: #3B82F6;
        
        /* === BACKGROUND COLORS === */
        --bg-primary: var(--neutral-white);
        --bg-secondary: var(--neutral-light);
        --bg-brand: var(--brand-primary);
        --bg-accent: var(--brand-secondary);
        
        /* === TEXT COLORS === */
        --text-primary: var(--neutral-black);
        --text-secondary: #121415;
        --text-inverse: var(--neutral-white);
        --text-brand: var(--brand-primary);
        
        /* === SPACING SYSTEM === */
        --space-xs: 0.25rem;    /* 4px */
        --space-sm: 0.5rem;     /* 8px */
        --space-md: 1rem;       /* 16px */
        --space-lg: 1.5rem;     /* 24px */
        --space-xl: 2rem;       /* 32px */
        --space-2xl: 3rem;      /* 48px */
        --space-3xl: 4rem;      /* 64px */
        --space-4xl: 6rem;      /* 96px */
        
        /* === BREAKPOINTS === */
        --breakpoint-sm: 576px;
        --breakpoint-md: 768px;
        --breakpoint-lg: 992px;
        --breakpoint-xl: 1200px;
        --breakpoint-2xl: 1400px;
        
        /* === CONTAINER MAX-WIDTHS === */
        --container-sm: 540px;
        --container-md: 720px;
        --container-lg: 960px;
        --container-xl: 1140px;
        --container-2xl: 1320px;
        
        /* === GRID SYSTEM === */
        --grid-columns: 12;
        --grid-gutter: 1.5rem;  /* 24px */
        --grid-margin: 1rem;    /* 16px */
        
        /* === TYPOGRAPHY === */
        --font-size-xs: 0.75rem;    /* 12px */
        --font-size-sm: 0.875rem;   /* 14px */
        --font-size-base: 1rem;     /* 16px */
        --font-size-lg: 1.125rem;   /* 18px */
        --font-size-xl: 1.25rem;    /* 20px */
        --font-size-2xl: 1.5rem;    /* 24px */
        --font-size-3xl: 1.875rem;  /* 30px */
        --font-size-4xl: 2.25rem;   /* 36px */
        --font-size-5xl: 3rem;      /* 48px */
        
        /* === SHADOWS === */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        
        /* === BORDER RADIUS === */
        --radius-sm: 0.25rem;   /* 4px */
        --radius-md: 0.5rem;    /* 8px */
        --radius-lg: 1rem;      /* 16px */
        --radius-full: 9999px;  /* Full rounded */
    }

    /* ===== RESPONSIVE GRID SYSTEM ===== */
    
    /* Container */
    .container {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        padding-left: var(--grid-margin);
        padding-right: var(--grid-margin);
    }
    
    @media (min-width: 576px) {
        .container {
            max-width: var(--container-sm);
            padding-left: var(--grid-gutter);
            padding-right: var(--grid-gutter);
        }
    }
    
    @media (min-width: 768px) {
        .container {
            max-width: var(--container-md);
        }
    }
    
    @media (min-width: 992px) {
        .container {
            max-width: var(--container-lg);
        }
    }
    
    @media (min-width: 1200px) {
        .container {
            max-width: var(--container-xl);
        }
    }
    
    @media (min-width: 1400px) {
        .container {
            max-width: var(--container-2xl);
        }
    }
    
    /* Row */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: calc(var(--grid-gutter) * -0.5);
        margin-right: calc(var(--grid-gutter) * -0.5);
    }
    
    /* Columns - Mobile First */
    [class*="col-"] {
        position: relative;
        width: 100%;
        padding-left: calc(var(--grid-gutter) * 0.5);
        padding-right: calc(var(--grid-gutter) * 0.5);
    }
    
    /* Base columns (xs - mobile) */
    .col-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
    .col-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
    .col-3 { flex: 0 0 25%; max-width: 25%; }
    .col-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
    .col-5 { flex: 0 0 41.666667%; max-width: 41.666667%; }
    .col-6 { flex: 0 0 50%; max-width: 50%; }
    .col-7 { flex: 0 0 58.333333%; max-width: 58.333333%; }
    .col-8 { flex: 0 0 66.666667%; max-width: 66.666667%; }
    .col-9 { flex: 0 0 75%; max-width: 75%; }
    .col-10 { flex: 0 0 83.333333%; max-width: 83.333333%; }
    .col-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
    .col-12 { flex: 0 0 100%; max-width: 100%; }
    .col { flex-basis: 0; flex-grow: 1; max-width: 100%; }
    
    /* Small devices (576px and up) */
    @media (min-width: 576px) {
        .col-sm-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
        .col-sm-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
        .col-sm-3 { flex: 0 0 25%; max-width: 25%; }
        .col-sm-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
        .col-sm-5 { flex: 0 0 41.666667%; max-width: 41.666667%; }
        .col-sm-6 { flex: 0 0 50%; max-width: 50%; }
        .col-sm-7 { flex: 0 0 58.333333%; max-width: 58.333333%; }
        .col-sm-8 { flex: 0 0 66.666667%; max-width: 66.666667%; }
        .col-sm-9 { flex: 0 0 75%; max-width: 75%; }
        .col-sm-10 { flex: 0 0 83.333333%; max-width: 83.333333%; }
        .col-sm-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
        .col-sm-12 { flex: 0 0 100%; max-width: 100%; }
    }
    
    /* Medium devices (768px and up) */
    @media (min-width: 768px) {
        .col-md-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
        .col-md-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
        .col-md-3 { flex: 0 0 25%; max-width: 25%; }
        .col-md-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
        .col-md-5 { flex: 0 0 41.666667%; max-width: 41.666667%; }
        .col-md-6 { flex: 0 0 50%; max-width: 50%; }
        .col-md-7 { flex: 0 0 58.333333%; max-width: 58.333333%; }
        .col-md-8 { flex: 0 0 66.666667%; max-width: 66.666667%; }
        .col-md-9 { flex: 0 0 75%; max-width: 75%; }
        .col-md-10 { flex: 0 0 83.333333%; max-width: 83.333333%; }
        .col-md-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
        .col-md-12 { flex: 0 0 100%; max-width: 100%; }
    }
    
    /* Large devices (992px and up) */
    @media (min-width: 992px) {
        .col-lg-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
        .col-lg-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
        .col-lg-3 { flex: 0 0 25%; max-width: 25%; }
        .col-lg-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
        .col-lg-5 { flex: 0 0 41.666667%; max-width: 41.666667%; }
        .col-lg-6 { flex: 0 0 50%; max-width: 50%; }
        .col-lg-7 { flex: 0 0 58.333333%; max-width: 58.333333%; }
        .col-lg-8 { flex: 0 0 66.666667%; max-width: 66.666667%; }
        .col-lg-9 { flex: 0 0 75%; max-width: 75%; }
        .col-lg-10 { flex: 0 0 83.333333%; max-width: 83.333333%; }
        .col-lg-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
        .col-lg-12 { flex: 0 0 100%; max-width: 100%; }
    }
    
    /* Extra large devices (1200px and up) */
    @media (min-width: 1200px) {
        .col-xl-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
        .col-xl-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
        .col-xl-3 { flex: 0 0 25%; max-width: 25%; }
        .col-xl-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
        .col-xl-5 { flex: 0 0 41.666667%; max-width: 41.666667%; }
        .col-xl-6 { flex: 0 0 50%; max-width: 50%; }
        .col-xl-7 { flex: 0 0 58.333333%; max-width: 58.333333%; }
        .col-xl-8 { flex: 0 0 66.666667%; max-width: 66.666667%; }
        .col-xl-9 { flex: 0 0 75%; max-width: 75%; }
        .col-xl-10 { flex: 0 0 83.333333%; max-width: 83.333333%; }
        .col-xl-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
        .col-xl-12 { flex: 0 0 100%; max-width: 100%; }
    }

    /* ===== UTILITY CLASSES ===== */
    
    /* Spacing utilities */
    .p-0 { padding: 0; }
    .p-xs { padding: var(--space-xs); }
    .p-sm { padding: var(--space-sm); }
    .p-md { padding: var(--space-md); }
    .p-lg { padding: var(--space-lg); }
    .p-xl { padding: var(--space-xl); }
    .p-2xl { padding: var(--space-2xl); }
    .p-3xl { padding: var(--space-3xl); }
    .p-4xl { padding: var(--space-4xl); }
    
    .m-0 { margin: 0; }
    .m-xs { margin: var(--space-xs); }
    .m-sm { margin: var(--space-sm); }
    .m-md { margin: var(--space-md); }
    .m-lg { margin: var(--space-lg); }
    .m-xl { margin: var(--space-xl); }
    .m-2xl { margin: var(--space-2xl); }
    .m-3xl { margin: var(--space-3xl); }
    .m-4xl { margin: var(--space-4xl); }
    
    /* Text utilities */
    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .text-right { text-align: right; }
    
    .text-primary { color: var(--text-primary); }
    .text-secondary { color: var(--text-secondary); }
    .text-brand { color: var(--text-brand); }
    .text-white { color: var(--neutral-white); }
    
    /* Background utilities */
    .bg-primary { background-color: var(--bg-primary); }
    .bg-secondary { background-color: var(--bg-secondary); }
    .bg-brand { background-color: var(--bg-brand); }
    .bg-accent { background-color: var(--bg-accent); }

    /* Image utilities */
    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    /* Review badges/circles */
    .review-badges {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        margin-top: var(--space-xl);
        flex-wrap: wrap;
    }
    
    .review-badge {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        text-decoration: none;
        color: white !important;
        position: relative;
        padding: 1.5rem;
        box-sizing: border-box;
    }
    
    .review-badge:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
    
    .review-badge-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .review-badge-icon svg {
        width: 2.5rem;
        height: 2.5rem;
        fill: white;
    }
    
    .review-badge-stars {
        display: flex;
        justify-content: center;
        margin-bottom: 0.5rem;
        gap: 0.2rem;
    }
    
    .review-badge-stars svg {
        width: 1.2rem;
        height: 1.2rem;
        fill: #FF7000;
    }
    
    .review-badge h3 {
        font-size: 1.1rem;
        font-weight: bold;
        margin: 0.5rem 0 0.2rem 0;
        line-height: 1.2;
        color: white;
    }
    
    .review-badge p {
        font-size: 0.9rem;
        margin: 0;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }
    
    .review-badge.google {
        background-color: #3E562C;
    }
    
    .review-badge.bbb {
        background-color: #2C3F7E;
    }
    
    .review-badge.facebook {
        background-color: #326667;
    }
    
    @media (max-width: 768px) {
        .review-badges {
            gap: 1rem;
        }
        
        .review-badge {
            width: 160px;
            height: 160px;
            padding: 1rem;
        }
        
        .review-badge-icon {
            font-size: 2rem;
        }
        
        .review-badge-icon svg {
            width: 2rem;
            height: 2rem;
        }
        
        .review-badge h3 {
            font-size: 1rem;
        }
        
        .review-badge p {
            font-size: 0.8rem;
        }
    }

    /* Section 3 specific styles */
    .services-section {
        padding: var(--space-4xl) var(--space-xl);
    }
    
    .services-header {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        margin-bottom: var(--space-3xl);
    }
    
    .services-header h2 {
        font-size: var(--font-size-3xl);
        margin-bottom: var(--space-lg);
        color: var(--text-primary);
    }
    
    .services-header p {
        font-size: var(--font-size-lg);
        line-height: 1.6;
        margin-bottom: var(--space-2xl);
    }

    /* Button styles */
    .btn-primary {
        background-color: #FF7000;
        color: white !important;
        padding: 16px 24px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        font-size: var(--font-size-base);
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #E56300;
        color: white;
    }
    
    /* Secondary button style */
    .btn-secondary {
        background-color: rgba(18, 20, 21, 0.8);
        color: white;
        padding: 16px 24px;
        border-radius: 6px;
        border: 2px solid #6DAB3C;
        text-decoration: none;
        display: inline-block;
        font-size: var(--font-size-base);
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .btn-secondary:hover {
        background-color: #121415;
        color: white;
    }

    /* Carousel styles */
    .wildlife-carousel-container {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 50px;
    }
    
    .wildlife-carousel {
        overflow: hidden;
        margin: 0 -12px;
    }
    
    .carousel-track {
        display: flex;
        transition: transform 0.3s ease;
    }
    
    .carousel-item {
        flex: 0 0 33.333%;
        padding: 0 12px;
        box-sizing: border-box;
    }
    
    .carousel-item-inner {
        background: white;
        border-radius: 6px;
        padding: 1.5rem;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .carousel-item-inner img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        margin-bottom: 1rem;
    }
    
    .carousel-item-inner h3 {
        font-size: var(--font-size-xl);
        margin-bottom: 0.75rem;
        color: var(--text-primary);
    }
    
    .carousel-item-inner p {
        font-size: var(--font-size-sm);
        color: var(--text-secondary);
        line-height: 1.5;
        margin-bottom: 1rem;
        flex-grow: 1;
    }
    
    .carousel-item-inner .learn-more {
        color: #6DAB3C;
        text-decoration: none;
        font-weight: 600;
        font-size: var(--font-size-base);
    }
    
    .carousel-item-inner .learn-more:hover {
        text-decoration: underline;
    }
    
    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: white;
        border: 2px solid #E5E5E5;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: background-color 0.3s ease;
    }
    
    .carousel-nav:hover {
        background: #F3F4F6;
    }
    
    .carousel-nav.prev {
        left: 0;
    }
    
    .carousel-nav.next {
        right: 0;
    }
    
    .carousel-nav svg {
        width: 20px;
        height: 20px;
        fill: var(--text-primary);
    }
    
    .carousel-dots {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }
    
    .carousel-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #D1D5DB;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .carousel-dot.active {
        background: #6DAB3C;
    }
    
    @media (max-width: 992px) {
        .carousel-item {
            flex: 0 0 50%;
        }
    }
    
    @media (max-width: 768px) {
        .wildlife-carousel-container {
            padding: 0 40px;
        }
        
        .carousel-item {
            flex: 0 0 100%;
        }
    }

    /* ===== PLACEHOLDER STYLES (TEMPORARY) ===== */
    .placeholder-content {
        text-align: center;
        max-width: 800px;
        padding: var(--space-4xl);
    }

    .placeholder-content h1 {
        font-size: var(--font-size-5xl);
        margin-bottom: var(--space-lg);
        color: var(--text-primary);
    }

    .placeholder-content h2 {
        font-size: var(--font-size-3xl);
        margin-bottom: var(--space-lg);
        color: var(--text-primary);
    }

    .placeholder-content p {
        font-size: var(--font-size-lg);
        color: var(--text-secondary);
        line-height: 1.6;
    }

    /* Section background colors for visual distinction */
    #section-1 {
        background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-secondary) 100%);
        color: var(--text-inverse);
    }

    #section-2 {
        background: var(--neutral-white);
        color: var(--text-primary);
    }
    
    #section-2 .section-content {
        padding: var(--space-4xl) var(--space-xl);
    }
    
    #section-2 .section-content-inner {
        max-width: 800px;
        margin: 0 auto;
    }
    
    #section-2 .section-title {
        text-align: center;
        font-size: var(--font-size-3xl);
        margin-bottom: var(--space-2xl);
        font-weight: 700;
    }
    
    #section-2 .module-images {
        margin-bottom: var(--space-2xl);
    }
    
    #section-2 .module-image {
        width: 100%;
        height: auto;
        display: block;
    }
    
    #section-2 .row-spacing-md {
        padding-bottom: var(--space-md);
    }
    
    #section-2 .row-spacing-lg {
        padding-bottom: var(--space-lg);
    }
    
    #section-2 .row-spacing-xl {
        padding-bottom: var(--space-xl);
    }
    
    #section-2 .row-spacing-gutter {
        padding-bottom: var(--grid-gutter);
    }
    
    #section-2 .content-max-600 {
        max-width: 600px;
        margin: 0 auto;
    }
    
    #section-2 .equal-height-card h3 {
        text-align: center;
    }
    
    #section-2 .equal-height-card.card-column {
        flex-direction: column;
    }
    
    #section-2 .local-experts-title {
        font-size: var(--font-size-2xl);
        font-weight: 600;
        margin-bottom: var(--space-sm);
    }
    
    #section-2 .local-experts-text {
        font-size: var(--font-size-lg);
        margin: 0;
    }
    
    #section-2 .section-padding-top {
        padding-top: var(--space-4xl);
    }
    
    #section-2 .image-wrapper {
        text-align: center;
    }
    
    #section-2 .image-wrapper img {
        border-radius: var(--radius-sm);
    }
    
    #section-2 .col-spacing {
        margin-bottom: var(--grid-gutter);
    }
    
    #section-2 .main-heading-row {
        margin: var(--space-2xl) 0;
    }
    
    #section-2 .main-heading {
        font-size: var(--font-size-4xl);
        font-weight: 700;
        margin: 0;
    }
    
    #section-2 .equal-height-row {
        margin-bottom: var(--grid-gutter);
    }
    
    #section-2 .card-heading {
        font-size: var(--font-size-xl);
        font-weight: 600;
    }
    
    #section-2 .card-full-width {
        width: 100%;
    }
    
    #section-2 .stats-large {
        font-size: var(--font-size-4xl);
        font-weight: 700;
        line-height: 1.2;
    }
    
    #section-2 .stats-small {
        font-size: var(--font-size-lg);
        font-weight: 600;
    }
    
    #section-2 .section-bottom-spacing {
        padding-bottom: var(--space-4xl);
    }

    #section-3 {
        background: #F3F4F6;
        color: var(--text-primary);
    }
    
    #section-4 {
        background: linear-gradient(to top, #203D0A 0%, #6DAB3C 100%);
        color: var(--text-primary);
        padding: var(--space-4xl) var(--space-xl);
    }
    
    .section-4-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100%;
    }
    
    .commercial-card {
        background: white;
        border-radius: 6px;
        max-width: 900px;
        width: 100%;
        padding: 3rem;
        text-align: center;
        position: relative;
        margin-top: 80px;
    }
    
    .commercial-card-image {
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        width: 160px;
        height: auto;
    }
    
    .commercial-card-content {
        margin-top: 80px;
    }
    
    .commercial-card h2 {
        font-size: var(--font-size-3xl);
        color: var(--text-primary);
        margin-bottom: var(--space-lg);
        font-weight: 700;
    }
    
    .commercial-card p {
        font-size: var(--font-size-lg);
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: var(--space-2xl);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .commercial-buttons {
        display: flex;
        gap: var(--space-lg);
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .commercial-buttons .btn-primary {
        min-width: 200px;
    }
    
    /* Service cards section */
    .service-cards {
        max-width: 1200px;
        margin: 3rem auto 0;
        padding: 0 var(--space-lg);
    }
    
    .service-card {
        background: white;
        border-radius: 6px;
        padding: 2rem;
        text-align: center;
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .service-card-image {
        width: 150px;
        margin: -60px auto 1rem;
        position: relative;
        z-index: 1;
    }
    
    .service-card h3 {
        font-size: var(--font-size-2xl);
        color: var(--text-primary);
        margin-bottom: var(--space-md);
        font-weight: 600;
    }
    
    .service-card p {
        font-size: var(--font-size-base);
        color: var(--text-secondary);
        line-height: 1.5;
        margin-bottom: var(--space-xl);
        flex-grow: 1;
    }
    
    .service-card .btn-secondary {
        align-self: center;
    }
    
    .service-card-wrapper {
        margin-bottom: 4rem;
    }
    
    @media (max-width: 768px) {
        .commercial-card {
            padding: 2rem 1.5rem;
        }
        
        .commercial-card-image {
            width: 120px;
            top: -40px;
        }
        
        .commercial-card-content {
            margin-top: 60px;
        }
        
        .commercial-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .commercial-buttons .btn-primary {
            width: 100%;
            max-width: 300px;
        }
    }

    /* Equal height card system */
    .equal-height-row {
        display: flex;
        flex-wrap: wrap;
    }

    .equal-height-card {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 120px;
        background-color: var(--neutral-card);
        border-radius: 4px;
        padding: 20px;
        text-align: center;
    }

    .equal-height-card h3 {
        text-align: center;
        margin: 0;
    }
</style>

<div class="pss-wrapper">
    <div class="pss-scroll-wrapper" id="pss-container">
        
        <!-- Section 1: Hero/Landing -->
        <section id="section-1" class="pss-snap-section">
            <div class="placeholder-content">
                <h1>Section 1</h1>
                <p>Hero/Landing section placeholder.<br>Ready for custom design system implementation.</p>
            </div>
        </section>
        
        <!-- Section 2: Why Choose Palmetto -->
        <section id="section-2" class="pss-snap-section">
            <div class="container">
                <div class="section-content-inner">
                    <!-- Top 3-Column Image Grid -->
                    <div class="row section-padding-top">
                        <div class="col-12 col-md-4 col-spacing">
                            <div class="image-wrapper">
                                <img src="<?php echo $assets_url; ?>images/modules/module-wildlife-prevention.webp" 
                                     alt="Wildlife Prevention" 
                                     class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-spacing">
                            <div class="image-wrapper">
                                <img src="<?php echo $assets_url; ?>images/modules/module-wildlife-removal.webp" 
                                     alt="Wildlife Removal" 
                                     class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-spacing">
                            <div class="image-wrapper">
                                <img src="<?php echo $assets_url; ?>images/modules/module-wildlife-remediation.webp" 
                                     alt="Wildlife Remediation" 
                                     class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <div class="row main-heading-row">
                        <div class="col-12">
                            <h1 class="text-center text-brand main-heading">
                                Why Choose Palmetto Wildlife Extractors?
                            </h1>
                        </div>
                    </div>

                    <!-- 2-Column Grid: Professional Services -->
                    <div class="row equal-height-row">
                        <div class="col-12 col-lg-6 col-spacing">
                            <div class="equal-height-card card-full-width">
                                <h3 class="text-brand card-heading">
                                    Licensed, Certified, & Insured Professionals
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-spacing">
                            <div class="equal-height-card card-full-width">
                                <h3 class="text-brand card-heading">
                                    Eco-Friendly & Humane Practices
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- 3-Column Grid: Statistics -->
                    <div class="row equal-height-row" style="margin-bottom: var(--grid-gutter);">
                        <div class="col-12 col-md-4" style="margin-bottom: var(--grid-gutter);">
                            <div class="equal-height-card" style="width: 100%; flex-direction: column;">
                                <div class="text-brand" style="font-size: var(--font-size-4xl); font-weight: 700; line-height: 1;">
                                    10,000<span style="font-size: var(--font-size-2xl);">+</span>
                                </div>
                                <div class="text-primary" style="font-size: var(--font-size-base); margin-top: var(--space-sm);">
                                    Satisfied Customers
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" style="margin-bottom: var(--grid-gutter);">
                            <div class="equal-height-card" style="width: 100%; flex-direction: column;">
                                <div class="text-brand" style="font-size: var(--font-size-4xl); font-weight: 700; line-height: 1;">
                                    30<span style="font-size: var(--font-size-2xl);">+</span>
                                </div>
                                <div class="text-primary" style="font-size: var(--font-size-base); margin-top: var(--space-sm);">
                                    Years of Combined<br>Experience
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" style="margin-bottom: var(--grid-gutter);">
                            <div class="equal-height-card" style="width: 100%; flex-direction: column;">
                                <div class="text-brand" style="font-size: var(--font-size-4xl); font-weight: 700; line-height: 1;">
                                    24<span style="font-size: var(--font-size-2xl);">/</span>7
                                </div>
                                <div class="text-primary" style="font-size: var(--font-size-base); margin-top: var(--space-sm);">
                                    Emergency Wildlife<br>Removal Services
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 1-Column Grid: Local Experts -->
                    <div class="row" style="padding-bottom: var(--grid-gutter);">
                        <div class="col-12">
                            <div style="max-width: 600px; margin: 0 auto;">
                                <div class="equal-height-card" style="flex-direction: column;">
                                    <h3 class="text-brand" style="font-size: var(--font-size-2xl); font-weight: 600; margin-bottom: var(--space-sm);">
                                        Local Experts
                                    </h3>
                                    <p class="text-primary" style="font-size: var(--font-size-lg); margin: 0;">
                                        in South Carolina & North Carolina
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Badges -->
                    <div class="row section-bottom-spacing">
                        <div class="col-12">
                            <div class="section-content-inner">
                                <div class="review-badges">
                                    <!-- Google Reviews Badge -->
                                    <a href="https://g.co/kgs/DwhpN7n" target="_blank" class="review-badge google">
                                        <div class="review-badge-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path d="M16.319 13.713v5.487h9.075c-0.369 2.356-2.744 6.9-9.075 6.9-5.463 0-9.919-4.525-9.919-10.1s4.456-10.1 9.919-10.1c3.106 0 5.188 1.325 6.375 2.469l4.344-4.181c-2.788-2.612-6.4-4.188-10.719-4.188-8.844 0-16 7.156-16 16s7.156 16 16 16c9.231 0 15.363-6.494 15.363-15.631 0-1.050-0.113-1.85-0.25-2.65l-15.113-0.006z"></path>
                                            </svg>
                                        </div>
                                        <div class="review-badge-stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </div>
                                        <h3>5 Star Rating</h3>
                                        <p>Over 90 Reviews</p>
                                    </a>

                                    <!-- BBB Badge -->
                                    <a href="https://www.bbb.org/us/sc/columbia/profile/animal-trapping/palmetto-wildlife-extractors-0663-34103856" target="_blank" class="review-badge bbb">
                                        <div class="review-badge-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M247 5.3l5.1 3.3c-5.5 8.2-4.4 17.3 1 25.2c20.7 16.4 42.9 30.6 63.8 46.6s30.8 23.5 35.5 46.8c4.1 20.6-.3 35.5-11.3 52.7c-13.5 21-31 40.8-44.9 61.6l-5.2-3.3c11.1-15.6 7.9-35.5-6.4-47.9c-22.8-19.9-66.4-40-79.7-66.5c-24.4-48.6 18.2-81.7 42-118.4zM213.8 175.4c18 16.7 58.2 33.6 65 58.4c8.4 30.5-15.3 50.2-31.1 72.6l-6-4.3c2.6-5 2.5-10.1-1.2-14.6c-33-27.1-90.5-47.4-56.4-99.9s15.2-19.8 21.7-30.1c11.9 .9 2 10.8 7.9 17.9zM92.5 505.8V392.5h59.6c2.2 0 9.6 2.4 12.1 3.4c22.5 9 23.7 37.7 3.9 50.3c10.2 5.7 18.9 11.6 20.2 24.3c4.6 47.6-67.6 32.7-95.7 35.2zM117.2 438h29c4.7 0 10.6-5.3 11.2-10.2c2.2-19.9-28.8-12.6-40.7-14.1c1.5 5.7-1.8 17.5-.7 22.3s.2 1.4 1.1 2zm-.5 20.3c-1.2 0-1.5 22-.5 24.1s1.8 2 2 2h26.1c3.5 0 11.5-1.4 14.3-3.1c8.3-5 6.9-17.4-2-21s-7-2.1-7.5-2.1h-32.4zm141.8-65.8c25.1 2.6 40.4 25.6 24.2 47.4l-7.3 6.2c7.9 4.7 15.8 8.8 18.7 18.1c7.8 24.7-13.5 41.5-36.6 41.5H200V392.5c18.8 1.4 40.1-1.9 58.5 0zM223.2 438h30.5c.3 0 5.5-2.1 6.2-2.5c5.7-3.4 6.7-12.7 2-17.4c-1.6-1.6-8.2-4.3-10.2-4.3h-27.1l-1.5 1.5v22.8zm0 45.5c0 2 34.2 .7 38.1-.3c11.3-2.7 14.3-17.1 4.3-22.3s-8-2.7-8.9-2.7h-31.9l-1.5 1.5v23.7zm84.2 22.3V392.5H366c1.4 0 8.3 1.9 10.2 2.5c24.7 8.2 27.6 37.7 5.9 51.3c9 4.5 16.6 8.8 19.6 19c5.3 17.9-4.7 32.7-22.1 37.6s-12.1 2.9-15.5 2.9h-56.7zM330.7 438h30.5c.9 0 7.3-3.3 8.3-4.4c5.4-6 2.6-15.8-4.9-18.4s-6-1.5-6.3-1.5h-26.1l-1.5 1.5V438zm1.5 20.3l-1.5 1.5V483l1.5 1.5h30c2 0 10.7-2.6 12.5-4c4.5-3.5 4.9-13.2 1-17.2s-9.5-4.9-11.6-4.9h-31.9zM144.8 341.2c2.5-5.3 3.2-16.1 6-20.7c.6-1 .9-1.6 2.2-1.6l190.4 .6 6.7 21.7h-51.3l-9.6 31.4-82.8 .4-10.3-31.8h-51.3z"></path>
                                            </svg>
                                        </div>
                                        <h3>Better Business Bureau</h3>
                                        <p>Accredited Business</p>
                                    </a>

                                    <!-- Facebook Badge -->
                                    <a href="https://www.facebook.com/PalmettoWildlifeExtractor/" target="_blank" class="review-badge facebook">
                                        <div class="review-badge-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"></path>
                                            </svg>
                                        </div>
                                        <div class="review-badge-stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </div>
                                        <h3>5 Star Rating</h3>
                                        <p>Over 40 Reviews</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section 3: Wildlife Removal Services -->
        <section id="section-3" class="pss-snap-section">
            <div class="services-section">
                <!-- Centered Text Content -->
                <div class="services-header">
                    <h2>Comprehensive Wildlife Removal Services</h2>
                    <p>Our expert team provides <strong>safe, humane, and effective wildlife control solutions</strong> for homes and businesses. From identifying infestations to securing your property, we handle every step of the process.</p>
                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/" class="btn-primary">View All Wildlife Removal Services</a>
                </div>

                <!-- Wildlife Services Carousel -->
                <div class="wildlife-carousel-container">
                    <!-- Navigation Arrows -->
                    <button class="carousel-nav prev" onclick="moveCarousel(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                        </svg>
                    </button>
                    <button class="carousel-nav next" onclick="moveCarousel(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/>
                        </svg>
                    </button>

                    <!-- Carousel Content -->
                    <div class="wildlife-carousel">
                        <div class="carousel-track" id="carousel-track">
                            <!-- Squirrel Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Squirrel-Isolated-Color-Corrected.webp" alt="Squirrel Removal">
                                    <h3>Squirrel Removal</h3>
                                    <p>Squirrels can cause serious damage by chewing through walls, insulation, and electrical wiring. Our humane squirrel removal services ensure that these nuisance animals are removed safely while preventing future invasions.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/squirrels/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Snake Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Snake-Isolated-Color-Corrected-scaled.webp" alt="Snake Removal">
                                    <h3>Snake Removal</h3>
                                    <p>Whether venomous or non-venomous, snakes can pose serious dangers to homeowners. We provide professional snake identification and removal services to ensure your property is safe.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/snakes/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Skunk Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Skunk-Isolated-Color-Corrected-scaled.webp" alt="Skunk Removal">
                                    <h3>Skunk Removal</h3>
                                    <p>Skunks not only spray a foul-smelling odor but can also burrow under homes. We use safe, humane trapping methods to remove skunks while preventing future encounters.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/skunks/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Rodent Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Rat-Isolated-Color-Corrected-scaled.webp" alt="Rodent Removal">
                                    <h3>Rodent Removal</h3>
                                    <p>Rats and mice carry diseases and can quickly infest a home. Our rodent control solutions include trapping, exclusion, and sanitation to keep your space rodent-free.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/rats/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Raccoon Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Raccoon-Isolated-Color-Corrected-scaled.webp" alt="Raccoon Removal">
                                    <h3>Raccoon Removal</h3>
                                    <p>Raccoons are known to raid garbage, enter attics, and spread diseases such as rabies. We provide expert raccoon trapping, relocation, and exclusion services to keep your home safe.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/raccoons/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Opossum Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Opossum-Isolated-Color-Corrected.webp" alt="Opossum Removal">
                                    <h3>Opossum Removal</h3>
                                    <p>Opossums frequently invade attics, crawl spaces, and garages. We use safe opossum trapping and relocation techniques to remove them without harm.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/opossums/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Mole Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Mole-Isolated-Color-Corrected.webp" alt="Mole Removal">
                                    <h3>Mole Removal</h3>
                                    <p>Moles tunnel underground, ruining lawns and landscapes. Our professional mole trapping services stop the damage and restore your yard.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/moles/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Feral Hog Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Feral-Hog-Isolated-Color-Corrected.webp" alt="Feral Hog Removal">
                                    <h3>Feral Hog Removal</h3>
                                    <p>Feral hogs destroy farmland and landscapes. Our team specializes in hog trapping and population control to prevent future damage.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/feral-hogs/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Coyote Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Coyote-Isolated-Color-Corrected-scaled.webp" alt="Coyote Removal">
                                    <h3>Coyote Removal</h3>
                                    <p>Coyotes can be aggressive toward pets and livestock. Our experts use humane trapping and deterrent strategies to keep coyotes away from your property.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/coyotes/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Bird Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Pigeon-Isolated-Color-Corrected.webp" alt="Bird Removal">
                                    <h3>Bird Removal</h3>
                                    <p>Birds, especially pigeons, can nest in vents and cause serious sanitation issues. Our experts provide bird exclusion and deterrent solutions to keep birds from damaging your home or business.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/birds/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Beaver Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Beaver-Isolated-Color-Corrected-scaled.webp" alt="Beaver Removal">
                                    <h3>Beaver Removal</h3>
                                    <p>Beavers can cause significant property damage by flooding land and chewing through trees. Our team offers beaver trapping and habitat modification to protect your land.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/beavers/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Bat Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/bat-new.webp" alt="Bat Removal">
                                    <h3>Bat Removal</h3>
                                    <p>Bats may roost in attics, leaving behind hazardous droppings that pose health risks. Our bat removal specialists use exclusion techniques to remove bats and prevent their return.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/bats/" class="learn-more">Learn More</a>
                                </div>
                            </div>

                            <!-- Alligator Removal -->
                            <div class="carousel-item">
                                <div class="carousel-item-inner">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/animals/Alligator.webp" alt="Alligator Removal">
                                    <h3>Alligator Removal</h3>
                                    <p>Alligators can pose a major threat near homes and businesses. We offer licensed alligator removal to safely relocate them away from residential areas.</p>
                                    <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/alligators/" class="learn-more">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Dots -->
                    <div class="carousel-dots" id="carousel-dots"></div>
                </div>
            </div>
        </section>
        
        <!-- Section 4: General & Commercial Wildlife Control -->
        <section id="section-4" class="pss-snap-section">
            <div class="section-4-content">
                <!-- Commercial Card -->
                <div class="commercial-card">
                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/badges/general-commercial-wildlife-control-corrected.webp" 
                         alt="Wildlife Control Badge" 
                         class="commercial-card-image">
                    
                    <div class="commercial-card-content">
                        <h2>General & Commercial<br>Wildlife Control</h2>
                        <p>Whether you're managing a home, office, warehouse, or retail space, wildlife issues can disrupt daily operations and pose health and safety risks. We offer customized wildlife control solutions for both residential and commercial properties, ensuring effective and humane removal tailored to your specific environment.</p>
                        
                        <div class="commercial-buttons">
                            <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/control/" class="btn-primary">General Control</a>
                            <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/commercial/" class="btn-primary">Commercial Control</a>
                        </div>
                    </div>
                </div>
                
                <!-- Service Cards -->
                <div class="service-cards">
                    <div class="row">
                        <!-- Wildlife Prevention Card -->
                        <div class="col-12 col-md-4 service-card-wrapper">
                            <div class="service-card">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/modules/module-wildlife-prevention.webp" 
                                     alt="Wildlife Prevention" 
                                     class="service-card-image">
                                <h3>Wildlife Prevention</h3>
                                <p>Our wildlife prevention services include sealing entry points, habitat modification, and deterrent installation to protect your home.</p>
                                <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/prevention/" class="btn-secondary">Learn More</a>
                            </div>
                        </div>
                        
                        <!-- Wildlife Remediation Card -->
                        <div class="col-12 col-md-4 service-card-wrapper">
                            <div class="service-card">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/modules/module-wildlife-remediation.webp" 
                                     alt="Wildlife Remediation" 
                                     class="service-card-image">
                                <h3>Wildlife Remediation</h3>
                                <p>After wildlife has been removed, damage and contamination often remain. Our remediation services include cleanup, sanitization, odor removal, and structural repairs to restore your property to a safe, healthy condition and prevent future infestations.</p>
                                <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/remediation/" class="btn-secondary">Learn More</a>
                            </div>
                        </div>
                        
                        <!-- Emergency Wildlife Removal Card -->
                        <div class="col-12 col-md-4 service-card-wrapper">
                            <div class="service-card">
                                <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/images/modules/module-wildlife-removal.webp" 
                                     alt="Emergency Wildlife Removal" 
                                     class="service-card-image">
                                <h3>Emergency Wildlife Removal</h3>
                                <p>Need immediate assistance? Our 24/7 emergency wildlife removal services ensure fast, effective solutions for urgent wildlife problems.</p>
                                <a href="https://palmettowildlife.futuresite.dev/wildlife-removal/" class="btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>

<!-- Progress Dots -->
<div class="pss-progress" id="pss-progress"></div>

<script>
(function() {
    console.log('[PSS] Initializing Palmetto Scroll Snap...');
    
    function initScrollSnap() {
        // Kill Lenis if it exists
        if (window.EhGlobalLenisInstance) {
            try {
                window.EhGlobalLenisInstance.stop();
                window.EhGlobalLenisInstance.destroy();
                window.EhGlobalLenisInstance = null;
                console.log('[PSS] Lenis disabled');
            } catch(e) {
                console.log('[PSS] Could not disable Lenis:', e);
            }
        }
        
        // Override Lenis constructor to prevent new instances
        if (window.Lenis) {
            // Store original Lenis reference if needed for debugging
            window.OriginalLenis = window.Lenis;
            
            // Create a mock Lenis class that won't break when instantiated with 'new'
            window.Lenis = class MockLenis {
                constructor(options = {}) {
                    console.log('[PSS] Lenis creation blocked - returning mock instance');
                    // Return methods that do nothing but won't cause errors
                    this.options = options;
                    this.velocity = 0;
                    this.isScrolling = false;
                    this.isStopped = true;
                }
                
                start() {
                    console.log('[PSS] Mock Lenis start() called');
                    return this;
                }
                
                stop() {
                    console.log('[PSS] Mock Lenis stop() called');
                    return this;
                }
                
                destroy() {
                    console.log('[PSS] Mock Lenis destroy() called');
                    return this;
                }
                
                raf(time) {
                    // Do nothing - just prevent errors
                    return this;
                }
                
                scrollTo(target, options = {}) {
                    console.log('[PSS] Mock Lenis scrollTo() called');
                    // If callback provided, call it immediately to prevent hanging
                    if (options.onComplete) {
                        options.onComplete();
                    }
                    return this;
                }
                
                on(event, callback) {
                    // Mock event listener - do nothing
                    return this;
                }
                
                off(event, callback) {
                    // Mock event listener removal - do nothing
                    return this;
                }
            };
        }
        
        // Activate scroll snap
        document.documentElement.classList.add('pss-active');
        document.body.classList.add('pss-active');
        
        const container = document.getElementById('pss-container');
        const sections = container ? container.querySelectorAll('.pss-snap-section') : [];
        const progressContainer = document.getElementById('pss-progress');
        
        if (!container || !sections.length || !progressContainer) {
            console.log('[PSS] Waiting for elements...');
            setTimeout(initScrollSnap, 100);
            return;
        }
        
        console.log(`[PSS] Found ${sections.length} sections`);
        
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
        
        // Scroll management variables
        let isTransitioning = false;
        let scrollTimeout;
        let snapDisableTimeout;
        let lastScrollTime = 0;
        
        // Core scroll event handling for progress dots
        container.addEventListener('scroll', function() {
            if (isTransitioning) return;
            
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(function() {
                updateProgressDots();
            }, 50);
        });
        
        // Function to update progress dots based on current scroll position
        function updateProgressDots() {
            const scrollTop = container.scrollTop;
            const containerHeight = container.clientHeight;
            
            sections.forEach((section, index) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                
                // Check if section is in viewport center
                if (scrollTop >= sectionTop - containerHeight / 2 && 
                    scrollTop < sectionTop + sectionHeight - containerHeight / 2) {
                    dots.forEach(d => d.classList.remove('active'));
                    if (dots[index]) {
                        dots[index].classList.add('active');
                    }
                }
            });
        }
        
        // Wheel event handling for smooth boundary behavior
        container.addEventListener('wheel', function(e) {
            const scrollTop = container.scrollTop;
            const scrollHeight = container.scrollHeight;
            const clientHeight = container.clientHeight;
            const isAtTop = scrollTop <= 5; // Small buffer for precision
            const isAtBottom = (scrollHeight - clientHeight - scrollTop) <= 5;
            
            lastScrollTime = Date.now();
            
            // If at boundary and trying to scroll beyond, temporarily disable snap
            if ((isAtTop && e.deltaY < 0) || (isAtBottom && e.deltaY > 0)) {
                // Temporarily disable scroll-snap to allow smooth boundary crossing
                container.classList.add('snap-disabled');
                
                // Clear previous timeout
                clearTimeout(snapDisableTimeout);
                
                // Re-enable after user stops scrolling
                snapDisableTimeout = setTimeout(() => {
                    const timeSinceLastScroll = Date.now() - lastScrollTime;
                    if (timeSinceLastScroll >= 100 && !isTransitioning) {
                        container.classList.remove('snap-disabled');
                        console.log('[PSS] Scroll-snap re-enabled');
                    }
                }, 200);
            }
        }, { passive: true });
        
        // Additional scroll monitoring for re-enabling snap
        document.addEventListener('wheel', function(e) {
            lastScrollTime = Date.now();
            
            // If user scrolls back into the container area, ensure snap is working
            clearTimeout(snapDisableTimeout);
            snapDisableTimeout = setTimeout(() => {
                if (!isTransitioning) {
                    container.classList.remove('snap-disabled');
                }
            }, 300);
        }, { passive: true });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
            
            const currentIndex = Array.from(dots).findIndex(dot => dot.classList.contains('active'));
            
            if (e.key === 'ArrowDown' || e.key === ' ') {
                e.preventDefault();
                if (currentIndex < sections.length - 1) {
                    isTransitioning = true;
                    // Ensure snap is enabled for smooth section transitions
                    container.classList.remove('snap-disabled');
                    sections[currentIndex + 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                    setTimeout(() => { isTransitioning = false; }, 800);
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (currentIndex > 0) {
                    isTransitioning = true;
                    // Ensure snap is enabled for smooth section transitions
                    container.classList.remove('snap-disabled');
                    sections[currentIndex - 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                    setTimeout(() => { isTransitioning = false; }, 800);
                }
            }
        });
        
        // Initialize progress dots on load
        updateProgressDots();
        
        console.log('[PSS] Scroll snap initialized successfully');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollSnap);
    } else {
        initScrollSnap();
    }
})();

// Carousel functionality
function initCarousel() {
    const track = document.getElementById('carousel-track');
    const dotsContainer = document.getElementById('carousel-dots');
    
    if (!track || !dotsContainer) return;
    
    const items = track.querySelectorAll('.carousel-item');
    let currentSlide = 0;
    
    function getItemsPerView() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 992) return 2;
        return 3;
    }
    
    function updateDots() {
        const itemsPerView = getItemsPerView();
        const totalSlides = Math.ceil(items.length / itemsPerView);
        
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.className = 'carousel-dot' + (i === currentSlide ? ' active' : '');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
    }
    
    function goToSlide(slideIndex) {
        const itemsPerView = getItemsPerView();
        const totalSlides = Math.ceil(items.length / itemsPerView);
        
        currentSlide = Math.max(0, Math.min(slideIndex, totalSlides - 1));
        
        // Simple calculation: move by 100% for each slide
        const translatePercent = currentSlide * 100;
        
        track.style.transform = `translateX(-${translatePercent}%)`;
        updateDots();
    }
    
    window.moveCarousel = function(direction) {
        const itemsPerView = getItemsPerView();
        const totalSlides = Math.ceil(items.length / itemsPerView);
        goToSlide(currentSlide + direction);
    };
    
    // Initialize
    updateDots();
    goToSlide(0);
    
    // Handle resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            goToSlide(currentSlide);
        }, 250);
    });
}

// Initialize carousel when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCarousel);
} else {
    initCarousel();
}

// Additional protection: Monitor for any attempts to recreate Lenis after page load
(function() {
    // Re-apply Lenis override periodically to catch late-loading scripts
    let overrideCount = 0;
    const maxOverrides = 10;
    
    const ensureLenisOverride = function() {
        if (window.Lenis && !(window.Lenis.name === 'MockLenis')) {
            console.log('[PSS] Late Lenis detection - reapplying override');
            window.OriginalLenis = window.Lenis;
            
            window.Lenis = class MockLenis {
                constructor(options = {}) {
                    console.log('[PSS] Late Lenis creation blocked');
                    this.options = options;
                    this.velocity = 0;
                    this.isScrolling = false;
                    this.isStopped = true;
                }
                
                start() { return this; }
                stop() { return this; }
                destroy() { return this; }
                raf(time) { return this; }
                scrollTo(target, options = {}) {
                    if (options.onComplete) options.onComplete();
                    return this;
                }
                on(event, callback) { return this; }
                off(event, callback) { return this; }
            };
        }
        
        overrideCount++;
        if (overrideCount < maxOverrides) {
            setTimeout(ensureLenisOverride, 500);
        }
    };
    
    // Start monitoring after a short delay
    setTimeout(ensureLenisOverride, 100);
})();
</script>