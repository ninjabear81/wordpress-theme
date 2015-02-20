// Logo Uploader
jQuery(document).ready(function() {

	jQuery('.upload_image_button').click(function() {
	formfield = jQuery(this).prev('.logo');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	window.send_to_editor = function(html) {
	if (jQuery(html).is("a")) {
	var imgurl = jQuery('img', html).attr('src');
	} else if (jQuery(html).is("img")) {
	var imgurl = jQuery(html).attr('src');
	}
	jQuery('.logo').val(imgurl);
	tb_remove();
	}
	return false;
	});

	// Favicon Uploader

	jQuery('.upload_favicon_button').click(function() {
	formfield = jQuery(this).prev('.favicon');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	window.send_to_editor = function(html) {
	if (jQuery(html).is("a")) {
	var imgurl = jQuery('img', html).attr('src');
	} else if (jQuery(html).is("img")) {
	var imgurl = jQuery(html).attr('src');
	}
	jQuery('.favicon').val(imgurl);
	tb_remove();
	}
	return false;
	});
	
	jQuery(".form-table").hide();
	// Toggle for theme options
    jQuery("h3").click(function(){
        jQuery(this).next(".form-table").slideToggle("slow");
    });

});

