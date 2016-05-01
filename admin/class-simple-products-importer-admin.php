<?php
/**
 * Simple Products Importer.
 *
 * @package   Simple_Products_Importer_Admin
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * administrative side of the WordPress site.
 *
 * If you're interested in introducing public-facing
 * functionality, then refer to 'class-simple-products-importer-public.php'
 */
class Simple_Products_Importer_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = array();

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		/*
		 * Call $plugin_slug from public plugin class.
		 */
		$plugin = Simple_Products_Importer_Public::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();
		$this->plugin_version = $plugin->get_plugin_version();

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_css_js' ) );

		// Add the plugin admin pages and menu items.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->plugin_slug . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );


	}



	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register and enqueue admin-specific CSS and JS.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_css_js() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();

		/* ----- Plugin Module: Settings ----- */
		// Settings Page
		if ( $this->plugin_screen_hook_suffix['settings'] == $screen->id ) {
			/* Admin Styles */
			wp_enqueue_style( $this->plugin_slug .'-plugin-settings-styles', plugins_url( 'assets/css/settings.css', __FILE__ ), array(), 	$this->plugin_version );

			// Main Admin JS Script
			wp_register_script( $this->plugin_slug . '-settings-script', plugins_url( 'assets/js/settings.js', __FILE__ ), array( 'jquery' ), 	$this->plugin_version );
			wp_enqueue_script( $this->plugin_slug . '-settings-script' );
		}
		/* ----- End Module: Settings ----- */


		// Main Plugin Page
		if ( $this->plugin_screen_hook_suffix['simple_products_importer'] == $screen->id ) {
			/* Admin Styles */
			wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), $this->plugin_version );

			// Main Admin JS Script
			wp_register_script( $this->plugin_slug . '-admin-script', plugins_url( 'assets/js/admin.js', __FILE__ ), array( 'jquery', $this->plugin_slug . '-admin-app' ), $this->plugin_version );
			wp_enqueue_script( $this->plugin_slug . '-admin-script' );

		}


		/* ----- Plugin Module: CRUD ----- */
		/* if ( ( ( $this->plugin_screen_hook_suffix['entries_view'] == $screen->id ) && ( $_GET['action'] == 'edit' ) ) || ( $this->plugin_screen_hook_suffix['entry_add'] == $screen->id ) ) {
			// include scripts and styles for pages: "Entry Edit" and "Entries View"
		}
		*/
		/* ----- End Module: CRUD ----- */

	}


	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *        For reference: http://codex.wordpress.org/Roles_and_Capabilities
		 *
		 */
		$this->plugin_screen_hook_suffix['simple_products_importer'] = add_object_page(
			__( 'Simple Products Importer', 'simple-products-importer' ),
			__( 'Simple Products Importer', 'simple-products-importer' ),
			'manage_options',
			$this->plugin_slug . '-main-page' ,
			array( $this, 'display_plugin_page_main' ),
			'dashicons-layout'
		);

		/* ----- Plugin Module: CRUD ----- */
// Example of custom pages (Entries View and Edit)
/*
		$this->plugin_screen_hook_suffix['entries_view'] = add_object_page(
			__( 'Manage Entries', 'simple-products-importer' ),
			__( 'Entries', 'simple-products-importer' ),
			'manage_options',
			$this->plugin_slug . '-entries-view' ,
			array( $this, 'display_plugin_page_entries_view' ),
			'dashicons-layout'
		);


		$this->plugin_screen_hook_suffix['entry_add'] = add_submenu_page(
			$this->plugin_slug . '-entries-view',
			__( 'Add New Entry', 'simple-products-importer' ),
			__( 'Add New', 'simple-products-importer' ),
			'manage_options',
			$this->plugin_slug . '-entry-add',
			array( $this, 'display_plugin_page_entry_edit' )
		);
*/
		/* ----- End Module: CRUD ----- */

		/* ----- Plugin Module: Settings ----- */
		$this->plugin_screen_hook_suffix['settings'] = add_submenu_page(
			$this->plugin_slug . '-main-page',
			__( 'Settings', 'simple-products-importer' ),
			__( 'Settings', 'simple-products-importer' ),
			'manage_options',
			$this->plugin_slug . '-settings',
			array( $this, 'display_plugin_page_settings' )
		);
		/* ----- End Module: Settings ----- */


	}

	/* ----- Plugin Module: CRUD ----- */
	/**
	 * Render "Manage Entries" page
	 *
	 * @since    1.0.0
	 */
/*
	public function display_plugin_page_entries_view() {
		if( isset( $_GET['action'] ) && ( $_GET['action'] == 'edit' ) ){
			$this->display_plugin_page_entry_edit();
		}else{
			$simple_products_importer_list_table = new Simple_Products_Importer_List();
			$simple_products_importer_list_table->prepare_items();

			include_once( 'views/entries-view.php' );
		}
	}
*/


	/**
	 * Render "Add New / Edit" page
	 *
	 * @since    1.0.0
	 */
/*
	public function display_plugin_page_entry_edit() {
		global $wpdb;

		if( isset( $_GET['id'] ) && $_GET['id'] != 0 ){
			$entry_data = $wpdb->get_row( 'SELECT * FROM ' . Simple_Products_Importer_DB::get_table_name() . ' WHERE id = ' . $_GET['id'] );
			// get data
			$entry_id					= $track_data->id;
			$entry_title			= $track_data->entry_title;
			// and so on
		}
		include_once( 'views/entry-edit.php' );
	}
*/
	/* ----- End Module: CRUD ----- */


	/**
	 * Render the main page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_page_main() {
		include_once( 'views/main.php' );
	}


	/* ----- Plugin Module: Settings ----- */
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_page_settings() {
		include_once( 'views/settings.php' );
	}
	/* ----- End Module: Settings ----- */

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_slug . '-settings' ) . '">' . __( 'Settings', $this->plugin_slug ) . '</a>'
			),
			$links
		);
	}





}
