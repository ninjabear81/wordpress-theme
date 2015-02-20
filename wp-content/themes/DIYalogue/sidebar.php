<div id="sidebar">
<div id="secondaryContent">

	 <?php $permalink = get_permalink( 6 ); ?>
            <ul id="siteSections">
				<li><h2>Blog Categories</h2></li>
                <li><a href="<?php echo esc_url( get_category_link( 10 ) ); ?>" title="DIY"><img src="<?php bloginfo('url');?>/wp-content/themes/DIYalogue/images/DIY.jpg"></a></li>
                <li><a href="<?php echo esc_url( get_category_link( 27 ) ); ?>" title="Healthy Living"><img src="<?php bloginfo('url');?>/wp-content/themes/DIYalogue/images/healthy-living.jpg"></a></li>
                <li><a href="<?php echo esc_url( get_category_link( 28 ) ); ?>" title="Home Decor"><img src="<?php bloginfo('url');?>/wp-content/themes/DIYalogue/images/Home-decor.jpg"></a></li>
            </ul>
	<div id="AboutMe">
    <h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'About' ) ) ); ?>">About ACP</a></h2>
            
          <?php
				
//$query = new WP_Query('page_id=6');
//foreach($query as $post) : 
//setup_postdata($post); ?>
<?php
$page_id = 6;
$page_data = get_page($page_id);?>
<?php 
echo apply_filters('the_content', $page_data->post_excerpt);
?>
<?php //global $more;$more = 0;?>
	<!--<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>-->
	<?php //the_excerpt(); ?>
<?php //endforeach; ?>				
            </div>

            <?php get_search_form( $echo ); ?>
             
            <div id="sidebar-primary" class="sidebar">
				<?php if ( is_active_sidebar( 'primary' ) ) : ?>

				<?php dynamic_sidebar( 'primary' ); ?>

				<?php else : ?>

		<!-- Create some custom HTML or call the_widget().  It's up to you. -->

				<?php endif; ?>
                <div id="socialArea">
            <div class="fb-like" data-href="http://www.diyalogue.com/" data-send="false" data-width="230" data-show-faces="true"></div>
            </div>

</div>
</div>