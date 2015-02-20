<?php
/**
 * The Sidebar containing the primary blog sidebar
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 0.1
 */
// hide sidebars with sidebars=false custom field
if ( is_singular() && get_post_meta( $post->ID, "sidebars", $single = true ) == "false" ) {
	return;
}

if ( is_active_sidebar( 'sidebar-1' ) ) {
	do_action( 'skeleton_before_sidebar' );
	dynamic_sidebar( 'sidebar-1' );
	?>
	<div class="acp-insert">
		<img class="scale-with-grid" src="<?php bloginfo('template_directory'); ?>/images/acp-logo.png" alt="">
		<p>
			Acoustic Ceiling Products (ACP) develops innovative home decor products that add beauty and value to any environment.
		</p>
		<p>
			Backed by 50 years of contracting experience, ACP's vinyl and thermoplastic products blend ingenuity with style – giving 
			customers finished projects that feature easy installation, quality, affordability and timeless appeal.
		</p>
	</div>			
	<?php
	do_action( 'skeleton_after_sidebar' );
}
?>

