<?php 
/**
 * This file contains all shortcodes
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */

add_shortcode('notice', 'rumputhijau_notice');
 
function rumputhijau_notice($atts, $content = null) {
	extract( shortcode_atts( array(
			'style' => 'normal'
			), $atts ) );
	
	return '<span class="notice '. $style .'">' . $content . '</span>';
}
 

?>