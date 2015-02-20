<?php
/*
Template Name: DIY Home
*/
?>
<?php require('wp-blog-header.php');?>
<?php get_header(); ?>
<div id="content">
<div id="articleContent">
<!--<?php get_template_part( 'nav', 'above' ); ?>-->
<?php while ( have_posts() ) : the_post() ?>
 <?php global $more; $more = 0; ?>
<?php
global $post;
$args = array( 'posts_per_page' => 3);
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : 
  setup_postdata( $post ); ?>
    <div class="article">
    <p class="ArticleHeading"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_content('Read on...'); ?>
    </div>
<?php endforeach;
wp_reset_postdata(); ?>
</div>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>