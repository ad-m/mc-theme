<?php
/**
 * mc_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mc_theme
 */

if ( ! function_exists( 'mc_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mc_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mc_theme, use a find and replace
		 * to change 'mc_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mc_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        set_post_thumbnail_size( 150, 150, true);
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mc_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

        add_theme_support( 'starter-content', array(
            'posts' => array(
                'home' => array(
                    'title' => _('Home page'),
                    'template' => 'page-home.php',
                ),
                'index' => array(
                    'title' => _('Page for posts'),
                    'template' => 'page-home.php',
                ),

            ),
            'options' => array(
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{index}}'
            )
        ));
        /**
         * Disable attributes from thumbnail to manage them in CSS
         *
         * @link https://developer.wordpress.org/reference/functions/the_post_thumbnail/
         */
        function remove_img_attr ($html)
        {
            return preg_replace('/(width|height)="\d+"\s/', "", $html);
        }
        add_filter( 'post_thumbnail_html', 'remove_img_attr' );

	}
endif;
add_action( 'after_setup_theme', 'mc_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mc_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mc_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mc_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function mc_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Bottom-bar left', 'mc_theme' ),
        'id'            => 'home-left',
        'description'   => esc_html__( 'Add widgets here.', 'mc_theme' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="header"><h1 class="widget-title">',
        'after_title'   => '</h1><span class="header__strip"></span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Bottom-bar right', 'mc_theme' ),
        'id'            => 'home-right',
        'description'   => esc_html__( 'Add widgets here.', 'mc_theme' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="header"><h1 class="widget-title">',
        'after_title'   => '</h1><span class="header__md-strip"></span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Contact section', 'mc_theme' ),
        'id'            => 'contact-section',
        'description'   => esc_html__( 'Add widgets here.', 'mc_theme' ),
        'before_widget' => '<div class="row"><div class="col-sm-6">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="header"><h1 class="widget-title">',
        'after_title'   => '</h1><span class="header__strip"></span></div>',
    ) );


}
add_action( 'widgets_init', 'mc_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mc_theme_scripts() {

    if(WP_DEBUG){
        wp_enqueue_style( 'mc_theme-style', get_template_directory_uri() . '/static/css/style.css');
        wp_enqueue_script( 'mc_theme-script', get_template_directory_uri() . '/static/js/script.js', array(), '20151215', true );
    }else{
        wp_enqueue_style( 'mc_theme-style', get_template_directory_uri() . '/static/css/style.min.css');
        wp_enqueue_script( 'mc_theme-script', get_template_directory_uri() . '/static/js/script.min.js', array(), '20151215', true );
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mc_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Registers an editor stylesheet for the theme.
 */
add_action( 'admin_init', function() {
    add_editor_style(get_template_directory_uri() . '/static/css/elementary.css');
}
);