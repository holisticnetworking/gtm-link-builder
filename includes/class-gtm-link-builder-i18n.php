<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://mower.com
 * @since      1.0.0
 *
 * @package    Gtm_Link_Builder
 * @subpackage Gtm_Link_Builder/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Gtm_Link_Builder
 * @subpackage Gtm_Link_Builder/includes
 * @author     Mower <tbelknap@mower.com>
 */
class Gtm_Link_Builder_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gtm-link-builder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
