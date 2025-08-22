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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo+Black:wght@400&family=Roboto:wght@300;400;500;700&display=swap">
    
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
        
        /* Mega Menu Styles */
        .breakdance-dropdown-floater {
            max-width: 1250px !important;
            background: white;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 30px;
        }
        
        .breakdance-dropdown-body {
            overflow: auto !important;
        }
        
        .breakdance-dropdown-columns {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }
        
        .breakdance-dropdown-column__title {
            display: block;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #232931;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }
        
        .breakdance-dropdown-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .breakdance-dropdown-item {
            margin-bottom: 10px;
        }
        
        .breakdance-dropdown-link {
            display: flex;
            align-items: center;
            padding: 8px 0;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .breakdance-dropdown-link:hover {
            color: #1a7efb;
            transform: translateX(5px);
        }
        
        .breakdance-dropdown-link__icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        /* Mobile Menu Fix */
        @media (max-width: 1024px) {
            .breakdance-menu-list {
                position: fixed;
                top: 100px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 100px);
                background: white;
                transition: left 0.3s ease;
                overflow-y: auto;
                padding: 20px;
            }
            
            .breakdance-menu-list.is-open {
                left: 0;
            }
            
            .breakdance-menu-item {
                display: block;
                margin: 10px 0;
            }
            
            .breakdance-dropdown-floater {
                position: static !important;
                max-width: 100% !important;
                margin-top: 10px;
            }
            
            .breakdance-dropdown-columns {
                grid-template-columns: 1fr;
            }
        }
        
        /* Test content area */
        .test-content {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            padding: 40px;
            text-align: center;
        }
        
        .test-content h1 {
            font-size: 2.5rem;
            color: #232931;
            margin-bottom: 20px;
        }
        
        .test-content ul {
            list-style: none;
            padding: 0;
            text-align: left;
            display: inline-block;
        }
        
        .test-content li {
            margin: 10px 0;
            font-size: 1.1rem;
        }
    </style>
</head>

<body <?php body_class('pss-active breakdance'); ?>>

<!-- Original Palmetto Wildlife Header -->
<header class="bde-header-builder-322-100 bde-header-builder palmetto-header bde-header-builder--sticky bde-header-builder--sticky-scroll-slide">
    <div class="bde-header-builder__container">
        <!-- Top Bar -->
        <div class="bde-div-322-129 bde-div">
            <div class="bde-div-322-102 bde-div">
                <!-- Phone Number -->
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
                
                <!-- Message -->
                <h1 class="bde-heading-322-140 bde-heading">
                    &gt;&gt;&gt;We do not deal with domesticated animals or provide rescue services &lt;&lt;&lt;
                </h1>
                
                <!-- Social Icons -->
                <div class="bde-div-322-103 bde-div">
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
        
        <!-- Main Navigation Bar -->
        <div class="bde-div-322-108 bde-div">
            <div class="bde-div-322-130 bde-div header">
                
                <!-- Logo -->
                <a class="bde-container-link-322-137 bde-container-link breakdance-link" href="<?php echo home_url(); ?>">
                    <img class="bde-image2-322-124 bde-image2 logo" 
                         src="<?php echo $assets_url; ?>images/Palmetto-Wildlife-Extractors.png" 
                         alt="Palmetto Wildlife Extractors Logo">
                </a>
                
                <!-- Navigation Menu -->
                <div class="bde-menu-322-115 bde-menu">
                    <nav class="breakdance-menu breakdance-menu--collapse breakdance-menu--placement-left breakdance-menu--dropdown-dropdown breakdance-menu--anim-fade breakdance-menu--default breakdance-menu--enabled">
                        
                        <!-- Mobile Menu Toggle -->
                        <button class="breakdance-menu-toggle breakdance-menu-toggle--squeeze" type="button" aria-label="Open Menu" aria-expanded="false">
                            <span class="breakdance-menu-toggle-icon">
                                <span class="breakdance-menu-toggle-lines"></span>
                            </span>
                        </button>
                        
                        <!-- Menu Items -->
                        <ul class="breakdance-menu-list" id="menu-115">
                            <!-- Home -->
                            <li class="breakdance-menu-item-322-116 breakdance-menu-item breakdance-menu-item--active">
                                <a class="breakdance-link breakdance-menu-link" href="<?php echo home_url(); ?>" aria-current="page">Home</a>
                            </li>
                            
                            <!-- Services Mega Menu -->
                            <li class="bde-menu-dropdown-322-117 bde-menu-dropdown breakdance-menu-item">
                                <div class="breakdance-dropdown">
                                    <div class="breakdance-dropdown-toggle">
                                        <button class="breakdance-menu-link" type="button" aria-expanded="false" aria-controls="dropdown-117">
                                            Services
                                        </button>
                                        <button class="breakdance-menu-link-arrow" type="button" aria-expanded="false" aria-controls="dropdown-117" aria-label="Services Submenu"></button>
                                    </div>
                                    
                                    <!-- Mega Menu Dropdown -->
                                    <div class="breakdance-dropdown-floater" aria-hidden="true" id="dropdown-117">
                                        <div class="breakdance-dropdown-body">
                                            <div class="breakdance-dropdown-section">
                                                <div class="breakdance-dropdown-columns">
                                                    <!-- Column 1: Animal Extraction -->
                                                    <div class="breakdance-dropdown-column breakdance-dropdown-column--collapsible">
                                                        <span class="breakdance-dropdown-column__title" role="heading" aria-level="3">Animal Extraction</span>
                                                        <ul class="breakdance-dropdown-links">
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/squirrels/">
                                                                    <span class="breakdance-dropdown-link__icon">🐿️</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Squirrel Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/snakes/">
                                                                    <span class="breakdance-dropdown-link__icon">🐍</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Snake Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/beavers/">
                                                                    <span class="breakdance-dropdown-link__icon">🦫</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Beaver Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/birds/">
                                                                    <span class="breakdance-dropdown-link__icon">🦅</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Bird Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/opossums/">
                                                                    <span class="breakdance-dropdown-link__icon">🦝</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Opossum Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/bats/">
                                                                    <span class="breakdance-dropdown-link__icon">🦇</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Bat Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/coyotes/">
                                                                    <span class="breakdance-dropdown-link__icon">🦊</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Coyote Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/raccoons/">
                                                                    <span class="breakdance-dropdown-link__icon">🦝</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Raccoon Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/rodents/">
                                                                    <span class="breakdance-dropdown-link__icon">🐀</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Rodent Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/skunks/">
                                                                    <span class="breakdance-dropdown-link__icon">🦨</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Skunk Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/moles/">
                                                                    <span class="breakdance-dropdown-link__icon">🦔</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Mole Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/feral-hogs/">
                                                                    <span class="breakdance-dropdown-link__icon">🐗</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Feral Hog Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/alligators/">
                                                                    <span class="breakdance-dropdown-link__icon">🐊</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Alligator Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <!-- Column 2: Our Wildlife Services -->
                                                    <div class="breakdance-dropdown-column breakdance-dropdown-column--collapsible">
                                                        <span class="breakdance-dropdown-column__title" role="heading" aria-level="3">Our Wildlife Services</span>
                                                        <ul class="breakdance-dropdown-links">
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/">
                                                                    <span class="breakdance-dropdown-link__icon">🦝</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Wildlife Removal</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/control/">
                                                                    <span class="breakdance-dropdown-link__icon">🛡️</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">General Wildlife Control</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/commercial/">
                                                                    <span class="breakdance-dropdown-link__icon">🏢</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Commercial Wildlife Control</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/remediation/">
                                                                    <span class="breakdance-dropdown-link__icon">🧹</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Wildlife Remediation</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/wildlife-removal/prevention/">
                                                                    <span class="breakdance-dropdown-link__icon">🚫</span>
                                                                    <span class="breakdance-dropdown-link__label">
                                                                        <span class="breakdance-dropdown-link__text">Wildlife Prevention</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <!-- Column 3: Service Areas -->
                                                    <div class="breakdance-dropdown-column breakdance-dropdown-column--collapsible">
                                                        <span class="breakdance-dropdown-column__title" role="heading" aria-level="3">Service Areas</span>
                                                        <ul class="breakdance-dropdown-links">
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/columbia-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Columbia, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/charleston-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Charleston, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/greenville-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Greenville, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/spartanburg-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Spartanburg, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/myrtle-beach-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Myrtle Beach, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/north-myrtle-beach-sc/">
                                                                    <span class="breakdance-dropdown-link__text">North Myrtle Beach, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/aiken-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Aiken, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/florence-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Florence, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/rock-hill-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Rock Hill, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/hilton-head-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Hilton Head, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/sumter-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Sumter, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/lexington-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Lexington, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/west-columbia-sc/">
                                                                    <span class="breakdance-dropdown-link__text">West Columbia, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/seven-oaks-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Seven Oaks, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/five-forks-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Five Forks, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/greer-sc/">
                                                                    <span class="breakdance-dropdown-link__text">Greer, SC</span>
                                                                </a>
                                                            </li>
                                                            <li class="breakdance-dropdown-item">
                                                                <a class="breakdance-link breakdance-dropdown-link" href="/service-areas/charlotte-nc/">
                                                                    <span class="breakdance-dropdown-link__text">Charlotte, NC</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- About Dropdown -->
                            <li class="bde-menu-dropdown breakdance-menu-item">
                                <div class="breakdance-dropdown">
                                    <div class="breakdance-dropdown-toggle">
                                        <button class="breakdance-menu-link" type="button" aria-expanded="false" aria-controls="dropdown-about">
                                            About
                                        </button>
                                        <button class="breakdance-menu-link-arrow" type="button" aria-expanded="false" aria-controls="dropdown-about" aria-label="About Submenu"></button>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Wildlife Guide Dropdown -->
                            <li class="bde-menu-dropdown breakdance-menu-item">
                                <div class="breakdance-dropdown">
                                    <div class="breakdance-dropdown-toggle">
                                        <button class="breakdance-menu-link" type="button" aria-expanded="false" aria-controls="dropdown-guide">
                                            Wildlife Guide
                                        </button>
                                        <button class="breakdance-menu-link-arrow" type="button" aria-expanded="false" aria-controls="dropdown-guide" aria-label="Wildlife Guide Submenu"></button>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Gallery -->
                            <li class="breakdance-menu-item breakdance-menu-item">
                                <a class="breakdance-link breakdance-menu-link" href="/wildlife-removal/gallery/">Gallery</a>
                            </li>
                            
                            <!-- Contact Us -->
                            <li class="breakdance-menu-item breakdance-menu-item">
                                <a class="breakdance-link breakdance-menu-link" href="/contact/">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Schedule Button -->
                <div class="bde-div-322-111 bde-div">
                    <div class="bde-button-329-100 bde-button">
                        <a class="breakdance-link button-atom button-atom--primary bde-button__button" href="/wildlife-removal/schedule/">
                            <span class="button-atom__text">Schedule Inspection</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>

<!-- Test Content Area -->
<div class="test-content">
    <div>
        <h1>Phase 1: Header Implementation Test</h1>
        <p>Testing the Palmetto Wildlife Extractors header with full functionality.</p>
        <p>Please verify the following:</p>
        <ul>
            <li>✓ Header is visible and styled correctly</li>
            <li>✓ Logo displays properly</li>
            <li>✓ Phone number link works (855-465-1088)</li>
            <li>✓ Social media icons are visible (Facebook, Instagram, TikTok, LinkedIn)</li>
            <li>✓ All main menu items display (Home, Services, About, Wildlife Guide, Gallery, Contact Us)</li>
            <li>✓ Services mega menu shows 3 columns on hover:</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;- Animal Extraction (13 items)</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;- Our Wildlife Services (5 items)</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;- Service Areas (17 locations)</li>
            <li>✓ About dropdown shows on hover</li>
            <li>✓ Wildlife Guide dropdown shows on hover</li>
            <li>✓ Schedule Inspection button is visible</li>
            <li>✓ Mobile hamburger menu opens/closes on click</li>
            <li>✓ Header sticks to top when scrolling</li>
        </ul>
    </div>
</div>

<!-- Add scrollable content to test sticky header -->
<div style="min-height: 100vh; background: #e0e0e0; padding: 60px 20px;">
    <h2 style="text-align: center; color: #232931;">Scroll Test Section</h2>
    <p style="text-align: center;">Scroll down to test the sticky header behavior.</p>
</div>

<!-- jQuery (required for menu functionality) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Header JavaScript -->
<script src="<?php echo $assets_url; ?>js/header-builder.js"></script>
<script src="<?php echo $assets_url; ?>js/awesome-menu.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize header builder for sticky behavior
    if (typeof BreakdanceHeaderBuilder !== 'undefined') {
        new BreakdanceHeaderBuilder(".breakdance .bde-header-builder-322-100", "100", false);
    }
    
    // Initialize awesome menu for dropdown functionality
    if (typeof AwesomeMenu !== 'undefined') {
        new AwesomeMenu(".breakdance .bde-menu-322-115 .breakdance-menu", {
            dropdown: {
                openOnClick: false,
                mode: {
                    desktop: 'dropdown'
                },
                placement: 'left',
                animation: 'fade'
            },
            mobile: {
                breakpoint: '1024px',
                mode: 'default',
                offcanvasPosition: 'right',
                followLinks: true
            }
        });
    }
    
    // Enhanced Mobile menu toggle
    const menuToggle = document.querySelector('.breakdance-menu-toggle');
    const menuList = document.querySelector('.breakdance-menu-list');
    
    if (menuToggle && menuList) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            menuList.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
            
            // Toggle hamburger animation
            this.classList.toggle('is-active');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !menuList.contains(e.target)) {
                menuList.classList.remove('is-open');
                document.body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.classList.remove('is-active');
            }
        });
    }
    
    // Desktop dropdown hover functionality
    const dropdownItems = document.querySelectorAll('.bde-menu-dropdown');
    
    dropdownItems.forEach(item => {
        const dropdown = item.querySelector('.breakdance-dropdown-floater');
        const toggle = item.querySelector('.breakdance-dropdown-toggle');
        
        if (dropdown && toggle) {
            // Show on hover for desktop
            item.addEventListener('mouseenter', function() {
                if (window.innerWidth > 1024) {
                    dropdown.setAttribute('aria-hidden', 'false');
                    dropdown.style.display = 'block';
                    toggle.querySelector('button').setAttribute('aria-expanded', 'true');
                }
            });
            
            item.addEventListener('mouseleave', function() {
                if (window.innerWidth > 1024) {
                    dropdown.setAttribute('aria-hidden', 'true');
                    dropdown.style.display = 'none';
                    toggle.querySelector('button').setAttribute('aria-expanded', 'false');
                }
            });
            
            // Click for mobile
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const isOpen = dropdown.style.display === 'block';
                    dropdown.style.display = isOpen ? 'none' : 'block';
                    dropdown.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
                    this.querySelector('button').setAttribute('aria-expanded', !isOpen);
                }
            });
        }
    });
    
    console.log('Palmetto Header Phase 1 initialized with full menu');
});
</script>

<?php wp_footer(); ?>
</body>
</html>