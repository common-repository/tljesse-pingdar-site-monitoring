<?php

/**
 *
 * @link              tristanjesse.com
 * @since             0.5.0
 * @package           Pingdar Site Monitoring
 *
 * @wordpress-plugin
 * Plugin Name:       Pingdar Site Monitoring
 * Plugin URI:        pingdar.com
 * Description:       Monitor your WordPress site availability with Pingdar monitoring services.
 * Version:           1.0.1
 * Author:            Tristan Jesse
 * Author URI:        tristanjesse.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pingdar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pingdar-activator.php
 */
function activate_pingdar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pingdar-activator.php';
	if ( get_option('pingdar_user_settings') == false ){
		//$options_array['anki_deck'] = 'test';
		$options_array = array(
			'password' => '',
			'apiKey' => '',
			'username' => '',
			'membershipType' => '',
			'premStatus' => 0,
			'user_phones' => array(
				'code' => '',
				'number' => ''
			),
			'email' => '',
			'time_zone' => ''
		);
		add_option( 'pingdar_user_settings', $options_array );
	}
	Pingdar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pingdar-deactivator.php
 */
function deactivate_pingdar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pingdar-deactivator.php';
	$newOption = array(
		'password' => '',
		'apiKey' => '',
		'username' => ''
	);
	update_option('pingdar_user_settings', $newOption);
	$options = get_option('pingdar_user_settings');
	Pingdar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pingdar' );
register_deactivation_hook( __FILE__, 'deactivate_pingdar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pingdar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.5.0
 */
function run_pingdar() {

	$plugin = new Pingdar();
	$plugin->run();

}
run_pingdar();
