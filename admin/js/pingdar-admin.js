(function( $ ) {
	'use strict';

	$(function() {
		
	});

	$(window).load(function() {

		$('#password, #confirm_password').on('keyup', function () {
		  if ($('#password').val() == $('#confirm_password').val() && $('#password').val().length > 5) {
		    $('#confirm_password').css('border-color', 'green');
		    $('#pingdar-update').prop('disabled', false).removeClass('disabled');
		    $('#msg-match').html('');
		    $('#msg-length').html('');
		  } else if ($('#password').val().length == 0) {
		  	$('#pingdar-update').prop('disabled', false).removeClass('disabled');
		  	$('#confirm_password').css('border-color', 'transparent');
		  	$('#msg-match').html('');
		    $('#msg-length').html('');
		  } else {
		    $('#confirm_password').css('border-color', 'red');
		    $('#pingdar-update').prop('disabled', true).addClass('disabled');
		    $('#msg-length').html('Must be 6 characters or more');
		    $('#msg-match').html('Does not match');
		  }
		});

		$('#signin-switch, #register-switch').on('click', function() {
			$('#register, #signin').toggleClass('hidden');
		})

		$('#pingdar-profile').on('click', function() {
			$('#chart_div, #edit-profile').toggleClass('hidden');
			if ( $('#edit-profile').hasClass('hidden') ){
				$('#pingdar-profile').html('Edit Profile');
			} else {
				$('#pingdar-profile').html('Pingdar Status');
			}

			var ccDiv = document.getElementById("cc_data");
			var ccData = $.trim(ccDiv.textContent);
			$('#countries option[value="' + ccData + '"]').prop('selected', true);

			var tzDiv = document.getElementById("tz_data");
			var tzData = $.trim(tzDiv.textContent);
			$('#timezone option:contains(' + tzData + ')').prop('selected', true);
		})

		/*$('#country').change(function() {
			var val = $(this).val();
			if (val == 'United States'){
				$('#state-zip').removeClass('hidden');
				$('#state, #zip').prop('required', true);
			} else {
				$('#state-zip').addClass('hidden');
				$('#state, #zip').prop('required', false);
			}
		})*/
	})
	/*The following will resize the table in the browser*/
	$(window).resize(function () {
	 drawTable();
	});

})( jQuery );
