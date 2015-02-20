<?php
/**
 * Rumput_Hijau Theme Options
 *
 * @package WordPress
 * @subpackage Rumput_Hijau
 * @since Rumput Hijau 1.0.7
 */
 
function rumputhijau_theme_options_init() {

	if ( false === rumputhijau_get_theme_options() )
		add_option( 'rumputhijau_theme_options', rumputhijau_get_default_theme_options() );

	register_setting(
		'rumputhijau_options',
		'rumputhijau_theme_options',
		'rumputhijau_theme_options_validate'
	);
	
	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		__('General Settings', 'rumputhijau'), // Section title
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page
	);
	
	add_settings_section(
		'layout', // Unique identifier for the settings section
		__('Layout Settings', 'rumputhijau'), // Section title
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page
	);
	
	add_settings_section(
		'meta', // Unique identifier for the settings section
		__('Meta Verification', 'rumputhijau'), // Section title
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page
	);
	
	add_settings_section(
		'css', // Unique identifier for the settings section
		__('Custom Css', 'rumputhijau'), // Section title
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page
	);
	
	add_settings_field( 'custom-header', __( 'Upload custom header :', 'rumputhijau' ), 'rumputhijau_info_custom_header', 'theme_options', 'general' );
	add_settings_field( 'custom-menu', __( 'Custom Menu :', 'rumputhijau' ), 'rumputhijau_info_custom_menu', 'theme_options', 'general' );
	add_settings_field( 'logo', __( 'Upload Logo :', 'rumputhijau' ), 'rumputhijau_logo', 'theme_options', 'general' );
	add_settings_field( 'favicon', __( 'Upload Favicon :', 'rumputhijau' ), 'rumputhijau_upload_favicon', 'theme_options', 'general' );
	add_settings_field( 'default-img', __( 'Default Thumbnail :', 'rumputhijau' ), 'rumputhijau_default_img', 'theme_options', 'general' );
	add_settings_field( 'social_share', __( 'Display social button :', 'rumputhijau' ), 'rumputhijau_social_button', 'theme_options', 'general' );
	add_settings_field( 'header-script', __( 'Header Script :', 'rumputhijau' ), 'rumputhijau_header_scripts', 'theme_options', 'general' );
	add_settings_field( 'tracking-code', __( 'Tracking Code :', 'rumputhijau' ), 'rumputhijau_tracking_code', 'theme_options', 'general' );
	
	add_settings_field( 'font_stack', __( 'Fonts :', 'rumputhijau' ), 'rumputhijau_fonts', 'theme_options', 'layout' );
	add_settings_field( 'theme_layout', __( 'Theme Layouts :', 'rumputhijau' ), 'rumputhijau_theme_layout', 'theme_options', 'layout' );
	
	add_settings_field( 'google_meta', __( 'Google Meta Content :', 'rumputhijau' ), 'rumputhijau_google_meta', 'theme_options', 'meta' );
	add_settings_field( 'bing_meta', __( 'Bing Meta Content :', 'rumputhijau' ), 'rumputhijau_bing_meta', 'theme_options', 'meta' );
	add_settings_field( 'alexa_meta', __( 'Alexa Meta Content :', 'rumputhijau' ), 'rumputhijau_alexa_meta', 'theme_options', 'meta' );
	
	add_settings_field( 'custom_css', __( 'Custom CSS :', 'rumputhijau' ), 'rumputhijau_custom_css', 'theme_options', 'css' );
	
}
add_action( 'admin_init', 'rumputhijau_theme_options_init' );

function rumputhijau_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_rumputhijau_options', 'rumputhijau_option_page_capability' );

function rumputhijau_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Rumput Hijau Theme Options', 'rumputhijau' ),
		__( 'Rumput Hijau Theme Options', 'rumputhijau' ),
		'edit_theme_options',
		'theme_options',
		'rumputhijau_theme_options_render_page'
	);
}
add_action( 'admin_menu', 'rumputhijau_theme_options_add_page' );

/* =============================================================================
Returns an array of select options registered for Rumput Hijau
============================================================================== */
function rumputhijau_select() {
	$select_option = array(
		'Yes' => array(
			'value' => 'Yes',
			'label' => __( 'Yes', 'rumputhijau' ),
		),
		'No' => array(
			'value' => 'No',
			'label' => __( 'No', 'rumputhijau' ),
		),
	);
	
	return apply_filters( 'rumputhijau_select', $select_option );
}

/* =============================================================================
Returns an array of layout options registered for Rumput Hijau
============================================================================== */
function rumputhijau_layouts() {
	$layout_options = array(
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __('Content on left', 'rumputhijau'),
			'thumbnail' => get_template_directory_uri() . '/includes/options/images/content-sidebar.png',
		),
		'one-column' => array(
			'value' => 'one-column',
			'label' => __('One-column - no sidebar', 'rumputhijau'),
			'thumbnail' => get_template_directory_uri() . '/includes/options/images/content.png',
		),
	);

	return apply_filters( 'rumputhijau_layouts', $layout_options );
}

/* =============================================================================
Returns an array of font options registered for Rumput Hijau
============================================================================== */
function rumputhijau_font_stack() {
	$font_stack_options = array(
		'Arial' => array(
			'value' => 'Arial',
			'label' => 'Arial',
		),
		'Georgia' => array(
			'value' => 'Georgia',
			'label' => 'Georgia',
		),
		'Verdana' => array(
			'value' => 'Verdana',
			'label' => 'Verdana',
		),
		'Helvetica Neue' => array(
			'value' => 'Helvetica Neue',
			'label' => 'Helvetica Neue',
		),
		'Tahoma' => array(
			'value' => 'Tahoma',
			'label' => 'Tahoma',
		),
		'Times New Roman' => array(
			'value' => 'Times New Roman',
			'label' => 'Times New Roman',
		),
		'Trebuchet MS' => array(
			'value' => 'Trebuchet MS',
			'label' => 'Trebuchet MS',
		),
	);

	return apply_filters( 'rumputhijau_font_stack', $font_stack_options );
}

/* =============================================================================
Returns the default options for Rumput_Hijau
============================================================================== */
function rumputhijau_get_default_theme_options() {
	$default_theme_options = array(
		'theme_layout' => 'right-sidebar',
		'font_stack' => 'Arial',
		'social_share' => 'Yes',
	);

	return apply_filters( 'rumputhijau_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for Rumput Hijau
 *
 */
function rumputhijau_get_theme_options() {
	return get_option( 'rumputhijau_theme_options', rumputhijau_get_default_theme_options() );
}

/**
 * Info for custom header
 *
 */
function rumputhijau_info_custom_header() {
	printf( __('If you want to upload your custom header. Please <a href="%1$s">Go to this page</a>', 'rumputhijau'), admin_url('themes.php?page=custom-header') );
}

/**
 * Info for custom menu
 *
 */
function rumputhijau_info_custom_menu() {
	printf( __('Easily add, edit and delete your menus using custom menus. Please <a href="%1$s">Go to this page</a> to setup your menus', 'rumputhijau'), admin_url('nav-menus.php') );
}

/**
 * Upload logo
 *
 */
function rumputhijau_logo() {
	$options = rumputhijau_get_theme_options();
	$l = isset($options['logo'])? $options['logo']: ''; ?>
	
	<input id="rumputhijau_theme_options[logo]" class="regular-text logo" type="text" name="rumputhijau_theme_options[logo]" value="<?php echo esc_url( $l ); ?>" />
	<input class="upload_image_button" type="button" value="<?php esc_attr_e( 'Upload Logo', 'rumputhijau' ); ?>" />
	<label for="logo">
		<?php 
		if($l == "") { 
		echo "<em>" .__('Enter the URL or upload an image for the <strong>Logo</strong>', 'rumputhijau'). "</em>"; 
		} else {
		echo "<img style='clear:both;display:block;margin-top:10px;'";
		echo 'src="'.$l.'" />';
		} ?>
	</label>
<?php 
}

/**
 * Upload Favicon
 *
 */
function rumputhijau_upload_favicon() {
	$options = rumputhijau_get_theme_options();
	$fav = isset($options['favicon'])? $options['favicon']: ''; ?>
	
	<input id="rumputhijau_theme_options[favicon]" class="regular-text favicon" type="text" name="rumputhijau_theme_options[favicon]" value="<?php echo esc_url( $fav ); ?>" />
	<input class="upload_favicon_button" type="button" value="<?php esc_attr_e('Upload Favicon', 'rumputhijau'); ?>" />
	<label for="favicon">
		<?php
		if($fav == "") { 
		echo "<em>" .__('Enter the URL or upload an image for the <strong>Favicon</strong>', 'rumputhijau'). "</em>"; 
		} else {
		echo "<img style='clear:both;display:block;margin-top:10px;'";
		echo 'src="'.$fav.'" />';
		} ?>
	</label>
<?php
}
 
/**
 * Default Image/Thumbnail
 *
 */
function rumputhijau_default_img() {
	$options = rumputhijau_get_theme_options();
	$defaultThumb = isset($options['default-thumb'])? $options['default-thumb']: ''; ?>
	
	<input id="rumputhijau_theme_options[default-thumb]" class="regular-text default-thumb" type="text" name="rumputhijau_theme_options[default-thumb]" value="<?php echo esc_url( $defaultThumb ); ?>" />
	<br />
	<label for="default-thumb">
		<em><?php _e('Default thumbnail for the open graph', 'rumputhijau'); ?></em>
	</label>
<?php 
}
 
/**
 * Display social button
 *
 */
function rumputhijau_social_button() { 
	$options = rumputhijau_get_theme_options(); ?>
	
	<select name="rumputhijau_theme_options[social_share]">
	<?php
		foreach ( rumputhijau_select() as $social ) {
	?>
	<option <?php selected ( $options['social_share'], $social['value'] ); ?>><?php echo esc_attr( $social['value'] ); ?></option>
	<?php } ?>
	</select>
	<br /><label><em><?php _e('Social share button on single page', 'rumputhijau'); ?></em></label>
<?php 
}

/**
 * Header Script
 *
 */
function rumputhijau_header_scripts() {
	$options = rumputhijau_get_theme_options();
	$headscript = isset($options['header-script'])? $options['header-script']: ''; ?>
	
	<textarea id="rumputhijau_theme_options[header-script]" class="large-text" cols="50" rows="10" name="rumputhijau_theme_options[header-script]"><?php echo esc_textarea( $headscript ); ?></textarea>
	<label class="description" for="rumputhijau_theme_options[header-script]"><em><?php _e('If you need to add scripts to your header (like meta tag verification, perhaps), you should enter them in the box above. They will be added before &lt;/head&gt; tag', 'rumputhijau'); ?></em></label>
<?php 
}

/**
 * Tracking Code
 *
 */
function rumputhijau_tracking_code() {
	$options = rumputhijau_get_theme_options();
	$tracking = isset($options['tracking-script'])? $options['tracking-script']: ''; ?>
	
	<textarea id="rumputhijau_theme_options[tracking-script]" class="large-text" cols="50" rows="10" name="rumputhijau_theme_options[tracking-script]"><?php echo esc_textarea( $tracking ); ?></textarea>
	<label class="description" for="rumputhijau_theme_options[tracking-script]"><em><?php _e('Put your tracking script here. Such as google analytic script, they will be added before &lt;/body&gt; tag', 'rumputhijau'); ?></em></label>
<?php 
}

/**
 * Fonts
 *
 */
function rumputhijau_fonts() { 
	$options = rumputhijau_get_theme_options(); ?>
	
	<select name="rumputhijau_theme_options[font_stack]">
	<?php
		foreach ( rumputhijau_font_stack() as $font ) {
	?>
	<option <?php selected ( $options['font_stack'], $font['value'] ); ?>><?php echo esc_attr( $font['value'] ); ?></option>
	<?php } ?>
	</select>
	<label class="font_stack" for="rumputhijau_theme_options[font_stack]"><em><?php _e('Default: Arial', 'rumputhijau'); ?></em></label>
<?php 
}

/**
 * Theme Layouts
 *
 */
function rumputhijau_theme_layout() {
	$options = rumputhijau_get_theme_options();
	
	foreach ( rumputhijau_layouts() as $layout ) {
	?>
	<span class="layouts">
	
		<input class="choose-layout" type="radio" name="rumputhijau_theme_options[theme_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['theme_layout'], $layout['value'] ); ?> />
		<span>
			<img class="thumbnail-layout" src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
		</span>
		
	</span>
	<?php }
}

/**
 * Google Meta
 *
 */
function rumputhijau_google_meta() {
	$options = rumputhijau_get_theme_options();
	$google = isset($options['google_meta'])? $options['google_meta']: ''; ?>
	
	<input id="rumputhijau_theme_options[google_meta]" class="regular-text google_meta" type="text" name="rumputhijau_theme_options[google_meta]" value="<?php echo esc_attr( $google ); ?>" />
	<br />
	<label for="google_meta">
		<em><?php _e('Enter only the meta values/content. <a href=\'http://www.google.com/webmasters\'>Google webmaster tools &rarr;</a>', 'rumputhijau'); ?></em>
	</label>
<?php 
}

/**
 * Bing Meta
 *
 */
function rumputhijau_bing_meta() {
	$options = rumputhijau_get_theme_options();
	$bing = isset($options['bing_meta'])? $options['bing_meta']: ''; ?>
	
	<input id="rumputhijau_theme_options[bing_meta]" class="regular-text bing_meta" type="text" name="rumputhijau_theme_options[bing_meta]" value="<?php echo esc_attr( $bing ); ?>" />
	<br />
	<label for="bing_meta">
		<em><?php _e('Enter only the meta values/content. <a href=\'http://www.bing.com/webmaster/\'>Bing webmaster &rarr;</a>', 'rumputhijau'); ?></em>
	</label>
<?php 
}

/**
 * Alexa Meta
 *
 */
function rumputhijau_alexa_meta() {
	$options = rumputhijau_get_theme_options();
	$alexa = isset($options['alexa_meta'])? $options['alexa_meta']: ''; ?>
	
	<input id="rumputhijau_theme_options[alexa_meta]" class="regular-text alexa_meta" type="text" name="rumputhijau_theme_options[alexa_meta]" value="<?php echo esc_attr( $alexa ); ?>" />
	<br />
	<label for="alexa_meta">
		<em><?php _e('Enter only the meta values/content. <a href=\'http://www.alexa.com/\'>Alexa &rarr;</a>', 'rumputhijau'); ?></em>
	</label>
<?php 
}

/**
 * Custom CSS
 *
 */
function rumputhijau_custom_css() {
	$options = rumputhijau_get_theme_options();
	$customcss = isset($options['custom_css'])? $options['custom_css']: ''; ?>
	
	<textarea id="rumputhijau_theme_options[custom_css]" class="large-text" cols="89" rows="15" name="rumputhijau_theme_options[custom_css]"><?php echo esc_textarea( $customcss ); ?></textarea>
	
<?php 
}

function rumputhijau_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'rumputhijau' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>
			
		<form method="post" action="options.php" id="options">
			<?php
				settings_fields( 'rumputhijau_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
		
		<div id="admin_side">

			<div class="postbox-container">
				<div class="metabox-holder">	
					<div class="meta-box-sortables ui-sortable">
						
						<div id="rumputhijau-rating" class="postbox">
							<h3 class="hndle"><span><?php _e('Give Rumput Hijau 5 Star Rating', 'rumputhijau'); ?></span></h3>
							<div class="inside">
								<p><?php _e('If you love this theme, please give 5 star rating at wordpress directory. <a href="http://wordpress.org/extend/themes/rumput-hijau" target="_blank">Give 5 star rating</a>', 'rumputhijau'); ?></p>
							</div>
						</div>
						
						<div id="rumputhijau-support" class="postbox">
							<h3 class="hndle"><span><?php _e('Support', 'rumputhijau'); ?></span></h3>
							<div class="inside">
								<p><?php _e('Need a support ? Send me an email to <a href="mailto:asksatrya@gmail.com">asksatrya@gmail.com</a>', 'rumputhijau'); ?></p>
							</div>
						</div>
						
						<div id="rumputhijau-links" class="postbox">
							<h3 class="hndle"><span><?php _e('Links', 'rumputhijau'); ?></span></h3>
							<div class="inside">
								<ul class="links">
									<li><a href="http://satrya.me" target="_blank"><?php _e('Rumput Hijau by Satrya', 'rumputhijau'); ?></a></li>
									<li><a href="http://twitter.com/satryaWp" target="_blank"><?php _e('Follow me @satryaWp', 'rumputhijau'); ?></a></li>
								</ul>
							</div>
						</div>
						
						<div id="rumputhijau-contribute" class="postbox">
							<h3 class="hndle"><span><?php _e('Contribute to Rumput Hijau', 'rumputhijau'); ?></span></h3>
							<div class="inside">
								<ul class="links">
									<li><?php _e('Language submission, just drop an email to asksatrya@gmail.com', 'rumputhijau'); ?></li>
									<li><a href="https://github.com/satryabima/rumput-hijau" target="_blank"><?php _e('Fork Rumput Hijau on github', 'rumputhijau'); ?></a></li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>
		
	</div>
	<?php
} 

function rumputhijau_theme_options_validate( $input ) {
	$output = $defaults = rumputhijau_get_default_theme_options();
		
	if ( isset( $input['font_stack'] ) && array_key_exists( $input['font_stack'], rumputhijau_font_stack() ) )
		$output['font_stack'] = $input['font_stack'];
		
	$output['logo'] = esc_url($input['logo']);
	
	$output['favicon'] = esc_url($input['favicon']);
	
	$output['default-thumb'] = esc_url($input['default-thumb']);
	
	if ( isset( $input['social_share'] ) && array_key_exists( $input['social_share'], rumputhijau_select() ) )
		$output['social_share'] = $input['social_share'];
		
	if ( isset( $input['theme_layout'] ) && array_key_exists( $input['theme_layout'], rumputhijau_layouts() ) )
		$output['theme_layout'] = $input['theme_layout'];
		
	$output['header-script'] = stripslashes($input['header-script']);
	
	$output['tracking-script'] = stripslashes($input['tracking-script']);
	
	$output['google_meta'] = esc_attr($input['google_meta']);
	$output['bing_meta'] = esc_attr($input['bing_meta']);
	$output['alexa_meta'] = esc_attr($input['alexa_meta']);
	
	$output['custom_css'] = stripslashes($input['custom_css']);

	return apply_filters( 'rumputhijau_theme_options_validate', $output, $input, $defaults );
}