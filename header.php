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

<div class="top-bar">
    <div class="container">
<!--        <div class="row">-->
<!--            <div class="col-xs-4 col-md-3 col-lg-2">-->
                <a href="http://gov.pl/" class="top-bar__gov-pl">gov.pl</a>
<!--            </div>-->
<!--            <div class="col-xs-4 col-md-9 col-lg-10 ">-->
                <p class="top-bar__welcome"><?php
                    printf(
                        wp_kses(
                        /* translators: 1: link to main website of ministry. */
                            __('Go to <a href="%s">the main website of the Ministry of Digital Affairs</a>.', 'mc_theme'),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ),
                        "https://mc.gov.pl/cyfryzacja"
                    );
                    ?></p>
<!--            </div>-->
<!--        </div>-->
    </div>
</div>

<div class="container logo-bar row">
    <div class="col-lg-2 col-xs-1">
        <div class="logo-bar__logo">
            <img src="<?php mc_theme_echo_media_uri('static/img/logo.jpg');?>">
        </div>
    </div>
    <div class="col-lg-10">
        <div class="logo-bar__header">
            <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) : ?>
                <p><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div>
    </div>

</div>
<div class="container navbar row">
    <div class="navbar__search">
        <?php get_search_form(); ?>
    </div>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'menu_class' => 'navbar__menu',
        'depth' => 1
    ));
    ?>

</div>