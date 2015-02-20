<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	<?php 
	$img = get_post_meta(get_the_ID(), 'rumputhijau_meta_box_input_image', true);
	if($img != ""):
	?>
		<span class="big-image">
			<img title="<?php the_title(); ?>" src="<?php echo $img; ?>" />
		</span>
	<?php endif; ?>
	
	<div class="content-right">
		
		<div class="entry-content">
		
			<?php 
				if( is_search() || is_archive() ): // full content only for archives & search results
					the_excerpt( __('Read the full article &raquo;', 'rumputhijau') ); 
				else :
					the_content();
				endif; 
			?>
			
		</div>

		<?php wp_link_pages( array( 'before' => '<div class="post-pages"><span>' . __( 'Pages:', 'rumputhijau' ) . '</span>', 'after' => '</div>' ) ); ?>
		
		<div class="entry-meta">
			<?php rumputhijau_entry_meta(); // Defined in includes/template.php ?>	
		</div>
	
	</div><!-- end .content-right -->
	
	<?php rumputhijau_content_left(); // Defined in includes/template.php ?>

</div><!-- end #post-<?php the_ID(); ?> -->