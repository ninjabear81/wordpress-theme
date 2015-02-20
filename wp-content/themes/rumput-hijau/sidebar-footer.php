<?php
/**
 * The Sidebar containing the footer widget area.
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.6
 */
$options = rumputhijau_get_theme_options();
$current_layout = $options['theme_layout'];
?>

<div id="footer-sidebar">
	<div class="footer-sidebar-inner clearfix">

	<div class="footer-1 widget-footer">
		<?php if ( !dynamic_sidebar( 'Footer Widget 1' )): ?>
		<?php endif; ?>
	</div>
	
	<div class="footer-2 widget-footer">
		<?php if ( !dynamic_sidebar( 'Footer Widget 2' )): ?>
		<?php endif; ?>
	</div>
	
	<div class="footer-3 widget-footer">
		<?php if ( !dynamic_sidebar( 'Footer Widget 3' )): ?>
		<?php endif; ?>
	</div>
	
	<?php if ( 'one-column' != $current_layout ) : ?>
	<div class="footer-4 widget-footer">
		<?php if ( !dynamic_sidebar( 'Footer Widget 4' )): ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	</div><!-- .footer-sidebar-inner -->
</div><!-- end #footer-sidebar -->