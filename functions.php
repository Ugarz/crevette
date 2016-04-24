<?php
/**
 * crevetterose functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crevetterose
 */

/*
	===============================
		MY ACTIONS
	===============================
*/
remove_action('wp_head', 'wp_generator');

/*
	===============================
		ADD CUSTOM POST TYPE IN LOOP
	===============================
*/
function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'post', 'Protfolio' ) );
    }
  }
}

add_action('pre_get_posts','search_filter');
/*
	===============================
		INCLUDE JS AND CSS
	===============================
*/
/*function settingsCrevette_script_enqueue(){
	wp_enqueue_style('styleCrevette', get_template_directory_uri() . '/css/crevette.css', array(), '1.0.0', 'all');
	wp_enqueue_script('scriptCrevette', get_template_directory_uri() . '/js/crevette.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_script', 'settingsCrevette_script_enqueue');*/

/*
	===============================
		CUSTOM POST TYPE
		https://youtu.be/vSM7w3zzlSU
	===============================
*/
function settingsCrevette_post_type(){
	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Ajouter un élément',
		'all_items' => 'Tous les éléments',
		'add_new_item' => 'Ajoute un élement',
		'edit_item' => 'Editer un élément',
		'new_item' => 'Nouvel élément',
		'view_item' => 'Afficher un élément',
		'search_item' => 'Chercher un élément',
		'not_found' => 'Aucun élément trouvé',
		'not_found_in_trash' => 'Aucun élément trouvé dans la poubelle',
		'parent_item_colon' => 'Element parent'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		/* accessible publiquement */
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio', $args);
}
add_action('init', 'settingsCrevette_post_type');



/*
	===============================
		FROM UNDERSCORES.ME
	===============================
*/

if ( ! function_exists( 'crevetterose_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crevetterose_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on crevetterose, use a find and replace
	 * to change 'crevetterose' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'crevetterose', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'crevetterose' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'crevetterose_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'crevetterose_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crevetterose_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crevetterose_content_width', 640 );
}
add_action( 'after_setup_theme', 'crevetterose_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crevetterose_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'crevetterose' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'crevetterose' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'crevetterose_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crevetterose_scripts() {
	wp_enqueue_style( 'crevetterose-style', get_stylesheet_uri() );
	wp_enqueue_style('styleCrevette', get_template_directory_uri() . '/css/crevette.css', array(), '1.0.0', 'all');
	wp_enqueue_script('scriptCrevette', get_template_directory_uri() . '/js/crevette.js', array(), '1.0.0', true);
	wp_enqueue_script( 'crevetterose-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'crevetterose-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crevetterose_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
