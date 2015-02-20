<?php
/**
 * The Header for the theme
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.1.0
 */
rumputhijau_doctype(); // Defined in /includes/filters.php ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

	<?php 
	// use for display the top navigation, Defined in /includes/template.php
	do_action( 'rumputhijau_before' ); ?>
	
<div id="container">

	<div id="header">
		<?php do_action( 'rumputhijau_header' ); // Defined in /includes/template.php ?>
	</div><!-- end #header -->
	
	<?php do_action('rumputhijau_header_after'); ?>
	
	<?php $idsection  = (is_page_template('page-fullwidth.php'))? 'full-content':'main-content'; ?>
	<div id="<?php echo $idsection; ?>">