<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.0
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'rumputhijau' ); ?>" />
	<input class="search-button" type="image" src="<?php echo get_template_directory_uri(); ?>/images/search-icon.png" value="Go" />
</form>