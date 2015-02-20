<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="content-right">
		
		<?php $hTag  = (is_single())? 'h1':'h2'; ?>
		<<?php echo $hTag; ?> class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rumputhijau' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></<?php echo $hTag; ?>>
		
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	
	</div><!-- end .content-right -->
	
	<?php rumputhijau_content_left(); // Defined in includes/template.php ?>

</div><!-- end #post-<?php the_ID(); ?> -->