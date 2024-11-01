<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       tristanjesse.com
 * @since      0.5.0
 *
 * @package    Pingdar Site Monitoring
 * @subpackage Pingdar Site Monitoring/admin/partials
 */

	$pingdar = new PingdarConnection('https://pingdar.com');
	$options = get_option('pingdar_user_settings');
	$signinFail = false;
	$regFail = false;
	$errorResponse = '';
	$regSuccess = false;
	/*$newOption = array(
		'password' => '',
		'apiKey' => '',
		'username' => ''
	);
	update_option('pingdar_user_settings', $newOption);
	$options = get_option('pingdar_user_settings');*/

	// Set the registration variables and send to pingdar.com
	if (isset($_POST['pingdar-register'])){

		$registerArgs = array(
			/*'firstname' => sanitize_text_field($_POST['firstname']),
			'lastname' => sanitize_text_field($_POST['lastname']),
			'address' => sanitize_text_field($_POST['address']),
			'city' => sanitize_text_field($_POST['city']),
			'country' => $_POST['country'],
			'state' => sanitize_text_field($_POST['state']),
			'zip' => sanitize_text_field($_POST['zip']),
			'password' => sanitize_text_field($_POST['password']),*/
			//'username' => sanitize_text_field($_POST['username']),
			'user_phones' => array(
				'code' => $_POST['country_code'],
				'number' => sanitize_text_field($_POST['mobile'])
			),
			//'country_code' => $_POST['country_code'],
			//'mobile' => sanitize_text_field($_POST['mobile']),
			//'company' => sanitize_text_field($_POST['company']),
			'email' => sanitize_text_field($_POST['email']),
			'time_zone' => $_POST['time_zone'],
			'language' => 'en',
			'register' => true,
			'domain' => get_site_url(),
			'ridrect_url' => $_POST['ridrect_url']
		);
		//print_r($registerArgs);

		$regResponse = json_decode($pingdar->pingdarRegister($registerArgs), true);

//

//        die();
		//print_r($regResponse);
		if ($regResponse['key'] != '') {
			$newOption = array(
				'password' => $regResponse['password'],
				'apiKey' => $regResponse['key'],
				'username' => $regResponse['username'],
				'user_phones' => array(
					'code' => $_POST['country_code'],
					'number' => sanitize_text_field($_POST['mobile'])
				),
				'email' => sanitize_text_field($_POST['email']),
				'time_zone' => $_POST['time_zone']
			);
			update_option('pingdar_user_settings', $newOption);
			$options = get_option('pingdar_user_settings');
			$regSuccess = true;
		} else {
			$regFail = true;
			$errorResponse = ' ' . $regResponse['error'];
		}


	}

	if (isset($_POST['pingdar-signin'])){
		$signinArgs = array(
			'login' => 1,
			'username' => sanitize_text_field($_POST['username']),
			'password' => sanitize_text_field($_POST['password']),
			'domain' => get_site_url()
		);

		$signinResponse = json_decode(json_encode($pingdar->pingdarRequest('user/api_register/', $signinArgs)), true);
		//print_r($signinResponse);
		if ($signinResponse['key'] != ''){
			// Successful sign in
			$premStatus = 0;
			foreach($signinResponse['status'] as $checkStatus) {
				if ( strpos($checkStatus['website'], get_site_url()) !== false ) {
					$premStatus = $checkStatus['premium'];
					break;
				}
				//print_r($checkStatus);
			}

			$detailArgs = array(
				'name' => sanitize_text_field($_POST['username']),
				'password' => sanitize_text_field($_POST['password']),
				'updateUserInformation' => 1
			);
			$detailsResponse = json_decode($pingdar->pingdarUserDetails($detailArgs), true);

			$newOption = array(
				'password' => sanitize_text_field($_POST['password']),
				'apiKey' => $signinResponse['key'],
				'username' => sanitize_text_field($_POST['username']),
				'membershipType' => $detailsResponse['membershipType'],
				'premStatus' => $premStatus,
				'user_phones' => array(
					'code' => $detailsResponse['country_code'],
					'number' => $detailsResponse['mobile']
				),
				'email' => $detailsResponse['email'],
				'time_zone' => $detailsRespone['time_zone']
			);
			update_option('pingdar_user_settings', $newOption);
			$options = get_option('pingdar_user_settings');
		} else {
			$signinFail = true;
			$errorResponse = ' ' . $signinResponse['error'];
		}
	}

	if (isset($_POST['pingdar-update'])){
		$updateProfile = array(
			'updateUserInformation' => 1,
			'name' => $options['username'],
			'password' => $options['password'],
			'userName' => '',//sanitize_text_field($_POST['username']),
			'userLastName' => '',//sanitize_text_field($_POST['lastname']),
			'pass' => sanitize_text_field($_POST['password']) != '' ? sanitize_text_field($_POST['password']) : '',
			'address' => '',//sanitize_text_field($_POST['address']),
			'time_zone' => $_POST['time_zone'],
			'company' => '',//sanitize_text_field($_POST['company']),
			'position' => '',//sanitize_text_field($_POST['position']),
			'country' => '',//sanitize_text_field($_POST['country']),
			'email' => sanitize_text_field($_POST['email']),
			'user_phones' => array(
				'code' => $_POST['country_code'],
				'number' => sanitize_text_field($_POST['mobile'])
			)
		);
		/*$updateProfile = array(
			'name' => $options['username'],
			'password' => $options['password'],
			'updateUserInformation' => 1
		);*/
		//print_r($updateProfile);

		$detailsResponse = json_decode($pingdar->pingdarUserDetails($updateProfile), true);

		if($detailsResponse['status'] == 'success login') {
			$newOption = array(
				'password' => sanitize_text_field($_POST['password']) != '' ? sanitize_text_field($_POST['password']) : $options['password'],
				'apiKey' => $options['apiKey'],
				'username' => $options['username'],
				'membershipType' => $detailsResponse['membershipType'],
				'premStatus' => $options['premStatus'],
				'user_phones' => array(
					'code' => $_POST['country_code'],
					'number' => sanitize_text_field($_POST['mobile']) != '' ? sanitize_text_field($_POST['mobile']) : $options['mobile']
				),
				'email' => sanitize_text_field($_POST['email']) != '' ? sanitize_text_field($_POST['email']) : $options['email'],
				'time_zone' => $_POST['time_zone']
			);
			update_option('pingdar_user_settings', $newOption);
			$options = get_option('pingdar_user_settings');
			//print_r($options);
		}

	}

	if (isset($_POST['pingdar-logout'])){
		$newOption = array(
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
		update_option('pingdar_user_settings', $newOption);
		$options = get_option('pingdar_user_settings');
	}

	if ($options['apiKey'] != ''){	
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
		//debug_to_console($args);
		$moreArgs = array(
			'username' => $options['username'],
			'userInformation' => 1
		);

		$response = $pingdar->pingdarStats($args);

		$prem = $pingdar->pingdarIsPremium($moreArgs);

		$options['premStatus'] = $prem['premStatus'];
		$options['membershipType'] = $prem['membershipType'];
		update_option('pingdar_user_settings', $options);
		//$response = json_encode($pingdar->pingdarStats($args));
		//print_r($response);
	}
	$pingImg = 'pingdarLogo.png';
	if ($options['premStatus'] == 1) {
		$pingImg = 'pingdarPremium.png';
	}

?>

<div class="pingdar-wrap">
	<div id="cc_data" class="hidden">
		<?php echo $options['user_phones']['code']; ?>
	</div>
	<div id="tz_data" class="hidden">
		<?php echo $options['time_zone']; ?>
	</div>
	<div class="pingdar-header row">
		<div class="col-8">
			<h2><img src="<?php echo '../wp-content/plugins/pingdar/bin/' . $pingImg; ?>" alt="<?php echo esc_html(get_admin_page_title()); ?>"/>
			</h2>
		</div>
<!--		<div class="col-2">-->
<!--			<button id="pingdar-profile">Edit Profile</button>-->
<!--		</div>-->
<!--		<div class="col-2">-->
<!--			--><?php //if ($options['apiKey'] != ''): ?>
<!--				<form class="logout-form" method="post" name="pingdar_logout" action>-->
<!--					<button id="pingdar-logout" type="submit" name="pingdar-logout">Log Out</button>-->
<!--				</form>-->
<!--			--><?php //endif;?>
<!--		</div>-->
	</div>
	<?php if($regSuccess): ?>
		<div class="col-6 push-3">
			<div class="success-register alert-success-small text-centered">
				<p>Thank you for registering, please check your email to confirm your account</p>
			</div>
		</div>
		<div class="col-3">
			&nbsp;
		</div>
		<br/><br/><br/><br/><br/>
	<?php endif; ?>

	<?php if($options['apiKey'] == ''): ?>
		<?php if($signinFail): ?>
			<div class="failed-signin alert-error-small col-6 push-3 text-centered">
				<p>Pingdar signin failed<?php echo $errorResponse; ?>, please try again</p>
			</div>
		<?php elseif($regFail): ?>
			<div class="failed-signin alert-error-small col-6 push-3 text-centered">
				<p>Pingdar registration failed <b><?= (isset($regResponse['error']) && $regResponse['error'] != null)?$regResponse['error'] : null; ?></b>, please try again</p>
			</div>
		<?php endif; ?>
		<?php include_once('pingdar-register-form.php'); ?>
	<?php else: ?>
		<?php 
			$arr = json_decode($response, true);
			$counts = count($arr['results'][0]['series'][0]['values']);
			if ($counts > 0 && $options['membershipType'] == "member"): ?>
				<div class="row">
					<div id="chart_div" class="chart"></div>
				</div>
			<?php elseif ($options['membershipType'] == 'user'): ?>
				<div class="row">
					<div class="col-6 push-3 text-centered">
						<p>Please wait a few minutes to start receiving data.</p>
					</div>
				</div>
			<?php else: ?>
				<div class="row">
					<div class="col-6 push-3">
						<ul class="activate-bullets">
							<li>Please, activate your account by clicking the link that we sent to your email.</li>
							<li>A badge must be displayed in the footer of your site, if you are using the free version of our plugin.</li>
							<li>Wait a few minutes for our service to start checking your website.</li>
						</ul>
					</div>
				</div>
			<?php endif; ?>
			<div id="edit-profile" class="hidden">
				<?php include_once('pingdar-update-form.php'); ?>
			</div>
				<br/><br/>
		<?php if ($options['premStatus'] == 0 && $options['membershipType'] == 'member'): ?>
			<div class="row text-centered">
			<p>
				Upgrade your plan to remove the need for a badge, decrease the time between checks, 
				and also get the ability to notify more than one person if your site goes down.
			</p>
			<form method="post" action="https://pingdar.com/user/subscription" target="_blank">
				<input type="hidden" name="domain" value="<?=get_site_url()?>">
				<input type="hidden" name="name" value="<?= $options['username']?> ">
				<input type="hidden" name="password" value="<?=$options['password']?>">
				<input type="submit" name="upgrade"  class="button button-primary large" id="pingdar-upgrade" value="Upgrade">
			</form>
			</div>		
		<?php endif; ?>
		
	<?php endif; ?>

	<div id="dom_target" style="display: none;">
		<?php
			echo htmlspecialchars(json_encode($response));
		?>
	</div>
</div>