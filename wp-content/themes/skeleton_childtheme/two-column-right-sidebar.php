<?php
/*
Template Name: Two Column Right Sidebar
*/
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
// You can override via functions.php conditionals or define:
// $columns = 'four';

get_header();
do_action('skeleton_before_content');
get_template_part('loop', 'page');
get_sidebar();
do_action('skeleton_after_content');

get_footer();
?>
<style>
     #post-15 > .featured-image, 
     #post-15 > .entry-meta, 
     #post-15 > .entry-utility, 
     #comments {display: none;}
</style>

<script>
     jQuery(document).ready(function(){
          jQuery('#post-15').addClass('twelve columns alpha');
          jQuery('#sidebar').addClass('four columns omega');
     });
</script>