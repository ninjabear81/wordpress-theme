<?php
/*
Template Name: Sitemap Page
*/
?>
<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<div class="entry-content">
				<?php the_content(); ?>
				
				<h2><?php _e('Pages','rumputhijau'); ?></h2>
					<ul><?php wp_list_pages('sort_column=menu_order&depth=0&title_li='); ?></ul>
				
				<h2><?php _e('Categories','rumputhijau'); ?></h2>
					<ul><?php wp_list_categories('depth=0&title_li=&show_count=1'); ?></ul>
				
				<h2><?php _e('Archives','rumputhijau'); ?></h2>
					<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
					
				<h2><?php _e('Tags','rumputhijau'); ?></h2>
					<?php wp_tag_cloud('smallest=10&largest=18&number=&order=desc&format=flat'); ?>
				
				<?php edit_post_link( __( 'Edit', 'rumputhijau' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			
		</div><!-- end #post-<?php the_ID(); ?> -->
		
		<?php comments_template( '', true ); ?>
		
	  <?php endwhile; endif; ?>

<?php get_footer(); ?>