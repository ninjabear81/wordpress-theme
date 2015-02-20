<?php
/**
 * Rumput_Hijau Theme Options Functions
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
 
/**
 * Favicon Option
 *
 * @since Rumput Hijau 1.0.8
 */
 
add_action('wp_head', 'rumputhijau_favicon');
function rumputhijau_favicon() {
	$options = rumputhijau_get_theme_options();
	$favicon = isset($options['favicon'])? $options['favicon']: ''; 
	
	if ( $favicon != "" ): ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
	<?php endif;
}

/**
 * Fonts Option
 *
 * @since Rumput Hijau 1.0.8
 */

add_action('wp_head', 'rumputhijau_add_font_stack');
function rumputhijau_add_font_stack() {
	$options = rumputhijau_get_theme_options();
	$font_stack = $options['font_stack']; ?>

	<style type="text/css">
		body {
			font-family: <?php 
				if ( 'Georgia' == $font_stack )
					echo 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif;'."\n";
				elseif ( 'Arial' == $font_stack )
					echo 'Arial, "Helvetica Neue", Helvetica, sans-serif;'."\n";
				elseif ( 'Verdana' == $font_stack )
					echo 'Verdana, Geneva, Tahoma, sans-serif;'."\n";
				elseif ( 'Helvetica Neue' == $font_stack )
					echo '"Helvetica Neue", Arial, Helvetica, sans-serif;'."\n";
				elseif ( 'Tahoma' == $font_stack )
					echo 'Tahoma, Geneva, Verdana;'."\n";
				elseif ( 'Times New Roman' == $font_stack )
					echo 'Times, "Times New Roman", Georgia, serif;'."\n";
				elseif ( 'Trebuchet MS' == $font_stack )
					echo '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;'."\n";
				?>
			}
	</style>

	<?php do_action( 'rumputhijau_add_font_stack', $font_stack );
}


/**
 * Layouts Option
 *
 * @since Rumput Hijau 1.0.8
 */

add_filter( 'body_class', 'rumputhijau_layout_add_classes' );
function rumputhijau_layout_add_classes( $existing_classes ) {
	$options = rumputhijau_get_theme_options();
	$current_layout = $options['theme_layout'];

	if ( in_array( $current_layout, array( 'right-sidebar') ) )
		$classes = array( 'two-column' );
	else
		$classes = array( 'one-column' );

	if ( 'right-sidebar' == $current_layout )
		$classes[] = 'right-sidebar';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'rumputhijau_layout_add_classes', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}

/**
 * If one-column true, display the one-column.css
 *
 * @since Rumput Hijau 1.1.1
 */
add_action( 'wp_enqueue_scripts', 'rumputhijau_onecol_style' );
function rumputhijau_onecol_style() {
	$options = rumputhijau_get_theme_options();
	$current_layout = $options['theme_layout'];
	
	if ( 'one-column' == $current_layout ):
		wp_enqueue_style('one-column', get_template_directory_uri() . '/css/one-column.css', '', '1.0.0', 'all');
	endif;
}


/**
 * Header Script Option
 *
 * @since Rumput Hijau 1.0.8
 */

add_action('wp_head', 'rumputhijau_header_script');
function rumputhijau_header_script() {
	$options = rumputhijau_get_theme_options();
	$headerScript = isset($options['header-script'])? $options['header-script']: '';
	
	echo stripslashes($headerScript)."\n";
}


/**
 * Tracking Code Option
 *
 * @since Rumput Hijau 1.0.8
 */

add_action('wp_footer', 'rumputhijau_tracking');
function rumputhijau_tracking() {
	$options = rumputhijau_get_theme_options();
	$footercode = isset($options['tracking-script'])? $options['tracking-script']: '';
	
	echo stripslashes($footercode)."\n";
}


/**
 * Google meta verification
 *
 * @since Rumput Hijau 1.1.1
 */
add_action( 'wp_head', 'rumputhijau_google', 5);
function rumputhijau_google() {
	$options = rumputhijau_get_theme_options();
	$google = isset($options['google_meta'])? $options['google_meta']: '';
	
	if($google)
		echo '<meta name="google-site-verification" content="' . $google . '"> ' . "\n";
}

/**
 * Bing meta verification
 *
 * @since Rumput Hijau 1.1.1
 */
add_action( 'wp_head', 'rumputhijau_bing', 5);
function rumputhijau_bing() {
	$options = rumputhijau_get_theme_options();
	$bing = isset($options['bing_meta'])? $options['bing_meta']: '';
	
	if($bing)
		echo '<meta name="msvalidate.01" content="' . $bing . '"> ' . "\n";
}

/**
 * Alexa meta verification
 *
 * @since Rumput Hijau 1.1.1
 */
add_action( 'wp_head', 'rumputhijau_alexa', 5);
function rumputhijau_alexa() {
	$options = rumputhijau_get_theme_options();
	$alexa = isset($options['alexa_meta'])? $options['alexa_meta']: '';
	
	if($alexa)
		echo '<meta name="alexaVerifyID" content="' . $alexa . '"> ' . "\n";
}


/**
 * Custom Css Option
 *
 * @since Rumput Hijau 1.0.8
 */
 
add_action('wp_head', 'rumputhijau_customcss', 10);
function rumputhijau_customcss() {
	$options = rumputhijau_get_theme_options();
	$customcss = isset($options['custom_css'])? $options['custom_css']: '';
	
	$output = "<!-- Custom Css -->"."\n";
	$output .= "<style type=\"text/css\">"."\n";
	$output .= $customcss."\n";
	$output .= "</style>"."\n";
	$output .= "<!-- End Custom Css -->"."\n";
	
	if(!empty($customcss))
		echo $output;
}

?>