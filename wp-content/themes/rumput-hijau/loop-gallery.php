<?php
/**
 * The template for displaying posts in the Gallery Post Format on index and archive pages
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="content-right">
		
		<div class="entry-content">
			<?php
				if(is_single()):
					the_content();
				elseif ( post_password_required() ) :
					the_content( __( 'View the pictures &rarr;', 'rumputhijau' ) );
				else : 
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'full' ); ?>

						<figure class="gallery-thumb">
							<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</figure><!-- end gallery-thumb -->
						
						<p class="pics-count"><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>', $total_images, 'rumputhijau' ), 'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'rumputhijau' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"', number_format_i18n( $total_images ) ); ?></p>
				
				<?php endif; 
				the_excerpt();
			?>
			<?php endif; ?>
		</div>

		<?php wp_link_pages( array( 'before' => '<div class="post-pages"><span>' . __( 'Pages:', 'rumputhijau' ) . '</span>', 'after' => '</div>' ) ); ?>
		
	
	</div><!-- end .content-right -->
	
	<?php rumputhijau_content_left(); // Defined in includes/template.php ?>

</div><!-- end #post-<?php the_ID(); ?> -->