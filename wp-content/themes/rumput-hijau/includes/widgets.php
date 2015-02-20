<?php
/**
 * Register our sidebars and widgetized areas
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.8
 */
 
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'          => __('General', 'rumputhiaju'),
		'description'   => __('This sidebar appears on the right side of your site', 'rumputhijau'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer Widget 1', 'rumputhiaju'),
		'description'   => __('This sidebar appears on the footer of your site', 'rumputhijau'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer Widget 2', 'rumputhiaju'),
		'description'   => __('This sidebar appears on the footer of your site', 'rumputhijau'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer Widget 3', 'rumputhiaju'),
		'description'   => __('This sidebar appears on the footer of your site', 'rumputhijau'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer Widget 4', 'rumputhiaju'),
		'description'   => __('This sidebar appears on the footer of your site', 'rumputhijau'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	));
}