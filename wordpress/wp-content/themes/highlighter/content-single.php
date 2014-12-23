<?php
/**
 * @package highlighter
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php highlighter_posted_on(); ?>
                    
<?php 
    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
        echo '<span class="comments-link">';
        comments_popup_link( __( 'Leave a comment', 'highlighter' ), __( '1 Comment', 'highlighter' ), __( '% Comments', 'highlighter' ) );
        echo '</span>';
    }
?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'highlighter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php highlighter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
