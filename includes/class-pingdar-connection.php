<?php

/**
 * The file that defines the Pingdar Connection
 *
 * A class definition that connects to the Pingdar server
 * and retrieves data to display on the admin page
 *
 * @link       http://www.tristanjesse.com
 * @since      0.5.0
 *
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/includes
 */

/**
 * The connection to the Pingdar server
 *
 * @since      0.5.0
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/includes
 * @author     Tristan Jesse <tristanljesse@gmail.com>
 */
class PingdarConnection {
	private $base_url;

	/**
	 * Constructor for the connection
	 *
	 * @param string $base_url
	 *		Absolute URL to the Pingdar endpoint
	 */
	public function __construct($base_url) {
		$this->base_url = $base_url;
	}

	/**
	 * Make an HTTP request to the Pingdar server
	 *
	 * @param string $path
	 *		Path after base_url for the request
	 *
	 * @param array $args
	 *		Associative array with arguements to pass with the request
	 */
	public function pingdarRequest($path, $args = array()) {
		$url = $this->base_url;
		$request = new WP_Http;

		if (substr($url, -1) != '/') {
			$url .= '/';
		}
		$url .= $path;

		$args = array(
			'method' => 'POST',
			'body' => $args
		);

		$result = $request->request( $url, $args );
		//print_r($result['body']);

		if (isset($result['body'])) {
			return json_decode( $result['body'] );
		} else {
			return '';
		}
		
	}

	/**
	 * Registers a new pingdar user and gets their API key
	 *
	 * @param array $args
	 *		New user data array
	 *
	 * @return string
	 *		Returns the API key for the user
	 */
	public function pingdarRegister($args = array()) {
		$res = $this->pingdarRequest('user/api_register/', $args);
		return json_encode($res);
	}

	/**
	 * Requests pingdar for website stats
	 *
	 * @param array $args
	 *		User data array
	 *
	 * @return 
	 *		Site stats
	 */
	public function pingdarStats($args = array()) {
		$res = $this->pingdarRequest('user/login/', $args);
		//debug_to_console('Stats' . $res);
		return $res;
	}

	/**
	 * Check for premium status while still logged in
	 */
	public function pingdarIsPremium($args = array()) {
		$object = $this->pingdarRequest('user/api_user/', $args);
		$res = json_decode(json_encode($object), True);
		$return = array(
			'premStatus' => 0,
			'membershipType' => $res['membershipType']
		);
		foreach($res['status'] as $site){
			if (strpos($site['website'], get_site_url()) !== false) {
				if ($site['premium'] == 1) {
					$return['premStatus'] = 1;
					return $return;
				}
				else
					return $return;
			}
		}
		//print_r($res['status']);
		return $return;
	}

	/**
	 * Get user info
	 */
	public function pingdarUserDetails($args = array()) {
		$res = $this->pingdarRequest('user/api_user/', $args);
		//print_r($res);
		return json_encode($res);
	}

} // end of PingdarConnection class