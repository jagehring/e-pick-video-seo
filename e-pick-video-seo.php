<?php
/*
Plugin Name: E Pick Video SEO Plugin
Plugin URI: none
Description: Video schema SEO plugin for worpdress.
Version: 1
Author: James gehring
Author URI: http://epickmarketing.com
*/




/*
 * global variables
 */

$evs_options = get_option('evs_settings');

$evs_meta_options = get_option('evs_meta_settings');

$evs_sitemap_options = get_option('evs_sitemap_settings');



//define plugin url
if( !defined( 'evs_PLUGIN_URL' ) )
define( 'evs_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if(function_exists('register_activation_hook'))
	register_activation_hook(__FILE__, 'evs_activation_hook');

function evs_activation_hook() {
if (!get_option( 'evs_activation_status' )) {
add_option( 'evs_activation_status', 'Unverified', '', 'yes' );
}

if (!get_option( 'evs_licence_type' )) {
add_option( 'evs_licence_type', 'Unverified', '', 'yes' );
}

if (!get_option( 'evs_sitemap_url' )) {
add_option( 'evs_sitemap_url', 'Not generated yet', '', 'yes' );
}
if (!get_option( 'evs_sitemap_generation_time' )) {
add_option( 'evs_sitemap_generation_time', 'Never', '', 'yes' );
}
if (!get_option( 'evs_ping_time' )) {
add_option( 'evs_ping_time', 'Never', '', 'yes' );
}
}




load_plugin_textdomain('evsseo', false, basename( dirname( __FILE__ ) ) . '/languages' );



require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = new PluginUpdateChecker(
    'http://phppoet.com/evs-update.js',
    __FILE__,
    'e-pick-video-seo'
);


require ('metabox/seo-meta-box.php'); //metabox for seo
require ('classes/evs-admin-settngs-class.php'); //Admin Settings Class
require ('classes/evs_generate_video_sitemap_class.php'); //Sitemap generation class
require ('classes/evs_png_sitemap_class.php'); //Sitemap generation class
require ('classes/evs_schema_markup_class.php'); //schema markup class
require ('classes/evs_opengraph_meta_tags_class.php'); //Opengraph tags class







?>
