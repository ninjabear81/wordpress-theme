<?php
/**
 * This file contains all the functions for the theme's filters
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
 
/**
 * rumputhijau_doctype() - Rumput Hijau filter function
 *
 * Renders the current DOCTYPE of the page. By default it displays the XHTML 1.0 Transitional
 * doctype.
 *
 * @since Rumput Hijau 1.0.8
 */
function rumputhijau_doctype() {
	echo apply_filters('rumputhijau_doctype', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'. "\n");
}
 
/**
 * Fixing the Read More in the Excerpts
 * This removes the annoying […] to a Read More link
 *
 * @since Rumput Hijau 1.0.8
 */

add_filter('excerpt_more', 'rumputhijau_excerpt_more');
function rumputhijau_excerpt_more($more) {
	global $post;
	// edit here if you like
	$more = '&nbsp; <a href="'. get_permalink($post->ID) . '" title="Read more '.get_the_title($post->ID).'">Read more &raquo;</a>';
	return apply_filters('rumputhijau_excerpt_more', $more);
}


/**
 * Sets the post excerpt length to 50 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Rumput Hijau 1.0.8
 */
add_filter( 'excerpt_length', 'rumputhijau_excerpt_length' );
function rumputhijau_excerpt_length( $length ) {
	return 50;
}


/**
 * Remove gallery inline style
 *
 * @since Rumput Hijau 1.0.8
 */

add_filter( 'gallery_style', 'rumputhijau_remove_gallery_css' );
function rumputhijau_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}


/**
 * Stop more link from jumping to middle of page
 *
 * @since Rumput Hijau 1.0.8
 */

add_filter('the_content_more_link', 'rumputhijau_remove_more_jump_link');
function rumputhijau_remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}


/**
 * Filter post title for post-format links
 *
 * @since Rumput Hijau 1.0.8
 */

add_filter('post_link', 'rumputhijau_link_filter', 10, 2);
function rumputhijau_link_filter($link, $post) {
     if (has_post_format('link', $post) && get_post_meta($post->ID, 'linkFormat', true)) {
          $link = get_post_meta($post->ID, 'linkFormat', true);
     }
     return $link;
}