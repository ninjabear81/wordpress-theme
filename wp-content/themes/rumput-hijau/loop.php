<?php 
/**
 * The default template for displaying content
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
	
		<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rumputhijau' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<div class="entry-content">
		
			<?php if(has_post_thumbnail()){ ?>
				<span class="entry-thumbnail">
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('150px', array( 'class' => 'photo', 'alt' => get_the_title(), 'title' => get_the_title()));?>
					</a>
				</span>
			<?php } ?>
		
			<?php 
				if( is_home() || is_front_page() ): // full content only for home page
					the_content( __('Read the full article &raquo;', 'rumputhijau') ); 
				else :
					the_excerpt();
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