<?php
/*
Plugin Name: Insert Adsense Plus Ultra
Description: Fast and easy WordPress plugin to insert Google Adsense to all your pages and posts with the possibility of excluding other users from use.
Version:     1.2
Author:      Paolo Mencucci 
Author URI:  https://www.beblogger.it
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: insert-adsense-plus-ultra
*/

if(!defined('ABSPATH')){ exit; }

// Register class autoloader =====================================================
spl_autoload_register( 'adsense_plus_ultra_autoloader' );
function adsense_plus_ultra_autoloader( $class_name ) {
    if ( false !== strpos( $class_name, 'APU' ) ) {
        $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $class_file = str_replace( '_', DIRECTORY_SEPARATOR, $class_name ) . '.php';
        require_once $classes_dir . $class_file;
    }
}	
add_action( 'plugins_loaded', 'adsense_plus_ultra_init' );

function adsense_plus_ultra_init() { 	
 	// Load Languages...
 	load_plugin_textdomain( 'insert-adsense-plus-ultra', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
 	
 	// Create container
	$plugin = new APU_Plugin();
	$plugin['path'] = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR;
	$plugin['url'] = plugin_dir_url( __FILE__ );
	$plugin['version'] = '1.2.0';
	$plugin['settings_page_properties'] = array(
		'plugin_url' => plugin_basename( __FILE__ ),
		'parent_slug' => 'options-general.php',
		'page_title' =>  'Adsense Plus Ultra',
		'menu_title' =>  'Adsense Plus Ultra',
		'capability' => 'manage_options',
		'menu_slug' => 'insert-adsense-plus-ultra',
		'option_group' => 'adsense_plus_ultra_option_group',
		'option_name' => 'adsense_plus_ultra_option_name'
	);
	$plugin['settings_page'] = 'adsense_plus_ultra_service_settings';
	
	$plugin->run();
}
function adsense_plus_ultra_service_settings( $plugin ){
	static $object;
	if (null !== $object) {
		return $object;
	}
	
	$object = new APU_SettingsPage( $plugin['settings_page_properties'] );
	return $object;
}