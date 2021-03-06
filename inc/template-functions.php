<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mc_theme
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mc_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'mc_theme_pingback_header' );
