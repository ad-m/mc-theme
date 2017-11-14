<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mc_theme
 */

?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--<a class="skip-link screen-reader-text" href="#content">-->
<?php //esc_html_e( 'Skip to content', 'mc_theme' ); ?><!--</a>-->

<div class="container">
    <div class="top-bar">
        <div class="row">
            <div class="col-xxs-3 col-xs-2">
                <a href="http://gov.pl/" class="top-bar__gov-pl">gov.pl</a>
            </div>
            <div class="col-xxs-9 col-xs-10">
                <a href="https://mc.gov.pl/cyfryzacja" class="top-bar__welcome">
                    <?php _e('Go to the main website of the Ministry', 'mc_theme'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="logo-bar">
        <div class="row">
            <div class="col-xxs-3 col-xs-2">
                <div class="logo-bar__logo">
                    <img src="<?php mc_theme_echo_media_uri('static/img/logo.jpg'); ?>">
                </div>
            </div>
            <div class="col-xxs-9 col-xs-10">
                <div class="logo-bar__header">
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="hide-xs-max"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="navbar">
        <div class="navbar__search hide-md-max">
            <?php get_search_form(); ?>
        </div>
        <div class="navbar__menu">
            <h1 class="screen-reader-text"><?php _e('Navigation', 'mc_theme'); ?></h1>
            <div class="hide-sm">
                <a class="menu-handler">
                    <img src="<?php mc_theme_echo_media_uri('static/img/bar.svg'); ?>">
                    Menu
                </a>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_id' => 'primary-menu',
                'menu_class' => 'navbar__menu-list',
                'depth' => 1
            ));
            ?>
        </div>

    </div>
</div>