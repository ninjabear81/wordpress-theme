<?php
/**
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 *
 * Layout Hooks:
 *
 * skeleton_above_header // Opening header wrapper
 * skeleton_header // header tag and logo/header text
 * skeleton_header_extras // Additional content may be added to the header
 * skeleton_below_header // Closing header wrapper
 * skeleton_navbar // main menu wrapper
 * skeleton_before_content // Opening content wrapper
 * skeleton_after_content // Closing content wrapper
 * skeleton_before_sidebar // Opening sidebar wrapper
 * skeleton_after_sidebar // Closing sidebar wrapper
 * skeleton_footer // Footer
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, skeleton_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 2.0
 */
add_theme_support('post_thumbnails');

function my_custom_creditlink() {
     $credits = '<sup>&copy;</sup>2015 DIYalogue. All Rights Reserved.';
     return $credits;
}

add_filter('skeleton_author_credits', 'my_custom_creditlink');

// Use filter 'tc_tagline_text' to add extra lines to the tagline (not very advisable, as google is expecting a tagline)
function load_fonts() {
     wp_register_style('et-googleFonts', 'http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two|Shadows+Into+Light');
     wp_enqueue_style('et-googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

if (!function_exists('skeleton_logo')) {

     function skeleton_logo() {
          // image
          if (skeleton_options('logotype')) :
               $skeleton_logo = '<h1 id="site-title">';
               $skeleton_logo .= '<a class="logotype-img" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" rel="home">';
               $skeleton_logo .= '<img src="' . skeleton_options('logotype') . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '"></a>';
               $skeleton_logo .= '</h1>';
          // text
          else :
               $skeleton_logo = '<h1 id="site-title">';
               $skeleton_logo .= '<a class="text" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" rel="home">' . esc_attr(get_bloginfo('name', 'display')) . '</a>';
               $skeleton_logo .= '</h1>';
               $skeleton_logo .= '<div class="desc"><span class="site-desc">' . get_bloginfo('description') . '</span></div>' . "\n";
          endif;
          echo apply_filters('skeleton_child_logo', $skeleton_logo);
     }

     add_action('skeleton_header', 'skeleton_logo', 4);
}
/* ----------------------------------------------------------------------------------- */
// Opening #header
/* ----------------------------------------------------------------------------------- */

if (!function_exists('skeleton_header_open')) {

     function skeleton_header_open() {
          echo "<div id=\"wrap\" class=\"container\">\n";
          echo "<div id=\"header\" class=\"sixteen columns\">\n";
          ?>
          <img id="headerImg" class="scale-with-grid" src="<?php bloginfo('template_directory'); ?>/images/desktop.png" alt="" />
<script>
     jQuery(document).ready(function($) {
     var screenSize = $(window).width();
     if (screenSize < 500) {
        $('#headerImg').attr('src', "<?php bloginfo('template_directory'); ?>/images/mobile.png");
     }
     else {
          $('#headerImg').attr('src', "<?php bloginfo('template_directory'); ?>/images/desktop.png");
     }
     });//end ready
</script>
          <?php
          echo "<div class=\"inner\">\n";
     }

     add_action('skeleton_header', 'skeleton_header_open', 2);
}
/* Social Media Icon Menu as per Justin Tadlock
 */
function smpl_social_navigation() {
     if (has_nav_menu('social')) {
          wp_nav_menu(
                  array(
                      'theme_location' => 'social',
                      'container' => 'div',
                      'container_id' => 'menu-social',
                      'container_class' => 'menu-social',
                      'menu_id' => 'menu-social-items',
                      'menu_class' => 'menu-items',
                      'depth' => 1,
                      'link_before' => '<span class="screen-reader-text">',
                      'link_after' => '</span>',
                      'fallback_cb' => '',
                  )
          );
     }
}

function custom_excerpt_length( $length ) {
	return 37;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );