<div class="row">
    <div id="register" class="register col-6 push-3 ">
		<div class="row">
			<div class="col-3 switch">
                <button  class="button" id="signin-switch">Sign In</button>
			</div>
		</div>
        <div class="text-left">
		<h2>Register for Pingdar</h2>
            <p>Sign up for Pingdar! (If you are already a member, click Sign In )
		Start receiving stats and notifications when your site is down.
		Once you have Registered, please click the Validation link that we will send to your email.
		</p>
        </div>

		<form method="post" name="pingdar_register" action>

			<fieldset>
                <div class="row ">
					<!--<div class="col-6">
						<input name="username" type="text" placeholder="Username" value="<?php echo esc_html($options['username']); ?>" required/>
					</div>-->
                    <div class="col-12">
                        <input id="fullwidth" class="regular-text code" name="email" type="email" placeholder="Email"
                               value="<?php echo wp_get_current_user()->user_email; ?>" required/>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-6">
						<input id="password" name="password" type="password" placeholder="Password" />
					</div>
					<div class="col-6">
						<input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" />
						<span id="message"></span>
					</div>
				</div>-->
				<div class="row">

                    <div class="col-12">

                        <div class="col-4">
						<?php include_once('country-code.php'); ?>
					</div>

                        <div class="col-8">
                            <input id="fullwidth" name="mobile" type="number" placeholder="(Mobile Phone)"
                                   value="<?php echo esc_html($options['mobile']); ?>" required/>
				</div>
                    </div>

                </div>

				<div class="row">
                    <div class="col-12">
					<?php include_once('time-zone.php'); ?>
	  		</div>
                </div>
                <div class="row">
                    <?php
                    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    ?>
                    <input type="hidden" name='ridrect_url' value="<?= $actual_link;?>">
                    <div class="col-12 text-left">
                        <button id="pingdar-register" type="submit" class="button button-primary" name="pingdar-register" value="update"
                                onSubmit="return confirm('Are these settings correct?');">Register Account
                        </button>
                    </div>
                </div>
			</fieldset>

  		<!--<fieldset class="row">
				<div class="col-6">
				<input name="firstname" type="text" placeholder="Firstname" value="<?php echo esc_html($options['firstname']); ?>" />
				</div>
				<div class="col-6">
				<input name="lastname" type="text" placeholder="Lastname" value="<?php echo esc_html($options['lastname']); ?>" />
				</div>
			</fieldset>-->

			<!--<fieldset>
				<div class="row">
					<div class="col-6">
						<input name="address" type="text" placeholder="Street Address" value="<?php echo esc_html($options['address']); ?>" />
					</div>
					<div class="col-6">
						<input name="city" type="text" placeholder="City" value="<?php echo esc_html($options['city']); ?>" />
					</div>
				</div>
				<div class="row">
					<select id="country" class="form-dropdown" placeholder="Country" id="input_1" name="country" data-component="dropdown">
	            <option value="" disabled selected>Country</option>
	            <option value="Afghanistan"> Afghanistan </option>
	            <option value="Albania"> Albania </option>
	            <option value="Algeria"> Algeria </option>
	            <option value="American Samoa"> American Samoa </option>
	            <option value="Andorra"> Andorra </option>
	            <option value="Angola"> Angola </option>
	            <option value="Anguilla"> Anguilla </option>
	            <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
	            <option value="Argentina"> Argentina </option>
	            <option value="Armenia"> Armenia </option>
	            <option value="Aruba"> Aruba </option>
	            <option value="Australia"> Australia </option>
	            <option value="Austria"> Austria </option>
	            <option value="Azerbaijan"> Azerbaijan </option>
	            <option value="The Bahamas"> The Bahamas </option>
	            <option value="Bahrain"> Bahrain </option>
	            <option value="Bangladesh"> Bangladesh </option>
	            <option value="Barbados"> Barbados </option>
	            <option value="Belarus"> Belarus </option>
	            <option value="Belgium"> Belgium </option>
	            <option value="Belize"> Belize </option>
	            <option value="Benin"> Benin </option>
	            <option value="Bermuda"> Bermuda </option>
	            <option value="Bhutan"> Bhutan </option>
	            <option value="Bolivia"> Bolivia </option>
	            <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
	            <option value="Botswana"> Botswana </option>
	            <option value="Brazil"> Brazil </option>
	            <option value="Brunei"> Brunei </option>
	            <option value="Bulgaria"> Bulgaria </option>
	            <option value="Burkina Faso"> Burkina Faso </option>
	            <option value="Burundi"> Burundi </option>
	            <option value="Cambodia"> Cambodia </option>
	            <option value="Cameroon"> Cameroon </option>
	            <option value="Canada"> Canada </option>
	            <option value="Cape Verde"> Cape Verde </option>
	            <option value="Cayman Islands"> Cayman Islands </option>
	            <option value="Central African Republic"> Central African Republic </option>
	            <option value="Chad"> Chad </option>
	            <option value="Chile"> Chile </option>
	            <option value="People &#x27;s Republic of China"> People &#x27;s Republic of China </option>
	            <option value="Republic of China"> Republic of China </option>
	            <option value="Christmas Island"> Christmas Island </option>
	            <option value="Cocos(Keeling) Islands"> Cocos(Keeling) Islands </option>
	            <option value="Colombia"> Colombia </option>
	            <option value="Comoros"> Comoros </option>
	            <option value="Congo"> Congo </option>
	            <option value="Cook Islands"> Cook Islands </option>
	            <option value="Costa Rica"> Costa Rica </option>
	            <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
	            <option value="Croatia"> Croatia </option>
	            <option value="Cuba"> Cuba </option>
	            <option value="Cyprus"> Cyprus </option>
	            <option value="Czech Republic"> Czech Republic </option>
	            <option value="Denmark"> Denmark </option>
	            <option value="Djibouti"> Djibouti </option>
	            <option value="Dominica"> Dominica </option>
	            <option value="Dominican Republic"> Dominican Republic </option>
	            <option value="Ecuador"> Ecuador </option>
	            <option value="Egypt"> Egypt </option>
	            <option value="El Salvador"> El Salvador </option>
	            <option value="Equatorial Guinea"> Equatorial Guinea </option>
	            <option value="Eritrea"> Eritrea </option>
	            <option value="Estonia"> Estonia </option>
	            <option value="Ethiopia"> Ethiopia </option>
	            <option value="Falkland Islands"> Falkland Islands </option>
	            <option value="Faroe Islands"> Faroe Islands </option>
	            <option value="Fiji"> Fiji </option>
	            <option value="Finland"> Finland </option>
	            <option value="France"> France </option>
	            <option value="French Polynesia"> French Polynesia </option>
	            <option value="Gabon"> Gabon </option>
	            <option value="The Gambia"> The Gambia </option>
	            <option value="Georgia"> Georgia </option>
	            <option value="Germany"> Germany </option>
	            <option value="Ghana"> Ghana </option>
	            <option value="Gibraltar"> Gibraltar </option>
	            <option value="Greece"> Greece </option>
	            <option value="Greenland"> Greenland </option>
	            <option value="Grenada"> Grenada </option>
	            <option value="Guadeloupe"> Guadeloupe </option>
	            <option value="Guam"> Guam </option>
	            <option value="Guatemala"> Guatemala </option>
	            <option value="Guernsey"> Guernsey </option>
	            <option value="Guinea"> Guinea </option>
	            <option value="Guinea - Bissau"> Guinea - Bissau </option>
	            <option value="Guyana"> Guyana </option>
	            <option value="Haiti"> Haiti </option>
	            <option value="Honduras"> Honduras </option>
	            <option value="Hong Kong"> Hong Kong </option>
	            <option value="Hungary"> Hungary </option>
	            <option value="Iceland"> Iceland </option>
	            <option value="India"> India </option>
	            <option value="Indonesia"> Indonesia </option>
	            <option value="Iran"> Iran </option>
	            <option value="Iraq"> Iraq </option>
	            <option value="Ireland"> Ireland </option>
	            <option value="Israel"> Israel </option>
	            <option value="Italy"> Italy </option>
	            <option value="Jamaica"> Jamaica </option>
	            <option value="Japan"> Japan </option>
	            <option value="Jersey"> Jersey </option>
	            <option value="Jordan"> Jordan </option>
	            <option value="Kazakhstan"> Kazakhstan </option>
	            <option value="Kenya"> Kenya </option>
	            <option value="Kiribati"> Kiribati </option>
	            <option value="North Korea"> North Korea </option>
	            <option value="South Korea"> South Korea </option>
	            <option value="Kosovo"> Kosovo </option>
	            <option value="Kuwait"> Kuwait </option>
	            <option value="Kyrgyzstan"> Kyrgyzstan </option>
	            <option value="Laos"> Laos </option>
	            <option value="Latvia"> Latvia </option>
	            <option value="Lebanon"> Lebanon </option>
	            <option value="Lesotho"> Lesotho </option>
	            <option value="Liberia"> Liberia </option>
	            <option value="Libya"> Libya </option>
	            <option value="Liechtenstein"> Liechtenstein </option>
	            <option value="Lithuania"> Lithuania </option>
	            <option value="Luxembourg"> Luxembourg </option>
	            <option value="Macau"> Macau </option>
	            <option value="Macedonia"> Macedonia </option>
	            <option value="Madagascar"> Madagascar </option>
	            <option value="Malawi"> Malawi </option>
	            <option value="Malaysia"> Malaysia </option>
	            <option value="Maldives"> Maldives </option>
	            <option value="Mali"> Mali </option>
	            <option value="Malta"> Malta </option>
	            <option value="Marshall Islands"> Marshall Islands </option>
	            <option value="Martinique"> Martinique </option>
	            <option value="Mauritania"> Mauritania </option>
	            <option value="Mauritius"> Mauritius </option>
	            <option value="Mayotte"> Mayotte </option>
	            <option value="Mexico"> Mexico </option>
	            <option value="Micronesia"> Micronesia </option>
	            <option value="Moldova"> Moldova </option>
	            <option value="Monaco"> Monaco </option>
	            <option value="Mongolia"> Mongolia </option>
	            <option value="Montenegro"> Montenegro </option>
	            <option value="Montserrat"> Montserrat </option>
	            <option value="Morocco"> Morocco </option>
	            <option value="Mozambique"> Mozambique </option>
	            <option value="Myanmar"> Myanmar </option>
	            <option value="Nagorno - Karabakh"> Nagorno - Karabakh </option>
	            <option value="Namibia"> Namibia </option>
	            <option value="Nauru"> Nauru </option>
	            <option value="Nepal"> Nepal </option>
	            <option value="Netherlands"> Netherlands </option>
	            <option value="Netherlands Antilles"> Netherlands Antilles </option>
	            <option value="New Caledonia"> New Caledonia </option>
	            <option value="New Zealand"> New Zealand </option>
	            <option value="Nicaragua"> Nicaragua </option>
	            <option value="Niger"> Niger </option>
	            <option value="Nigeria"> Nigeria </option>
	            <option value="Niue"> Niue </option>
	            <option value="Norfolk Island"> Norfolk Island </option>
	            <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
	            <option value="Northern Mariana"> Northern Mariana </option>
	            <option value="Norway"> Norway </option>
	            <option value="Oman"> Oman </option>
	            <option value="Pakistan"> Pakistan </option>
	            <option value="Palau"> Palau </option>
	            <option value="Palestine"> Palestine </option>
	            <option value="Panama"> Panama </option>
	            <option value="Papua New Guinea"> Papua New Guinea </option>
	            <option value="Paraguay"> Paraguay </option>
	            <option value="Peru"> Peru </option>
	            <option value="Philippines"> Philippines </option>
	            <option value="Pitcairn Islands"> Pitcairn Islands </option>
	            <option value="Poland"> Poland </option>
	            <option value="Portugal"> Portugal </option>
	            <option value="Puerto Rico"> Puerto Rico </option>
	            <option value="Qatar"> Qatar </option>
	            <option value="Romania"> Romania </option>
	            <option value="Russia"> Russia </option>
	            <option value="Rwanda"> Rwanda </option>
	            <option value="Saint Barthelemy"> Saint Barthelemy </option>
	            <option value="Saint Helena"> Saint Helena </option>
	            <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
	            <option value="Saint Lucia"> Saint Lucia </option>
	            <option value="Saint Martin"> Saint Martin </option>
	            <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
	            <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
	            <option value="Samoa"> Samoa </option>
	            <option value="San Marino"> San Marino </option>
	            <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
	            <option value="Saudi Arabia"> Saudi Arabia </option>
	            <option value="Senegal"> Senegal </option>
	            <option value="Serbia"> Serbia </option>
	            <option value="Seychelles"> Seychelles </option>
	            <option value="Sierra Leone"> Sierra Leone </option>
	            <option value="Singapore"> Singapore </option>
	            <option value="Slovakia"> Slovakia </option>
	            <option value="Slovenia"> Slovenia </option>
	            <option value="Solomon Islands"> Solomon Islands </option>
	            <option value="Somalia"> Somalia </option>
	            <option value="Somaliland"> Somaliland </option>
	            <option value="South Africa"> South Africa </option>
	            <option value="South Ossetia"> South Ossetia </option>
	            <option value="Spain"> Spain </option>
	            <option value="Sri Lanka"> Sri Lanka </option>
	            <option value="Sudan"> Sudan </option>
	            <option value="Suriname"> Suriname </option>
	            <option value="Svalbard"> Svalbard </option>
	            <option value="Swaziland"> Swaziland </option>
	            <option value="Sweden"> Sweden </option>
	            <option value="Switzerland"> Switzerland </option>
	            <option value="Syria"> Syria </option>
	            <option value="Taiwan"> Taiwan </option>
	            <option value="Tajikistan"> Tajikistan </option>
	            <option value="Tanzania"> Tanzania </option>
	            <option value="Thailand"> Thailand </option>
	            <option value="Timor - Leste"> Timor - Leste </option>
	            <option value="Togo"> Togo </option>
	            <option value="Tokelau"> Tokelau </option>
	            <option value="Tonga"> Tonga </option>
	            <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
	            <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
	            <option value="Tristan da Cunha"> Tristan da Cunha </option>
	            <option value="Tunisia"> Tunisia </option>
	            <option value="Turkey"> Turkey </option>
	            <option value="Turkmenistan"> Turkmenistan </option>
	            <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
	            <option value="Tuvalu"> Tuvalu </option>
	            <option value="Uganda"> Uganda </option>
	            <option value="Ukraine"> Ukraine </option>
	            <option value="United Arab Emirates"> United Arab Emirates </option>
	            <option value="United Kingdom"> United Kingdom </option>
	            <option value="United States"> United States </option>
	            <option value="Uruguay"> Uruguay </option>
	            <option value="Uzbekistan"> Uzbekistan </option>
	            <option value="Vanuatu"> Vanuatu </option>
	            <option value="Vatican City"> Vatican City </option>
	            <option value="Venezuela"> Venezuela </option>
	            <option value="Vietnam"> Vietnam </option>
	            <option value="British Virgin Islands"> British Virgin Islands </option>
	            <option value="Isle of Man"> Isle of Man </option>
	            <option value="US Virgin Islands"> US Virgin Islands </option>
	            <option value="Wallis and Futuna"> Wallis and Futuna </option>
	            <option value="Western Sahara"> Western Sahara </option>
	            <option value="Yemen"> Yemen </option>
	            <option value="Zambia"> Zambia </option>
	            <option value="Zimbabwe"> Zimbabwe </option>
	          </select>
	        </div>
	        <div id="state-zip" class="row">
	        	<div class="col-6">
	        		<input id="zip" name="zip" type="text" placeholder="Zipcode" />
	        	</div>
	        	<div class="col-6">
	        		<input id="state" name="state" type="text" placeholder="State/Region" />
	        	</div>
	        </div>
			</fieldset>-->

			<!--<div class="col-6">
						<input name="company" type="text" placeholder="Company" />
					</div>-->


		</form>
	</div>
    <div id="signin" class="signin col-6 push-3 text-left hidden">
		<div class="row">
			<div class="col-3 switch">
                <button class="button" id="register-switch">Register</button>
			</div>
		</div>
        <form method="post" name="pingdar_signin" action="">
			<h2>Sign In to Pingdar</h2>
			<fieldset>
				<div class="row">
                    <input id="username" class="fullwidth regular-text" name="username" type="text" placeholder="Username" required/>
				</div>
				<div class="row">
                    <input id="password" class="fullwidth regular-text" name="password" type="password" placeholder="Password" required/>
				</div>
			</fieldset>

            <button id="pingdar-signin" type="submit" name="pingdar-signin" class="button button-primary" value="update">Sign In</button>

		</form>
	</div>
</div>