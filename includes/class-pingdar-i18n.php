<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       tristanjesse.com
 * @since      0.5.0
 *
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.5.0
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/includes
 * @author     Tristan Jesse <tristanljesse@gmail.com>
 */
class Pingdar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.5.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pingdar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
