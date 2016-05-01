<?php
/**
 * Simple Products Importer.
 *
 * @package   Simple_Products_Importer_DB
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 */

/**
 * Setup custom DB tables
 */
class Simple_Products_Importer_DB {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;


	/**
	 * Custom table name, WPDB prefix will be added later
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $db_table_name = 'simple_products_importer';

	/**
	 * Option name for DB version
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $db_option_name = 'simple_products_importer_db_ver';

	/**
	 * DB version
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $db_version = '1.0';


	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}



	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Activate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       activated on an individual blog.
	 */
	public static function activate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide  ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::db_setup();
				}

				restore_current_blog();

			} else {
				self::db_setup();
			}

		} else {
			self::db_setup();
		}

	}


	/**
	 * Setup Database
	 *
	 * @since     1.0.0
	 */
	private static function db_setup() {
		if (get_site_option( self::$db_option_name ) != self::$db_version) {

			global $wpdb;

			$table_name =  self::get_table_name();
			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
				`id` int(11) not null primary key auto_increment,
				`title` varchar(255) null,
				`data` mediumtext null
			 ) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

			update_option( self::$db_option_name, self::$db_version );

    }
	}


	/**
	 * Check if DB custom tables needs to be updated
	 *
	 * @since     1.0.0
	 */
	public static function db_check() {

		if (get_site_option( self::$db_option_name ) != self::$db_version) {
			self::db_setup();
		}

	}

	public static function get_table_name() {
			global $wpdb;
			return $wpdb->prefix . self::$db_table_name;
	}



}
