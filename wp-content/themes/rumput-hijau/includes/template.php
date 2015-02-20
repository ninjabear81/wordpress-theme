<?php
/**
 * This file contains the template functions that add functionality to the theme
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.1.0
 */
 
/**
 * function to call first image
 *
 * @since Rumput Hijau 1.1.2
 */
function first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if (array_key_exists(1, $matches)) {
		if (array_key_exists(0, $matches[1])) {
			$first_img  = $matches [1] [0];
		}
	}
	
	return $first_img;
}

/**
 * Prints the open graph tags
 *
 * If you want to remove this function in a child theme
 * add this code to the child theme functions.php
 * remove_action('wp_head', 'rumputhijau_open_graph');
 *
 *
 * @since Rumput Hijau 1.1.0
 */
add_action('wp_head', 'rumputhijau_open_graph', 1);
function rumputhijau_open_graph() {
	global $post, $posts;
	$options = rumputhijau_get_theme_options();
	$defaultThumb = isset($options['default-thumb'])? $options['default-thumb']: '';
	$getthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	
if(is_single() || is_page()) {
	$excerpt = ""; 
	if (has_excerpt($post->ID)) {
		$excerpt = esc_attr(strip_tags(get_the_excerpt($post->ID)));
	}else{
		$excerpt = esc_attr(str_replace("\r\n",' ',substr(strip_tags(strip_shortcodes($post->post_content)), 0, 160)));
	}
?>
	<!-- Open Graph Tags -->
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php single_post_title(''); ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php echo $excerpt; ?>" />
	<meta property="og:image" content="<?php if ( (has_post_thumbnail()) ) { echo $getthumbnail[0]; } else { echo first_image(); } ?>" />
	<!-- End Open Graph Tags -->
	<?php  } else { ?>
	<!-- Open Graph Tags -->
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:url" content="<?php echo home_url(); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:image" content="<?php echo esc_url( $defaultThumb ); ?>" />
	<!-- End Open Graph Tags -->
<?php  }
	
}

/**
 * Header content
 *
 * If you want to remove or change this function in a child theme
 * add this code to the child theme functions.php
 * function unhook_rumputhijau_functions() {
		remove_action('rumputhijau_header', 'rumputhijau_header_content');
   }
   add_action('init','unhook_rumputhijau_functions');
 *
 *
 * @since Rumput Hijau 1.1.0
 */
add_action('rumputhijau_header', 'rumputhijau_header_content');
function rumputhijau_header_content() {
	$options = rumputhijau_get_theme_options();
	?>
	
	<div id="logo" class="clearfix">
		
		<?php $logo = isset($options['logo'])? $options['logo']: '';
		if ($logo == "") {
		
			// Do not show <h1> except on home page, SEO reasons
			if(!is_home() || !is_front_page()) { ?>
				<!--<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></span>-->
				<!--<div class="site-description last"><?php bloginfo('description'); ?></div>-->
			<?php } else { 
			// Only on home page display the <h1> tag, SEO reasons.
			?>
				<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>-->
				<!--<div class="site-description last"><?php bloginfo('description'); ?></div>-->
			<?php }
			
			} else {
				if (is_home() || is_front_page()) { ?>
					<h1 class="logo-image"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /><span><?php bloginfo('name'); ?></span></a></h1>
				<?php } else {  ?>
					<div class="logo-image"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /><span><?php bloginfo('name'); ?></span></a></div>
			<?php } } ?>
		
	</div><!-- end #logo -->
	
	<?php 
	// call the custom header feature
	rumputhijau_custom_header(); ?>

<?php 
}

/**
 * Custom header feature
 * Just create your own rumputhijau_custom_header to override in a child theme 
 * With your own custom header function or maybe create a custom slider
 * 
 *
 * @since Rumput Hijau 1.1.0
 */
if ( ! function_exists( 'rumputhijau_custom_header' ) ) :

function rumputhijau_custom_header() {
	$header_image = get_header_image(); 
	if($header_image != '') :
	?>
	
	<div class="header-img">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo $header_image; ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('name'); ?>" />
		</a>
	</div><!-- .header-img -->
	
	<?php endif;
}

endif;


/**
 * Top Navigation
 * You can change or remove this functions in a child theme
 * by removing the action first, then add your own custom function
 *
 * @since Rumput Hijau 1.1.0
 */
add_action('rumputhijau_before', 'rumputhijau_top_navigation');
function rumputhijau_top_navigation() {
	?>
	
	<div id="primary-nav" class="clearfix">
		<div class="inside-primary-nav">
		
			<?php 
			$pagesNav = '';
			if (function_exists('wp_nav_menu')) {
				$pagesNav = wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'echo' => false, 'fallback_cb' => '', 'container' => '' ) ); 
			};
				
			if ($pagesNav == '') { ?>
			
				<ul class="nav">
					<?php if ( is_home() ) { ?>
						<li class="first"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow"><?php _e('Home', 'rumputhijau'); ?></a></li>
					<?php } else { ?>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow"><?php _e('Home', 'rumputhijau'); ?></a></li>
					<?php } ?>
					<?php wp_list_pages('title_li='); ?>
				</ul>
				
			<?php }
				else 
					echo($pagesNav); 
			?>		

			<?php get_search_form(); ?><!-- get the search form, defined in searchform.php -->
			
		</div><!-- end .inside-primary-nav -->
	</div><!-- end #primary-nav -->
	
<?php 
}

/**
 * Breadcrumbs
 * You can change or remove this functions in a child theme
 * by removing the action first, then add your own custom function
 *
 * @since Rumput Hijau 1.1.0
 */
add_action('rumputhijau_header_after', 'rumputhijau_breadcrumbs_function');
function rumputhijau_breadcrumbs_function() {

	// If you installed wordpress seo or yoast breadcrumbs plugin, this function will automatically
	// display the yoast breadcrumbs, but if you're not. The custom breadcrumbs will change it
	//if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>');
	//} else {
	//	echo rumputhijau_breadcrumbs();
	//}
	
}
 
 
/**
 * Prints HTML with meta information for the tags & categories.
 * Create your own rumputhijau_entry_meta to override in a child theme
 *
 * @since Rumput Hijau 1.1.0
 */
if ( ! function_exists( 'rumputhijau_entry_meta' ) ) :

function rumputhijau_entry_meta() {
	$tags_list = get_the_tag_list( '', ', ' );
		printf( __( '<span class="%1$s">%2$s</span>', 'rumputhijau' ), 'entry-utility-prep entry-utility-prep-tag-links tag', $tags_list );

	$categories_list = get_the_category_list(', ');
		printf( __( '<span class="%1$s category">%2$s</span>', 'rumputhijau' ), 'entry-utility-prep entry-utility-prep-cat-links cat', $categories_list );
	
	edit_post_link( __( 'Edit', 'rumputhijau' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Prints HTML with meta information for the current post-date/time, author, comments,
 * custom social button and permalink.
 * Create your own rumputhijau_content_left to override in a child theme
 *
 * @since Rumput Hijau 1.0.8
 */
if ( ! function_exists( 'rumputhijau_content_left' ) ):

function rumputhijau_content_left() {
	global $post;
	?>
	<div class="content-left">
	
	<?php
	printf(
		__('<span class="published">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s" title="%3$s" rel="author">%4$s</a></span><span class="entry-permalink"><a href="%5$s" title="%6$s" rel="bookmark">Permalink</a></span>','rumputhijau'),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'rumputhijau' ), get_the_author() ) ),
			get_the_author(),
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'rumputhijau' ), the_title_attribute( 'echo=0' ) ) )
	);
?>
	<span class="entry-comment">
		<?php if ( comments_open() ) :
			comments_popup_link( __( 'Leave a comment', 'rumputhijau' ), __( '1 Comment', 'rumputhijau' ), __( '% Comments', 'rumputhijau' ) ); ?>
		<?php endif; ?>
	</span>
	
	<?php rumputhijau_social_share(); ?>
	
	</div><!-- end .content-left -->
	
<?php
}
endif;


/**
 * Display social buttons share
 * 
 *
 * @since Rumput Hijau 1.1.2
 */
if ( ! function_exists( 'rumputhijau_social_share' ) ):
function rumputhijau_social_share() {
	global $post;
	$options = rumputhijau_get_theme_options();
	$show = isset($options['social_share'])? $options['social_share']: '';
	
	if( ($show == "Yes") && is_single() || is_page() ) :
	?>
	<span class="share">
		<p class="share-title"><?php _e('Share This &rarr;', 'rumputhijau'); ?></p>
		<p class="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</p>
		<p class="fb-like">
			<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
		</p>
		<p class="plusone">
			<g:plusone size="medium"></g:plusone>
		</p>
		<p class="stumble">
			<su:badge layout="1"></su:badge>
		</p>
		<p class="pin-it">
			<?php 
			global $post;
			$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php if ( (has_post_thumbnail()) ) { echo $pinterestimage[0]; } else { echo first_image(); } ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
		</p>
	</span>
	<?php endif;
}
endif; // rumputhijau_social_share()


/**
 * Display comment navigation when applicable
 * Create your own rumputhijau_comment_nav to override in a child theme
 * 
 *
 * @since Rumput Hijau 1.1.0
 */
if ( ! function_exists( 'rumputhijau_comment_nav' ) ):

function rumputhijau_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div class="comments-navigation clearfix">
			<div class="alignleft"><?php previous_comments_link( __( '&larr; Older Comments', 'rumputhijau' ) ); ?></div>
			<div class="alignright"><?php next_comments_link( __( 'Newer Comments &rarr;', 'rumputhijau' ) ); ?></div>
		</div> 
	<?php endif; // check for comment navigation
}

endif;