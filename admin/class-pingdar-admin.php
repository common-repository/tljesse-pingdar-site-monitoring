<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       tristanjesse.com
 * @since      0.5.0
 *
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/admin
 * @author     Tristan Jesse <tristanljesse@gmail.com>
 */
class Pingdar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.5.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.5.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.5.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.5.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pingdar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pingdar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pingdar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.5.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pingdar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pingdar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pingdar-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Outputs the plugin settings in admin
	 */
	public function add_plugin_admin_menu() {
		add_menu_page('Pingdar Admin', 'Pingdar Admin', 'manage_options', $this->plugin_name, array($this, 'display_pingdar_settings_page'));
	}

	/**
	 * Adds link to settings in plugins menu
	 *
	 * @param array $links
	 */
	public function add_action_links($links) {
		$settings_link = array(
			'<a href="' . admin_url('options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge($settings_link, $links);
	}

	public function display_pingdar_settings_page() {
		include_once('partials/pingdar-admin-display.php');
	}



}
