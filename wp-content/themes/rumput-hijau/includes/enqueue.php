<?php
/**
 * This file contains the template enqueue scripts & styles
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 * 
 */
 
add_action( 'admin_print_styles-appearance_page_theme_options', 'rumputhijau_admin_enqueue_script' );
add_action('wp_enqueue_scripts', 'rumputhijau_enqueue_scripts');
add_action('wp_enqueue_scripts', 'rumputhijau_enqueue_styles');
add_action('wp_print_styles', 'rumputhijau_deregister_styles', 100);
add_action('wp_head', 'rumputhijau_ie_style', 10);

/**
 * Enqueue styles and scripts for the theme options page
 *
 * @since Rumput Hijau 1.0.8
 */
function rumputhijau_admin_enqueue_script( $hook_suffix ) {
	
	wp_enqueue_style( 'rumputhijau-options-style', get_template_directory_uri() . '/includes/options/style/admin.css', false, '1.0.0');
	wp_enqueue_style('thickbox');
	
	
	wp_register_script('rumputhijau_my-upload', get_template_directory_uri().'/includes/options/js/theme-options.js', array('jquery','media-upload','thickbox'));
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('rumputhijau_my-upload');

}

/**
 * Enqueue scripts for front-end
 *
 * @since Rumput Hijau 1.1.1
 */
function rumputhijau_enqueue_scripts() {
	
	wp_deregister_script( 'jquery' );
	
	wp_enqueue_script( 'jquery-lib', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', 'jquery', '1.7.2', false );
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.5.3.min.js', 'jquery', '2.5.3', false );
	
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery', '20120330', true );
	
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', 'jquery', '20120330', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
}
	
/**
 * Enqueue styles for front-end
 *
 * @since Rumput Hijau 1.1.1
 */
function rumputhijau_enqueue_styles() {
	
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.1.2', 'all' );
	
	wp_enqueue_style('print', get_template_directory_uri() . '/css/print.css', '', '1.0.0', 'print');
	
	wp_enqueue_style('shortcodes',     get_template_directory_uri() . '/css/shortcodes.css', '', '1.0.0', 'all');
	
}

/**
 * Deregistering styles
 *
 * @since Rumput Hijau 1.1.1
 */
function rumputhijau_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' ); // deregistering default wp-pagenavi style
}


/**
 * Custom IE style
 *
 * @since Rumput Hijau 1.0.8
 */

function rumputhijau_ie_style() {?>
<!--[if gte IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ie.css" media="screen" />
<![endif]-->
<?php }