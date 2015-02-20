<?php
/**
 * The template for displaying main functions
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */

add_action( 'after_setup_theme', 'rumputhijau_setup' );
if ( ! function_exists( 'rumputhijau_setup' ) ):

function rumputhijau_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) )
	$content_width = 700;
	
	/* Make Rumput Hijau available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Rumput Hijau, use a find and replace
	 * to change 'rumputhijau' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rumputhijau', get_template_directory() . '/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( 'css/editor-style.css' );
	
	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );
	
	// Add support for custom backgrounds
	add_custom_background();
	
	// Add support post-formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote' ) );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'rumputhijau' ) );
	
	// This theme uses Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );
	// Add custom image sizes
	add_image_size( '150px' , 150, 100, true ); // 150px thumbnail
	
	// Add custom header image
	add_custom_image_header('', 'rumputhijau_admin_header_style');
	
	// The default header text color
	define('HEADER_TEXTCOLOR', '');
	
	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );
	
	// Turn on random header image rotation by default.
	add_theme_support( 'custom-header', array( 'random-default' => true ) );
	
	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'default' => array(
			'url' => '%s/images/headers/default-header.jpg',
			'thumbnail_url' => '%s/images/headers/default-header-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'Default', 'rumputhijau' )
		),
		'rumput-hijau-1' => array(
			'url' => '%s/images/headers/rumput-hijau-1.jpg',
			'thumbnail_url' => '%s/images/headers/rumput-hijau-1-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'Rumput Hijau 1', 'rumputhijau' )
		),
		'rumput-hijau-2' => array(
			'url' => '%s/images/headers/rumput-hijau-2.jpg',
			'thumbnail_url' => '%s/images/headers/rumput-hijau-2-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'Rumput Hijau 2', 'rumputhijau' )
		),
		'rumput-hijau-3' => array(
			'url' => '%s/images/headers/rumput-hijau-3.jpg',
			'thumbnail_url' => '%s/images/headers/rumput-hijau-3-thumb.jpg',
			/* translators: header image description */
			'description' => __( 'Rumput Hijau 3', 'rumputhijau' )
		),
	) );
	
	// The height and width of your custom header.
	// Add a filter to rumputhijau_header_image_width and rumputhijau_header_image_width to change these values.
	define('HEADER_IMAGE_WIDTH', apply_filters( 'rumputhijau_header_image_width', 950) );
	define('HEADER_IMAGE_HEIGHT', apply_filters( 'rumputhijau_header_image_width', 200) );
	
	// no text in the custom header
	define('NO_HEADER_TEXT', true );

	// Styles the header image
	function rumputhijau_admin_header_style() { ?>
	<style type="text/css">
	#headimg {
		background:#fff url(<?php header_image() ?>) no-repeat center;  
		height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
		width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	}
	</style>
	<?php
	}
	
	// Load the theme options & the theme options functions
	require_once get_template_directory() . '/includes/options/options.php';
	require_once get_template_directory() . '/includes/options/options-functions.php';
	
} 
endif; // end rumputhijau_setup()

/**
 * Load all functions
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */

require_once get_template_directory() . '/includes/filters.php';
require_once get_template_directory() . '/includes/enqueue.php';
require_once get_template_directory() . '/includes/extensions.php';
require_once get_template_directory() . '/includes/metabox.php';
require_once get_template_directory() . '/includes/template.php';
require_once get_template_directory() . '/includes/widgets.php';
require_once get_template_directory() . '/includes/shortcodes.php';

?>