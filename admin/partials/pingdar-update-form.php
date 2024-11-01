<?php $options = get_option('pingdar_user_settings');
//print_r($options); ?>
<div class="row text-centered">
    <div id="update" class="update">
        <h2>Update Your Profile</h2>
        <form id="updateForm"  method="post" name="pingdar_update" action>
            <fieldset>
                <div class="row">
                    <div class="col-6">
                        <input name="email" type="email" placeholder="Email"
                               value="<?php echo esc_html($options['email']); ?>"/>
                    </div>
                    <!--<div class="col-6">
                        <input name="pass" type="password" placeholder="New Password" value=""/>
                    </div>-->
                    <div class="col-3">
                        <input id="password" name="password" type="password" placeholder="New Password" />
                        <span id="msg-length"></span>
                    </div>
                    <div class="col-3">
                        <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" />
                        <span id="msg-match"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mobile">
                        <?php include_once('country-code.php'); ?>
                        <input name="mobile" type="number" placeholder="(Mobile Phone)"
                               value="<?php echo esc_html($options['user_phones']['number']); ?>"/>
                    </div>
                    <div class="col-6">
                        <?php include_once('time-zone.php'); ?>
                    </div>
                </div>
            </fieldset>

            <button id="pingdar-update" type="submit" name="pingdar-update" value="update"
                    onSubmit="return confirm('Are these settings correct?');">Update Profile
            </button>
        </form>
    </div>
</div>
