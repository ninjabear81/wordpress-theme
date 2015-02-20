<?php require('wp-blog-header.php');?>
<?php get_header(); ?>
<div id="content">
<div id="articleContent">
<?php while ( have_posts() ) : the_post() ?>
<div class="article">
<?php get_template_part( 'nav', 'above-single' ); ?>
<div class="clear"></div>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below-single' ); ?>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>