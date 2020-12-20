<?php
/**
 * welearner functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package welearner
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'welearner_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function welearner_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on welearner, use a find and replace
		 * to change 'welearner' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'welearner', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'welearner' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'welearner_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'welearner_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function welearner_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'welearner_content_width', 640 );
}
add_action( 'after_setup_theme', 'welearner_content_width', 0 );


if ( ! function_exists( 'welearner_fonts_url' ) ) :
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	
	function welearner_fonts_url() {
		$font_url = '';
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Open Sans, translate this to 'off'. Do not translate into your own language.
		 */
		
		$primary_font = get_theme_mod( 'primary_font' ) ? get_theme_mod( 'primary_font' ) : 'Yantramanav:wght@100;300;400;500;700;900';
		$secondary_font = get_theme_mod( 'secondary_font' ) ? get_theme_mod( 'secondary_font' ) : 'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	
		if ( 'off' !== _x( 'on', 'Fonts: on or off', 'welearner' ) ) {
			$query_args = array(
				'family' => $primary_font.'&family='. $secondary_font,
			);
			$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}
		return $font_url;
	}
endif;
	
// Menu fallback
function welearner_primary_menu_fallback(){
	echo '<ul class="navbar-nav ml-auto main-menu-nav"><li><a href="'.esc_url( admin_url( 'nav-menus.php' ) ).'"></a></li></ul>';
}

/**
 * Enqueue scripts and styles.
 */
function welearner_scripts() {

	//  Font awesome icon css
	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/lib/fonts/line-awesome/css/line-awesome.min.css' );

	// Theme Google fonts
	wp_enqueue_style( 'welearner-fonts', welearner_fonts_url(), array(), null );

	/**
	 * All style type
	 */

	// Bootstrap 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/css/bootstrap.min.css' );

	// Bootstrap-4-navbar
	wp_enqueue_style( 'bootstrap-4-navbar', get_template_directory_uri() . '/css/bootstrap-4-navbar.css' );

	// Slick CSS
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/lib/slick/slick.css' );

	// Main stylesheet
	wp_enqueue_style( 'welearner-style', get_stylesheet_uri() );

	// Responsive file
	wp_enqueue_style( 'welearner-responsive', get_template_directory_uri() . '/css/responsive.css' );

	wp_style_add_data( 'welearner-style', 'rtl', 'replace' );

	/**
	 * All scripts type
	 */

	// Bootstrap Script
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/js/bootstrap.min.js', array( 'jquery' ), false, true );

	// Slick Script
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array( 'jquery' ), false, true );

	// welearner custom js
	wp_enqueue_script( 'welearner-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'welearner_scripts' );

// Admin scripts
function marketum_admin_scripts( $screen ) {	
	if( 'widgets.php' == $screen ){
		wp_enqueue_script( 'welearner-script', get_template_directory_uri() . '/js/admin-main.js', array( 'jquery' ), false, true );
	}			
}
add_action( 'admin_enqueue_scripts', 'marketum_admin_scripts' );


/**
 * Functions which enhance the tag
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

 /**
 * Add Plugins
 */
 require get_template_directory() . '/inc/plugins.php';

/**
 * Botstrap nav additions.
 */
require get_template_directory() . '/lib/wp_bootstrap_navwalker.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

