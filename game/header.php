<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <!-- Force Mobile Navbar Edge-to-Edge -->
    <style>
        @media (max-width: 1024px) {
            body .site-header {
                width: 100% !important;
                max-width: 100vw !important;
                overflow: hidden !important;
            }
            body .nav-container {
                padding: 0 32px !important;
                width: 100% !important;
                box-sizing: border-box !important;
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                max-width: 100% !important;
                margin: 0 !important;
            }
            body .site-header .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 32px !important;
                margin: 0 !important;
            }
            body .site-logo {
                padding-left: 0 !important; /* Resetting since padding is now handled by nav-container */
            }
            body .mobile-menu-toggle {
                padding-right: 0 !important;
            }
            body .mobile-menu-toggle span {
                background-color: #FAF9F6 !important;
            }
            .seats-divider {
                padding-bottom: 20px !important;
            }
            .team-section {
                padding-bottom: 20px !important;
            }
            .careers-section {
                padding-top: 30px !important;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container nav-container">
        <!-- Logo (Left) -->
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="text-decoration: none;">
                <span style="font-family: 'Fraunces', ui-serif, Georgia, serif; font-size: 28px; font-weight: 400; color: #FAF9F6; letter-spacing: -0.02em;">Gameplan<span style="color: oklch(55% 0.15 150);">.</span></span>
            </a>
        </div>
        
        <!-- Navigation (Center) -->
        <nav class="main-nav">
            <ul>
                <li><a href="<?php echo is_front_page() ? '#about' : home_url('/#about'); ?>">About</a></li>
                <li><a href="<?php echo is_front_page() ? '#profile' : home_url('/#profile'); ?>">Profile</a></li>
                <li><a href="<?php echo home_url('/team'); ?>">Team</a></li>
                <li><a href="<?php echo home_url('/insights'); ?>">Insights</a></li>
                <li><a href="<?php echo is_front_page() ? '#careers' : home_url('/#careers'); ?>">Careers</a></li>
                <li><a href="<?php echo is_front_page() ? '#contact' : home_url('/#contact'); ?>">Contact</a></li>
            </ul>
        </nav>

        <!-- CTA Button (Right) -->
        <div class="header-cta">
            <a href="<?php echo is_front_page() ? '#enquiries' : home_url('/#enquiries'); ?>" class="btn-pill">Enquire &rarr;</a>
        </div>

        <!-- Mobile Toggle -->
        <button class="mobile-menu-toggle" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
<main id="primary" class="site-main">



