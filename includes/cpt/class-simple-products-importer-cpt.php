<?php
/**
 * Simple Products Importer.
 *
 * @package   Simple_Products_Importer_AJAX
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 */

/**
 * Register custom post types and taxonomies
 */
class Simple_Products_Importer_CPT {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;


	/**
	 * List of all Custom Post Types to be registered
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $cpt_list = array();

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
		self::load_cpt();
		add_action( 'init', array( $this, 'register_cpt_and_taxonomies') );
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
	 * Assign Custom Post Types to class variable.
	 *
	 * @since     1.0.0
	 */
	private static function load_cpt() {
		$cpt = array(
			'entries' => array(
						'labels' => array(
									'name'               => _x( 'Entries', 'post type general name', 'simple-products-importer' ),
									'singular_name'      => _x( 'Entry', 'post type singular name', 'simple-products-importer' ),
									'menu_name'          => _x( 'Entries', 'admin menu', 'simple-products-importer' ),
									'name_admin_bar'     => _x( 'Entry', 'add new on admin bar', 'simple-products-importer' ),
									'add_new'            => _x( 'Add New', 'entry', 'simple-products-importer' ),
									'add_new_item'       => __( 'Add New Entry', 'simple-products-importer' ),
									'new_item'           => __( 'New Entry', 'simple-products-importer' ),
									'edit_item'          => __( 'Edit Entry', 'simple-products-importer' ),
									'view_item'          => __( 'View Entry', 'simple-products-importer' ),
									'all_items'          => __( 'All Entry', 'simple-products-importer' ),
									'search_items'       => __( 'Search Entry', 'simple-products-importer' ),
									'parent_item_colon'  => __( 'Parent Entries:', 'simple-products-importer' ),
									'not_found'          => __( 'No Entries found.', 'simple-products-importer' ),
									'not_found_in_trash' => __( 'No Entries found in Trash.', 'simple-products-importer' )
								),
						'description'        => __( 'Manage your entries', 'simple-products-importer' ),
						'public'             => false,
						'publicly_queryable' => false,
						'show_ui'            => true,
						'show_in_menu'       => true,
						'query_var'          => false,
						'rewrite'            => array( 'slug' => 'entries' ),
						'capability_type'    => 'post',
						'has_archive'        => false,
						'hierarchical'       => false,
						'menu_position'      => 25,
				 		'menu_icon'			 => 'dashicons-layout',
						'supports'           => array( 'title')
					)
		);

		self::$cpt_list = $cpt;
	}





	/**
	 * Register all Custom Post Types and Taxonomies.
	 *
	 * @since     1.0.0
	 */
	public function register_cpt_and_taxonomies(){
		// Register CPT
		foreach( self::$cpt_list as $slug => $args ){
			register_post_type( $slug , $args );
		}
	}



}
