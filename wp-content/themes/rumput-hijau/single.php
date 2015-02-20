<?php 
/**
 * The Template for displaying single posts
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.6
 */
 
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php 
			if(get_post_format() == '')
				get_template_part('loop', 'single' );
			else
				get_template_part('loop', get_post_format() );
		?>
	
	<div class="post-nav clearfix">
		<span class="alignleft"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'rumputhijau' ) ); ?></span>
		<span class="alignright"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'rumputhijau' ) ); ?></span>
	</div>
	
	<?php comments_template( '', true ); ?>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>