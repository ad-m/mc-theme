<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mc-blog
 */

?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'mc_theme' ); ?><!--</a>-->

<div class="container top-bar row">
    <div class="col-2">
        <a href="http://gov.pl/" class="top-bar__gov-pl">gov.pl</a>
    </div>
    <div class="col-10">
        <p class="top-bar__welcome">Przejdź do <a href="mc.gov.pl/cyfryzacja">głównego serwisu Ministerstwa Cyfryzacji</a></p>
    </div>
</div>

<div class="container logo-bar row">
    <div class="col-2">
        <div class="logo-bar__logo">
            <img src="https://www.gov.pl/image/layout_set_logo?img_id=244286&t=1509379516876">
        </div>
    </div>
    <div class="col-10">
        <div class="logo-bar__header">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
            <p><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div>
    </div>

</div>
<div class="container navbar row">
    <div class="navbar__search">
        <form class="search-form">
            <input class="search-form__input" type="search" name="query">
            <button class="search-form__button" type="submit">Szukaj</button>
        </form>
    </div>
    <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'menu_class' => 'navbar__menu',
            'depth' => 1
        ) );
        ?>

</div>