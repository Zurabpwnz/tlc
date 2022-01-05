<?php
$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
$IfModifiedSince = false;
if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
header('Last-Modified: '. $LastModified);

if ($_SERVER['REQUEST_URI'] == '/') {
  $expires = 5;
}
else if (in_array($_SERVER['REQUEST_URI'], array('/kontakty/', '/o-nas/'))) {
  $expires = 14;
}
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + $expires*24*60*60));
/**
 * TLC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TLC
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('tlc_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function tlc_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on TLC, use a find and replace
         * to change 'tlc' to the name of your theme in all the template files.
         */
        load_theme_textdomain('tlc', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'top-menu' => esc_html__('Верхнее меню', 'tlc'),
                'footer-1' => esc_html__('Футер-1', 'tlc'),
                'footer-2' => esc_html__('Футер-2', 'tlc'),
                'footer-3' => esc_html__('Футер-3', 'tlc'),
                'footer-4' => esc_html__('Футер-4', 'tlc'),
                'copyright-menu' => esc_html__('Копирайт меню', 'tlc'),
            )
        );

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
                'tlc_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'width' => 131,
                'height' => 77,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'tlc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tlc_content_width()
{
    $GLOBALS['content_width'] = apply_filters('tlc_content_width', 640);
}

add_action('after_setup_theme', 'tlc_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tlc_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'tlc'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'tlc'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'tlc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function tlc_scripts()
{
    wp_enqueue_style('tlc-style', get_stylesheet_uri(), array(), false);
//	wp_style_add_data( 'tlc-style', 'rtl', 'replace' );

    wp_enqueue_style('style-vendors', get_template_directory_uri() . '/assets/css/vendors~main.css', '', '');
    wp_enqueue_style('style-main', get_template_directory_uri() . '/assets/css/main.css', '', '');

    wp_enqueue_script('tlc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), false, true);

    wp_enqueue_script('script-vendors', get_template_directory_uri() . '/assets/js/vendors~main.js', array(), false, true);
    wp_enqueue_script('script-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tlc_scripts');


function true_block_admin_pages_redirect() {
	global $pagenow;
	// тут перечисляем в массиве страницы, которые хотим скрыть, я например закрыл весь раздел меню "Плагины"
	$pages_to_block = array(
		'plugins.php',
		'plugin-install.php',
		'plugin-editor.php'
	);
	if(in_array($pagenow, $pages_to_block)){
		// указываем URL, на который будем перенаправлять тех, у кого нет доступа, в данном случае - главная страница админки
		wp_redirect( admin_url('/') );
		exit;
	}
}

// в этом условии необходимо перечислить права, которые необходимо иметь пользователю, чтобы получить доступ
// удалите условие, если нужно закрыть страницы для всех
if(!current_user_can('administrator')){
	add_action('admin_init', 'true_block_admin_pages_redirect');
}


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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Customize breadcrumbs.
 */
require get_template_directory() . '/inc/customize/breadcrumbs.php';


/**
 * Customize pagination.
 */
require get_template_directory() . '/inc/customize/pagination.php';


/**
 * Customize theme-options
 */
require get_template_directory() . '/inc/customize/theme-options.php';


/**
 * Customize fix upload svg files
 */
require get_template_directory() . '/inc/customize/fix-svg.php';


/**
 * Customize post views
 */
require get_template_directory() . '/inc/customize/post-views.php';


/*
 * excerpt_length
 */
require get_template_directory() . '/inc/customize/excerpt.php';


/*
 * Reviews rating
 */
require get_template_directory() . '/inc/customize/reviews_rating.php';


/*
 * Star ratings
 */
require get_template_directory() . '/inc/customize/star-ratings.php';


// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

/* excerpt default */
add_filter('excerpt_more', function($more) {
    return '...';
});



add_image_size('post-thumb', 415, 300, array('left', 'top'));
add_image_size('konsalting-slider-thumb', 415, 400, array('left', 'top'));
add_image_size('project-thumb', 880, 440, array('left', 'top'));
add_image_size('service-thumb', 780, 385, array('left', 'top'));
//add_image_size( 'reviews-thumb', 130, 100, true );
//add_image_size( 'category-thumb', 345, 480, true );
//add_image_size( 'object-thumb', 440, 400, true );