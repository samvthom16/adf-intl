<?php
/**
 * ADF functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ADF
 */

if ( ! function_exists( 'adf_intl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adf_intl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ADF, use a find and replace
		 * to change 'adf-intl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adf-intl', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'adf-intl' ),
			'about' => esc_html__( 'About', 'adf-intl' ),
			'work' => esc_html__( 'Our Work', 'adf-intl' ),
			'connect' => esc_html__( 'Connect', 'adf-intl' ),
			'bottom' => esc_html__( 'Footer Bottom', 'adf-intl' ),
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
		add_theme_support( 'custom-background', apply_filters( 'adf_intl_custom_background_args', array(
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

		/** New Image sizes **/
		add_image_size( 'square', 645, 560, true );
	}
endif;
add_action( 'after_setup_theme', 'adf_intl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adf_intl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adf_intl_content_width', 640 );
}
add_action( 'after_setup_theme', 'adf_intl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adf_intl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adf-intl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adf-intl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adf_intl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adf_intl_scripts() {
	$style_ver = filemtime( get_stylesheet_directory() . '/style.css' );
	wp_enqueue_style( 'adf-intl-style', get_stylesheet_uri(), '', $style_ver );

	wp_enqueue_script( 'functions', get_template_directory_uri() . '/_js/functions-min.js', array('jquery'), '20160606', true );

	wp_enqueue_script( 'sow', get_template_directory_uri() . '/_js/lib/sow.js', array('jquery'), '20190617', true );
	wp_enqueue_style( 'sow-style', get_template_directory_uri() . '/css/sow.css', array(), '20190617' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_page_template( 'page-epn.php') ) {
		wp_dequeue_style('adf-intl-style');
		wp_enqueue_style( 'epn-style', get_template_directory_uri() . '/css/epn.css' );
		wp_dequeue_script('functions');
		wp_enqueue_script( 'epn-js', get_template_directory_uri() . '/_js/epn-min.js', array('jquery'), '20160606', true );
	}
	if ( is_page_template( 'page-udhr.php') || is_page_template( 'page-udhr-confirmation.php') || is_page_template( 'page-udhr-single.php') ) {
		wp_dequeue_style('adf-intl-style');
		wp_enqueue_style( 'udhr-style', get_template_directory_uri() . '/css/udhr.css' );
		wp_dequeue_script('functions');
		wp_enqueue_script( 'udhr-js', get_template_directory_uri() . '/_js/udhr-min.js', array('jquery'), '20160606', true );
	}
	if ( is_page_template( 'page-landing.php') ) {
		wp_enqueue_style( 'landing-style', get_template_directory_uri() . '/css/landing.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'adf_intl_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//add_filter( 'the_content', 'quotes_and_images' );
/*function quotes_and_images($content) {
	$content = get_the_content();
	$regexp='/\<blockquote\>(.*?)\<\/blockquote\>/';
	$num = preg_match_all($regexp,$content,$quotes);
	//$content = preg_replace("/<img[^>]+>/i", "", $content);

	$i=0;
	//var_dump($quotes);
	foreach($quotes[0] as $quote) {
		//echo "<pre>".$quote. "</pre>";
		//$block = $quote;
		$text = urlencode($quotes[1][$i]);
		$replace = '<blockquote>'.$quotes[1][$i].'<a href = "#" data-text="'.$text.'">Tweet</a></blockquote>';
		preg_replace('/'.$quote.'\b/', $replace, $content, 1);
		$i++;
	}
	return wpautop($content);
}*/
function create_post_type() {
	$args = array(
		'label' => 'News',
		'labels' => array(
			'singular_name' => 'News Release'
		),
		'description' => 'News Releases',
		'public' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'show_ui' => true,
		'menu_position' => 4,
		'taxonomies' => array('category','issues','regions'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author'),
		'menu_icon' => 'dashicons-admin-site',
	);
	register_post_type( 'news', $args );

	$args = array(
		'label' => 'Commentaries',
		'labels' => array(
			'singular_name' => 'Commentary'
		),
		'description' => 'Commentaries',
		'public' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'show_ui' => true,
		'menu_position' => 4,
		'taxonomies' => array('category','issues','regions'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author'),
		'menu_icon' => 'dashicons-media-document',
	);
	register_post_type( 'commentary', $args );

	$args = array(
		'label' => 'Legal Matters',
		'labels' => array(
			'singular_name' => 'Legal Matter'
		),
		'description' => 'Legal Matters',
		'public' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'show_ui' => true,
		'menu_position' => 4,
		'taxonomies' => array('category','issues','regions'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author'),
		'menu_icon' => 'dashicons-analytics',
	);
	register_post_type( 'legal', $args );

	$args = array(
		'label' => 'Campaigns',
		'labels' => array(
			'singular_name' => 'Campaign'
		),
		'description' => 'Campaigns',
		'public' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'show_ui' => true,
		'menu_position' => 4,
		'taxonomies' => array('category','issues','regions'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'author'),
		'menu_icon' => 'dashicons-groups',
	);
	register_post_type( 'campaign', $args );

	$args = array(
		'label' => 'Resources',
		'labels' => array(
			'singular_name' => 'Resource'
		),
		'description' => 'Resources',
		'public' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'show_ui' => true,
		'menu_position' => 4,
		'taxonomies' => array('category','issues','regions','type'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
		'menu_icon' => 'dashicons-format-aside',
	);
	register_post_type( 'resource', $args );
}
add_action( 'init', 'create_post_type' );
function create_taxonomy() {
	register_taxonomy(
		'issues',
		array('news','commentary','legal','campaign','resource'),
		array(
			'label' => __( 'Issues' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy(
		'regions',
		array('news','commentary','legal','campaign','resource'),
		array(
			'label' => __( 'Regions' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy(
		'type',
		array('resource'),
		array(
			'label' => __( 'Types' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_taxonomy' );
//Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Global Options');
}
//Excerpt
function excerpt($limit) {
	$orig_excerpt = get_the_content();
	$orig_excerpt = strip_shortcodes( $orig_excerpt );
	$regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';

	$excerpt = preg_replace($regex,'',$orig_excerpt);

	$excerpt = strip_tags($excerpt, '<p>');
	$excerpt = explode(' ', $excerpt, $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
//Auto include fitvids on embed
function your_theme_embed_filter( $output, $data, $url ) {

	$return = '<div class="fitvids">'.$output.'</div>';
	return $return;

}
add_filter('oembed_dataparse', 'your_theme_embed_filter', 90, 3 );
add_action('pre_get_posts', 'resource_archives');
function resource_archives($q)
{
    if(!is_post_type_archive('resource'))
        return;

    $q->set('posts_per_page', 12); // or however many you want
}

function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('news', 'commentary', 'campaign', 'legal', 'resource');
    return $qv;
}
add_filter('request', 'myfeed_request');

function my_pre_get_posts( $query ) {
	// do not modify queries in the admin
	if( is_admin() ) {
		return $query;
	}
	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'legal' ) {
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'action_date');
		$query->set('order', 'DESC');
	}
	return $query;
}

add_action('pre_get_posts', 'my_pre_get_posts');

/* ADD SOW FROM THE THEME */
add_action('siteorigin_widgets_widget_folders', function( $folders ){
	$folders[] = get_template_directory() . '/so-widgets/';
	return $folders;
});

function getUniqueID( $data ){
	return substr( md5( json_encode( $data ) ), 0, 8 );
}

add_filter( 'excerpt_length', function(){
	return 35;
}, 999 );

include("inc/orbit-inc.php");
