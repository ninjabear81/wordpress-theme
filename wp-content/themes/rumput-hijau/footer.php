<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.1.0
 */
?>

	</div><!-- End #main-content -->

	<?php 
	if(!is_page_template('page-fullwidth.php'))
	get_sidebar(); ?>	
	
	</div><!-- End #container -->

</div> <!-- End #wrapper -->

<div id="footer">
	
	<?php get_sidebar( 'footer' ); ?>
	
	<div class="footer-credits">
		<div class="inside-footer clearfix">
			<div class="footer-left">
				<?php 
					if (apply_filters('rumputhijau_credit', true)) {
						echo 'Designed by <a href="http://satrya.me" target="_blank" title="Front-end web developer">Satrya</a>';
					}
				?>
			</div>
			
			<div class="footer-right">
				&copy;  Copyright <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
			</div>
		</div><!-- end .inside-footer -->
	</div><!-- end .footer-credits -->

</div><!-- end #footer -->
	
<?php wp_footer(); ?>

</body>
</html>