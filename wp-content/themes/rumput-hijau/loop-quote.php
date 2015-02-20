<?php
/**
 * The template for displaying posts in the Quote Post Format on index and archive pages
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	<div class="content-right">
		
		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php wp_link_pages( array( 'before' => '<div class="post-pages"><span>' . __( 'Pages:', 'rumputhijau' ) . '</span>', 'after' => '</div>' ) ); ?>
		
	
	</div><!-- end .content-right -->
	
	<?php rumputhijau_content_left(); // Defined in includes/template.php ?>

</div><!-- end #post-<?php the_ID(); ?> -->