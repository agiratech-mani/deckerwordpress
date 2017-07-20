<?php
/**
 * Decker New Book functions and definitions
 *
 * @package Decker New Book
 */

// REMOVE ADMIN MENU	
show_admin_bar( false );	

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'decker_new_book_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function decker_new_book_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Decker New Book, use a find and replace
	 * to change 'decker-new-book' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'decker-new-book', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'decker-new-book' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'decker_new_book_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // decker_new_book_setup
add_action( 'after_setup_theme', 'decker_new_book_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function decker_new_book_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'decker-new-book' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'decker_new_book_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function decker_new_book_scripts() {
	wp_enqueue_style('bs', get_stylesheet_directory_uri() . '/bs/css/bootstrap.min.css', array(), '3.3.2' );
	wp_enqueue_style('decker-new-book-style', get_stylesheet_uri(), array("bs"), '4.1');

	wp_enqueue_script('decker-new-book-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script('decker-new-book-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script('masonry', get_stylesheet_directory_uri() . '/js/masonry.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('cscript', get_stylesheet_directory_uri() . '/js/cscript.js', array('jquery'), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'decker_new_book_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// shortcode for acf
function dacf_shortcode($attr) {
	ob_start();
	get_template_part('content', 'dacf');
	return ob_get_clean();
}
add_shortcode('dacf', 'dacf_shortcode');

function field_func($atts) {
   global $post;
   $name = $atts['name'];
   if (empty($name)) return;
   return do_shortcode(get_post_meta($post->ID, $name, true));
}
add_shortcode('field', 'field_func');
