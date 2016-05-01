<?php
/**
 * Simple Products Importer.
 *
 * @package   Simple_Products_Importer_Settings
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 */

/**
 * Plugin Settings
 */
class Simple_Products_Importer_Settings {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Plugin Settings Group ID
	 *
	 * Will be used in register_setting() and settings_fields()
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	public static $settings_group_id = 'simple-products-importer-settings';

	/**
	 * Plugin Settings Tabs
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	public static $settings_tabs=array(
		'first_tab'	=> 'First Tab',
		'second_tab'	=> 'Second tab'
	);

	/**
	 * Plugin Settings Sections
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $settings_sections=array(
		'section_one'	=> array(
					'tab'					=> 'first_tab',
					'title'				=> 'Section #1',
					'description' => 'Section #1 Description'
		),
    'section_two'	=> array(
					'tab'					=> 'first_tab',
					'title'				=> 'Section #2',
					'description' => 'Section #2 Description'
		),
    'section_three'	=> array(
					'tab'					=> 'second_tab',
					'title'				=> 'Section #3',
					'description' => 'Section #3 Description'
		),
    'section_four'	=> array(
					'tab'					=> 'second_tab',
					'title'				=> 'Section #4',
					'description' => 'Section #4 Description'
		),
	);

  /**
	 * Plugin Settings
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private static $plugin_settings=array(
    /* === Hidden (System) Settings Example === */
    array(
    'name'     => 'simple_products_importer_hidden_setting_1',
    'hidden'   => 1,
    'default'  => 'Some value'
		),
    array(
    'name'     => 'simple_products_importer_hidden_setting_2',
    'hidden'   => 1,
    'default'  => 200
		),
    /* === Section One === */
    array(
			'name'     => 'simple_products_importer_text_1',
			'title'    => 'Text Field',
			'section'  => 'section_one',
			'field'    => array(
    				'type'          => 'text',
            'subtitle'      => 'Optional field subtitle'
			)
		),
    array(
			'name'     => 'simple_products_importer_text_2',
			'title'    => 'Small Text Field',
			'section'  => 'section_one',
			'field'    => array(
    				'type'          => 'text',
    				'class'         => 'small-text',
    				'description'   => 'Optional setting description'
			)
		),
    array(
			'name'     => 'simple_products_importer_dropdown_1',
			'title'    => 'Drowpdown Example',
			'section'  => 'section_one',
			'field'    => array(
    				'type'          => 'dropdown',
    				'options'       => array(
        					'option_1'   => 'Option 1',
        					'option_2'   => 'Option 2',
        					'option_3'   => 'Option 3'
    				)
			),
      'default'   => 'option_2'
		),
      /* === Section Two === */
		array(
			'name'     => 'simple_products_importer_radio_1',
			'title'    => 'Radio Input Example',
			'section'  => 'section_two',
			'field'    => array(
    				'type'          => 'radio',
    				'options'       => array(
        					'option_1'   => 'Option 1',
        					'option_2'   => 'Option 2',
        					'option_3'   => 'Option 3',
        					'option_4'   => 'Option 4',
    				)
			),
      'default'   => 'option_3'
		),
		array(
			'name'         => 'simple_products_importer_checkbox_1',
			'title'        => 'Checkbox Example',
			'section'      => 'section_two',
			'field'        => array(
    				'type'          => 'checkbox',
    				'description'   => 'Optional setting description'
			),
      'default'   => 0
		),
    array(
			'name'         => 'simple_products_importer_checkbox_2',
			'title'        => 'Checkbox Example #2',
			'section'      => 'section_two',
			'field'        => array(
    				'type'          => 'checkbox',
    				'description'   => 'Checked by default'
			),
      'default'   => 1
		),
		array(
			'name'         => 'simple_products_importer_textarea_1',
			'title'        => 'Textarea Example',
			'section'      => 'section_two',
      'field'        => array(
    				'type'          => 'textarea',
			),
      'default'   => '
Textarea example:
Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Mauris lectus augue, mollis eget ultricies quis, gravida vitae mauris.
      '
		),
    /* === Section Three === */
    array(
			'name'     => 'simple_products_importer_text_2',
			'title'    => 'Text Field 2',
			'section'  => 'section_three',
			'field'    => array(
    				'type'          => 'text',
            'description'   => 'Description text supports <b>html-tags</b>, eg: <a href="#">links</a>'
			),
      'default'   => 'Default Value'
		),
    array(
			'name'     => 'simple_products_importer_password_2',
			'title'    => 'Password Example',
			'section'  => 'section_three',
			'field'    => array(
    				'type'          => 'password',
			)
		),
    /* === Section Four === */
    array(
			'name'     => 'simple_products_importer_dropdown_2',
			'title'    => 'Drowpdown Example #2',
			'section'  => 'section_four',
			'field'    => array(
    				'type'          => 'dropdown',
            'subtitle'      => 'Optional field subtitle',
            'description'   => 'Optional setting description',
    				'options'       => array(
        					'option_1'   => 'Option 1',
        					'option_2'   => 'Option 2',
        					'option_3'   => 'Option 3'
    				)
			),
		),
    array(
			'name'     => 'simple_products_importer_radio_2',
			'title'    => 'Radio Input Example #2',
			'section'  => 'section_four',
			'field'    => array(
    				'type'          => 'radio',
            'subtitle'      => 'Optional field subtitle',
            'description'   => 'Optional setting description',
    				'options'       => array(
        					'option_1'   => 'Option 1',
        					'option_2'   => 'Option 2',
        					'option_3'   => 'Option 3',
        					'option_4'   => 'Option 4',
    				)
			)
		)
	);



	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		add_action( 'admin_init', array( $this, 'admin_options_init' ) );

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
					self::settings_setup_default_values();
				}

				restore_current_blog();

			} else {
				self::settings_setup_default_values();
			}

		} else {
			self::settings_setup_default_values();
		}

	}


	/**
	 * Set default values for plugin settings
	 *
	 * @since     1.0.0
	 */
	private static function settings_setup_default_values() {
    // Add plugin options (do nothing if option is already exists)
    foreach( self::$plugin_settings as $setting_id => $setting ){
      if( array_key_exists( 'default', self::$plugin_settings[$setting_id] ) ){
        add_option( self::$plugin_settings[$setting_id]['name'], self::$plugin_settings[$setting_id]['default'] );
      }
    }
	}


	/**
	 * Get plugin settings
	 *
	 * @since    1.0.0
	 */
 	public static function get_settings() {
		$plugin_settings = array();

		foreach( self::$plugin_settings as $setting ){
			$setting_name = $setting['name'];
			$plugin_settings[$setting_name] = get_option( $setting['name'] );
		}

		return $plugin_settings;
	}


	  /**
		 * Init plugin options
		 *
		 * @since    1.0.0
		 */
		public function admin_options_init() {

			// Add Sections
			foreach( self::$settings_sections as $section_id => $section ){
				add_settings_section( $section_id, __( $section['title'], 'simple-products-importer' ), array( $this, 'sections_callback' ), $section['tab'] );
			}

			// Register settings and add settings fields
			foreach(self::$plugin_settings as $setting){
				// If setting is not hidden - create field on the settings page for it
				if( ( !isset( $setting['hidden'] ) ) || ( $setting['hidden'] !== 1 ) ){
					$setting_section = $setting['section'];
					$setting_tab = self::$settings_sections[$setting_section]['tab'];
					// Register Setting
					// Use $settings_group_id instead of $setting_tab for javascript-tabs
					register_setting( self::$settings_group_id, $setting['name'] );
					// Fields
					add_settings_field( $setting['name'], $setting['title'], array( $this, 'setting_field_callback' ), $setting_tab, $setting_section, array( 'name' => $setting['name'], 'field' => $setting['field'] ) );
				}
			}


		}


		/**
		 * Sections callback
		 *
		 * @since    1.0.0
		 */
		public function sections_callback( $args ) {
			$section_id = $args['id'];
			if( isset( self::$settings_sections[$section_id] ) ){
				if( isset( self::$settings_sections[$section_id]['description'] ) && ( self::$settings_sections[$section_id]['description'] !== '' ) ){ ?>
					<p><?php _e( self::$settings_sections[$section_id]['description'], 'simple-products-importer' ); ?></p>
			<?php	}
			}
		}


	 	/**
		 * Generate setting field
		 *
		 * @since    1.0.0
		 */
		public function setting_field_callback( $args ) {

			$setting_name = $args['name'];
			$setting_value =  isset( $args['value'] ) ? $args['value'] : get_option( $setting_name ); // current setting value

			$field = $args['field']; // field attributes

			$field_type = isset( $field['type'] ) ? $field['type'] : 'text';
			$field_class = isset( $field['class'] ) ? $field['class'] : '';

			$field_subtitle = ( isset( $field['subtitle'] ) && ( $field['subtitle'] != '' ) ) ? ( '<label class="field-subtitle">' . $field['subtitle'] . '</label>' ) : '';
			$field_descr = ( isset( $field['description'] ) && ( $field['description'] != '' ) ) ? ( '<span class="description">' . $field['description'] . '</span>' ) : '';
			$field_options = ( isset( $field['options'] ) && is_array( $field['options'] ) ) ? $field['options'] : array( 'error' => 'Ooops! Please check settings options!');

      // Add linebreaks to field subtitle and field description if field type is radio
      $field_subtitle = ( ( $field_type == 'radio' ) && ( $field_subtitle != '' ) )? $field_subtitle . '<br>' : $field_subtitle;
      $field_descr = ( ( $field_type == 'radio' ) && ( $field_descr != '' ) )? $field_descr . '<br>' : $field_descr;
			// Show Subtitle before field and field description - after field if field type other than "radio"
			$field_text_before = ( $field_type == 'radio' ) ? $field_subtitle . $field_descr : $field_subtitle;
			$field_text_after = ( $field_type == 'radio' ) ? '' : $field_descr;

			// Show text before field
			echo $field_text_before;

			// Show Field
			switch( $field_type ){
				// Checkbox
				case 'checkbox': ?>
					<input class="<?php echo $field_class;?>" type="checkbox" name="<?php echo $setting_name;?>" value="1" <?php checked( $setting_value, '1', true);?> />
					<?php
				break;
				// Radio buttons
				case 'radio':
					foreach( $field_options as $option_id => $option ){	?>
						<label><input class="<?php echo $field_class;?>" type="radio" name="<?php echo $setting_name;?>" value="<?php echo $option_id;?>" <?php checked( $setting_value, $option_id, true);?> /> <span><?php echo $option;?></span></label><br />
					<?php	}
				break;
				// Dropdown Select
				case 'dropdown': ?>
					<select class="<?php echo $field_class;?>" name="<?php echo $setting_name;?>" id="<?php echo $setting_name;?>">
					<?php
					foreach( $field_options as $option_id => $option ){	?>
						<option value="<?php echo $option_id;?>" <?php selected( $setting_value, $option_id, true);?>><?php echo $option;?></option>
					<?php	}	?>
					</select>
					<?php
				break;
				// Textarea
				case 'textarea': ?>
					<textarea class="<?php echo $field_class;?>" name="<?php echo $setting_name;?>" id="<?php echo $setting_name;?>"><?php echo esc_attr( $setting_value );?></textarea>
					<?php
				break;
				// All other types, eg: text, password, hidden, etc.
				default: ?>
					<input class="<?php echo $field_class;?>" type="<?php echo $field_type;?>" name="<?php echo $setting_name;?>" id="<?php echo $setting_name; ?>" value="<?php echo esc_attr( $setting_value );?>" />
					<?php
				break;
			}

			// Show text after field
			echo $field_text_after;

		}



}
