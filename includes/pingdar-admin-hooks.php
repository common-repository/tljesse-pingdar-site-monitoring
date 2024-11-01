<?php
/**
 * @file
 *	Contains the WordPress hooks for the plugin
 */

/**
 * Pulls in the google charts API
 */
function load_google_charts() {
	wp_register_script('charts', 'https://www.gstatic.com/charts/loader.js');

	wp_enqueue_script('charts');
}
add_action('admin_enqueue_scripts', 'load_google_charts', 5);

/**
 * Enqueue the script for google charts settings
 */
function my_enqueue() {
    wp_register_script('pingdar-charts', '/wp-content/plugins/pingdar/admin/js/pingdar-charts.js');

    wp_enqueue_script( 'pingdar-charts' );
}
add_action('admin_enqueue_scripts', 'my_enqueue');

/**
 * Add in the Pingdar link to the footer
 */
add_action('wp_footer', 'wpshout_action_example'); 
function wpshout_action_example() { 
  $options = get_option('pingdar_user_settings');
  if ($options['premStatus'] == 0){
    echo '<!-- Pingdar Start Code --> 
    				<div class="pingdar-footer">
						<a id="server-monitoring" data-id=\'33957\' href="https://pingdar.com" /> <img src="https://pingdar.com/pingdar-logo.gif" alt="website monitor "/> </a> 
						</div>
						<!-- pingdar End Code -->'; 
	}
}

/**
 * Add the Pingdar monitor to the dashboard
 */
add_action( 'wp_dashboard_setup', 'my_dashboard_setup_function' );
function my_dashboard_setup_function() {
    add_meta_box( 'my_dashboard_widget', 'Pingdar Site Monitoring', 'my_dashboard_widget_function', 'dashboard', 'normal', 'high' );
}
function my_dashboard_widget_function() {
	$options = get_option('pingdar_user_settings');
	if ($options['apiKey'] != '') {
		$pingdar = new PingdarConnection('https://pingdar.com');
		$password = $options['password'];
		$hash = $options['apiKey'];

		$opts = [
	    'salt' => $hash, //api key
	    ];
		$hash = password_hash($password, PASSWORD_DEFAULT, $opts);

		$args = array(
			'username' => $options['username'],
			'enpass' => $hash,
			'domain' => get_site_url()
		);

		$response = json_encode($pingdar->pingdarStats($args));

		echo	'
			<div id="chart_div" class="chart"></div>
			<div id="dom_target" style="display: none;">'
				. htmlspecialchars($response) .
			'</div>';
	} else {
		echo '<div class="unregistered"><h2>You must register on the pingdar admin page</h2></div>';
	}
}