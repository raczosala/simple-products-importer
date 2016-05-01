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
 * Handle AJAX calls
 */
class Simple_Products_Importer_AJAX {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;


	/**
	 * Initialize the class
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Backend AJAX calls
		if ( current_user_can( 'manage_options' ) ) {
			add_action( 'wp_ajax_admin_backend_call', array( $this, 'ajax_backend_call' ) );
		}

		// Frontend AJAX calls
		add_action( 'wp_ajax_admin_frontend_call', array( $this, 'ajax_frontend_call' ) );
		add_action( 'wp_ajax_nopriv_frontend_call', array( $this, 'ajax_frontend_call' ) );

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
	 * Handle AJAX: Backend Example
	 *
	 * @since    1.0.0
	 */
	public function ajax_backend_call(){

    // Security check
		check_ajax_referer( 'referer_id', 'nonce' );

		echo 'OK';


		die();
	}


	/**
	 * Handle AJAX: Frontend Example
	 *
	 * @since    1.0.0
	 */
	public function ajax_frontend_call(){

    // Security check
		check_ajax_referer( 'referer_id', 'nonce' );

		echo 'OK';


		die();
	}


}
