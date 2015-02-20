<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
get_header();
do_action( 'skeleton_before_content' );
?>
<?php
$args = array(
	'numberposts' => 1,
);
$post1 = get_posts( $args );
if ( $post1 ) {
	foreach ( $post1 as $post ) {
		setup_postdata( $post );
		?>
		<div class="twelve columns no-margin gray-bg-grad">
			 <h1 class="categories-links"><?php the_category(' ')?></h1>
			 <h2 style="clear: both;"><a style="color: #333;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php echo get_the_date() . ' by ' . get_the_author(); ?></p>
			<?php
			echo '<figure class="featured-image scale-with-grid">';
			the_post_thumbnail();
			echo '<figcaption class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</figcaption></figure>';
			ob_start();
			the_content( 'Read the full post', true );
			$postOutput = preg_replace( '/<img[^>]+./', '', ob_get_contents() );
			ob_end_clean();
			echo '<div class="home-post-content">';
			echo $postOutput;
			echo '</div><hr/>';
			?>
		<?php
		}
	}
	?>
</div>

<?php
$args = array(
	'numberposts' => 1,
	'offset' => 1,
);
$post2 = get_posts( $args );
if ( $post2 ) {
	foreach ( $post2 as $post ) {
		setup_postdata( $post );
		?>
		<div class="six columns alpha">
			 <h1 class="categories-links"><?php the_category(' ')?></h1>
			<h2 style="clear: both; font-size: 1.2em;"><a style="color: #333;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php echo get_the_date() . ' by ' . get_the_author(); ?></p>
			
			<?php
			echo '<div class="featured-image scale-with-grid">';
			the_post_thumbnail();
			echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span></div>';
//			the_post_thumbnail();
			the_excerpt();
			?><?php
		}
	}
	?>
		</div>
<?php
$args = array(
	'numberposts' => 1,
	'offset' => 2,
);
$post2 = get_posts( $args );
if ( $post2 ) {
	foreach ( $post2 as $post ) {
		setup_postdata( $post );
		?>
		<div class="six columns omega">
			 <h1 class="categories-links"><?php the_category(' ')?></h1>
			<h2 style="clear: both; font-size: 1.2em;"><a style="color: #333;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php echo get_the_date() . ' by ' . get_the_author(); ?></p>
			
			<?php
			echo '<div class="featured-image scale-with-grid">';
			the_post_thumbnail();
			echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span></div>';
//			the_post_thumbnail();
			the_excerpt();
			?>
		</div>
	<?php
	}
}
do_action( 'skeleton_after_content' );
get_sidebar();
get_footer();
?>
