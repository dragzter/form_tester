<?php
/**
 * form_tester functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package form_tester
 */

if ( ! function_exists( 'form_tester_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function form_tester_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on form_tester, use a find and replace
		 * to change 'form_tester' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'form_tester', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'form_tester' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'form_tester_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'form_tester_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function form_tester_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'form_tester_content_width', 640 );
}
add_action( 'after_setup_theme', 'form_tester_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function form_tester_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'form_tester' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'form_tester' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'form_tester_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function form_tester_scripts() {
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array(), '20151215', false );
	
	wp_enqueue_style( 'form_tester-style', get_stylesheet_uri() );
	wp_enqueue_style( 'form_tester-magnific-popup', get_template_directory_uri()  . '/vendor/magnific-popup/magnific-popup.css' );
	wp_enqueue_style( 'form_tester-bootstrap', get_template_directory_uri()  . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'form_tester-font-awesome', get_template_directory_uri()  . '/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'form_tester-main-css', get_template_directory_uri()  . '/css/creative.css' );

	wp_enqueue_script( 'form_tester-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'form_tester-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// theme specific scripts
	wp_enqueue_script( 'form_tester-bootstrap-bundle', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'form_tester-jquery-easing', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'form_tester-scroll-reveal', get_template_directory_uri() . '/vendor/scrollreveal/scrollreveal.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'form_tester-popup', get_template_directory_uri() . '/vendor/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );
	//wp_enqueue_script( 'form_tester-validator-js', get_template_directory_uri() . '/js/validator.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'form_tester-validate-form-js', get_template_directory_uri() . '/js/validate-form.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'form_tester-main-js', get_template_directory_uri() . '/js/creative.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'form_tester_scripts' );

/**
 * Implement the Custom Sections.
 */
require get_template_directory() . '/sections/nav.php';
require get_template_directory() . '/sections/header.php';
require get_template_directory() . '/sections/page_header.php';
require get_template_directory() . '/sections/cta.php';
require get_template_directory() . '/sections/services.php';
require get_template_directory() . '/sections/portfolio.php';
require get_template_directory() . '/sections/cta_2.php';
require get_template_directory() . '/sections/contact.php';
require get_template_directory() . '/sections/email_list_section.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';



/**
 * Custom template tags for this theme.
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
 * Register Custom Navigation Walker
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

