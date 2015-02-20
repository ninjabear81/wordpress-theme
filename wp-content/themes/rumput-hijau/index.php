<?php 
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
 
 get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
	<?php get_template_part('loop', get_post_format()); ?>

<?php endwhile; else: ?>
	<h2 class="center"><?php _e('Not Found', 'rumputhijau'); ?></h2>
	<p class="center"><?php _e('Sorry, but you are looking for something that is not here.', 'rumputhijau'); ?></p>
<?php endif; ?>

<?php 
global $wp_query;
if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="paging">
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
		<div class="prev"><?php next_posts_link( __('&larr; Older posts', 'rumputhijau') ); ?></div>
		<div class="next"><?php previous_posts_link( __('Newer posts &rarr;', 'rumputhijau') ); ?></div>
	<?php endif; ?>
</div><!-- end .paging -->
<?php endif; ?>
	
<?php get_footer(); ?>