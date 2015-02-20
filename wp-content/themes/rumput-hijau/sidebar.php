<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
$options = rumputhijau_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'one-column' != $current_layout ) :
?>

<div id="sidebar">
	<?php do_action( 'rumputhijau_before_sidebar' ); ?>
	<?php if ( !dynamic_sidebar( 'General' )): ?>
	<?php endif; ?>
	
</div><!-- end #sidebar -->
<?php endif; ?>