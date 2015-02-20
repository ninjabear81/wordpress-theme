<?php get_header(); ?>
<div id="content">
<div id="articleContent"> 
<?php the_post(); ?>
<div class="article">
<h1 class="page-title"><?php _e( 'Category Archives:', 'blankslate' ) ?> <span><?php single_cat_title() ?></span></h1>

<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
<?php rewind_posts(); ?>
<?php get_template_part( 'nav', 'above' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; ?>
</div>
<?php get_template_part( 'nav', 'below' ); ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>