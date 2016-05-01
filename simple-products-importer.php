<?php
/**
 * @package   Simple_Products_Importer
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Products Importer
 * Plugin URI:        https://github.com/raczosala/simple-products-importer.git
 * Description:       Plugin Description
 * Version:           1.0.0
 * Author:            Oscar Salazar
 * Author URI:        https://github.com/raczosala/
 * Text Domain:       simple-products-importer
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

/*----------------------------------------------------------------------------*
 * * * ATTENTION! * * *
 * FOR DEVELOPMENT ONLY
 * SHOULD BE DISABLED ON PRODUCTION
 *----------------------------------------------------------------------------*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*----------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------*
 * Plugin Settings
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: Settings ----- */
 require_once( plugin_dir_path( __FILE__ ) . 'includes/class-simple-products-importer-settings.php' );

 register_activation_hook( __FILE__, array( 'Simple_Products_Importer_Settings', 'activate' ) );
 add_action( 'plugins_loaded', array( 'Simple_Products_Importer_Settings', 'get_instance' ) );
/* ----- Module End: Settings ----- */


/*----------------------------------------------------------------------------*
 * Include extensions and CPT
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: CPT ----- */
// require_once( plugin_dir_path( __FILE__ ) . 'includes/cpt/class-simple-products-importer-cpt.php' );
//  add_action( 'plugins_loaded', array( 'Simple_Products_Importer_CPT', 'get_instance' ) );
/* ----- Module End: CPT ----- */


/*----------------------------------------------------------------------------*
 * Custom DB Tables
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: Database ----- */
// require_once( plugin_dir_path( __FILE__ ) . 'includes/class-simple-products-importer-db.php' );

// register_activation_hook( __FILE__, array( 'Simple_Products_Importer_DB', 'activate' ) );
// add_action( 'plugins_loaded', array( 'Simple_Products_Importer_DB', 'db_check' ) );
 /* ----- Module End: Database ----- */


/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-simple-products-importer-public.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'Simple_Products_Importer_Public', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Simple_Products_Importer_Public', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Simple_Products_Importer_Public', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

/* ----- Plugin Module: CRUD ----- */
//	 require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/class-simple-products-importer-list.php' );
/* ----- Module End: CRUD ----- */

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-simple-products-importer-admin.php' );
	add_action( 'plugins_loaded', array( 'Simple_Products_Importer_Admin', 'get_instance' ) );

}


/*----------------------------------------------------------------------------*
 * Register Plugin Shortcode
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: Shortcode ----- */
// Admin Side
// require_once( plugin_dir_path( __FILE__ ) . 'includes/shortcode/class-simple-products-importer-shortcode-admin.php' );
// add_action( 'plugins_loaded', array( 'Simple_Products_Importer_Shortcode_Admin', 'get_instance' ) );

// Public Side
// require_once( plugin_dir_path( __FILE__ ) . 'includes/shortcode/class-simple-products-importer-shortcode-public.php' );
// add_action( 'plugins_loaded', array( 'Simple_Products_Importer_Shortcode_Public', 'get_instance' ) );
 /* ----- Module End: Shortcode ----- */
 
 
 /*----------------------------------------------------------------------------*
 * Handle AJAX Calls
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: AJAX ----- */
// require_once( plugin_dir_path( __FILE__ ) . 'includes/class-simple-products-importer-ajax.php' );
// add_action( 'plugins_loaded', array( 'Simple_Products_Importer_AJAX', 'get_instance' ) );
/* ----- Module End: AJAX ----- */
