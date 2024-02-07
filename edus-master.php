<?php
/*
Plugin Name: Edus Master
Plugin URI: https://themeforest.net/user/ir-tech/portfolio
Description: Plugin to contain short codes and custom post types of the Edus theme.
Author: Ir-Tech
Author URI: http://irtech.biz/
Version: 1.0.0
Text Domain: edus-master
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'EDUS_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'EDUS_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'EDUS_MASTER_SELF_PATH', 'edus-master/edus-master.php' );
define( 'EDUS_MASTER_VERSION', '1.0.0' );
define( 'EDUS_MASTER_INC', EDUS_MASTER_ROOT_PATH .'/inc');
define( 'EDUS_MASTER_LIB', EDUS_MASTER_ROOT_PATH .'/lib');
define( 'EDUS_MASTER_ELEMENTOR', EDUS_MASTER_ROOT_PATH .'/elementor');
define( 'EDUS_MASTER_TUTOR', EDUS_MASTER_ROOT_PATH .'/tutor');
define( 'EDUS_MASTER_DEMO_IMPORT', EDUS_MASTER_ROOT_PATH .'/demo-data-import');
define( 'EDUS_MASTER_ADMIN', EDUS_MASTER_ROOT_PATH .'/admin');
define( 'EDUS_MASTER_ADMIN_ASSETS', EDUS_MASTER_ROOT_URL .'admin/assets');
define( 'EDUS_MASTER_WP_WIDGETS', EDUS_MASTER_ROOT_PATH .'/wp-widgets');
define( 'EDUS_MASTER_ASSETS', EDUS_MASTER_ROOT_URL .'assets/');
define( 'EDUS_MASTER_CSS', EDUS_MASTER_ASSETS .'css');
define( 'EDUS_MASTER_JS', EDUS_MASTER_ASSETS .'js');
define( 'EDUS_MASTER_IMG', EDUS_MASTER_ASSETS .'img');

//load additrans helpers functions
if (!function_exists('edus_master')){
	require_once EDUS_MASTER_INC .'/class-edus-master-helper-functions.php';
	if (!function_exists('edus_master')){
		function edus_master(){
			return class_exists('Edus_Master_Helper_Functions') ? new Edus_Master_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
//load codester framework functions
if ( !edus_master()->is_edus_active()) {
	if ( file_exists( EDUS_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once EDUS_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( EDUS_MASTER_ROOT_PATH . '/inc/class-edus-master-init.php' ) ) {
	require_once EDUS_MASTER_ROOT_PATH . '/inc/class-edus-master-init.php';
}
