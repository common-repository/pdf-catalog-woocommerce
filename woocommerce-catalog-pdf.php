<?php
/**
 * Plugin Name: PDF Catalog Woocommerce
 * Description: Woocommerce Catalog PDF use for download product details in pdf
 * Version:     2.0
 * Author:      Gravity Master
 * License:     GPLv2 or later
 * Text Domain: gmwcp
 */

/* Stop immediately if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* All constants should be defined in this file. */
if ( ! defined( 'GMWCP_PREFIX' ) ) {
	define( 'GMWCP_PREFIX', 'gmwcp' );
}
if ( ! defined( 'GMWCP_PLUGINDIR' ) ) {
	define( 'GMWCP_PLUGINDIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'GMWCP_PLUGINBASENAME' ) ) {
	define( 'GMWCP_PLUGINBASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'GMWCP_PLUGINURL' ) ) {
	define( 'GMWCP_PLUGINURL', plugin_dir_url( __FILE__ ) );
}

/* Auto-load all the necessary classes. */
if( ! function_exists( 'gmwcp_class_auto_loader' ) ) {
	
	function gmwcp_class_auto_loader( $class ) {
		
	 	$includes = GMWCP_PLUGINDIR . 'includes/' . $class . '.php';
		
		if( is_file( $includes ) && ! class_exists( $class ) ) {
			include_once( $includes );
			return;
		}
		
	}
}
spl_autoload_register('gmwcp_class_auto_loader');
new GMWCP_Cron();
new GMWCP_Admin();
new GMWCP_Frontend();
new GMWCP_PDF();
new GMWCP_API();
?>