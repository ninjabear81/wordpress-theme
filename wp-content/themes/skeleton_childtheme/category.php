<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
get_header();
do_action( 'skeleton_before_content' );
?>
<?php
if ( function_exists( 'z_taxonomy_image_url' ) && z_taxonomy_image_url() != null ) {
	echo '<div class="category-image-header">';
//	echo '<figure class="category-image">';
//	echo get_the_post_thumbnail( $post_id, array(880, 587) );
	echo '<img class="category-image scale-with-grid" src="' . z_taxonomy_image_url() . '" alt="">';
//	echo '</figure>';
}
?>
<h1 class="page-title"><?php
	printf( __( '%s', 'smpl' ), single_cat_title( '', false ) );
	?></h1>
<?php
if ( function_exists( 'z_taxonomy_image_url' ) && z_taxonomy_image_url() != null ) {
	echo '</div>';
}
?>
<?php
$category_description = category_description();
if ( !empty( $category_description ) )
	echo '' . $category_description . '';
/* Run the loop for the category page to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-category.php and that will be used instead.
 */
get_template_part( 'loop', 'category' );
do_action( 'skeleton_after_content' );
get_sidebar();
get_footer();
?>
