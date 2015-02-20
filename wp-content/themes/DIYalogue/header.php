<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="oTkNMXhkvVD4xqIJ3hoKt4v9PH_4wxONj2dQBTJAPp4" />
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper" class="hfeed">
<header>
<div id="branding">
<div id="site-title"><?php if ( is_singular() ) {} else {echo '<h1>';} ?><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><img src="<?php bloginfo('url');?>/wp-content/themes/DIYalogue/images/JenBlog_Final_Header_F.JPG"></a><?php if ( is_singular() ) {} else {echo '</h1>';} ?></div>
<p id="site-description"><?php bloginfo( 'description' ) ?></p>
</div>
<div id="nav">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</div>
<div class="clear"></div>
</header>
<div id="container">