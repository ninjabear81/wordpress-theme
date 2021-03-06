<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'single' ); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta">
				<?php skeleton_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
				echo '<figure class="featured-image scale-with-grid">';
				the_post_thumbnail();
				echo '<figcaption class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</figcaption></figure>';
				?>
				<?php
                                //the_content();
				ob_start();
				the_content( 'Read the full post', true );
				$postOutput = preg_replace( '/<img[^>]+./', '', ob_get_contents(),1 );
				ob_end_clean();
				echo $postOutput;
				?>
				<div class="clear"></div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'smpl' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries   ?>

				<div id="entry-author-info">
					<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'skeleton_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->

					<div id="author-description">
						<h2><?php printf( esc_attr__( 'About %s', 'smpl' ), get_the_author() ); ?></h2>
			<?php the_author_meta( 'description' ); ?>
						<div id="author-link">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
			<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'smpl' ), get_the_author() ); ?>
							</a>
						</div><!-- #author-link	-->
					</div><!-- #author-description -->
				</div><!-- #entry-author-info -->

		<?php endif; ?>

			<div class="entry-utility">
				<?php skeleton_posted_in(); ?>
		<?php edit_post_link( __( 'Edit', 'smpl' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->

		</div><!-- #post-## -->

		<?php do_action( 'skeleton_page_navi' ); ?>

		<?php comments_template( '', true ); ?>

	<?php
	endwhile; // end of the loop. ?>