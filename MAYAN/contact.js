/* 
 *	Project: Simple Math Captcha 
 *	Author: Laith Sinawi
 *	Author website: Website: http://www.SinawiWebDesign.com
 *  	Purpose: Client-side form validation including custom Captcha
 */

$(document).ready( function() {
$('input[placeholder], textarea[placeholder]').placeholder();
	$('#submit').removeAttr('disabled');
	
	$.validator.addMethod('captcha',
							function(value) {
								$result = ( parseInt($('#num1').val()) + parseInt($('#num2').val()) == parseInt($('#captcha').val()) ) ;
								$('#spambot').fadeOut('fast');
								return $result;
								//alert("Result is " + $result );
							},
							'Incorrect value, please try again.'
	);
	
	$('#contact').validate({
		debug: true,
		//submitHandler: ajaxSubmit
                rules: {
                    message: {
                        required: true,
                        minlength: 10,
                        maxlength: 255
                    },
					captcha: {
						required: true,
						captcha: true
					},
					filter_date_in : {
						required: true
						
					},
					passengers : {
						required: true
						
					}
                },
                messages: {
                    firstName: "First name field required.",
                    lastName: "Last name field required.",
                    email: {
                        required: "Email address required",
                        email: "Email address must be in the format name@domain.com."                        
                    },
                    message: {
                        required: "Message field required",
                        minlength: "Message must contain at least 10 characters.",
                        maxlength: "Message must not contain more than 255 characters."
                    },
					chkCaptcha: {
						required: "* Required"
					}
                    
                }
                
	});
	
	$('#submit').click( function() {
		if( $('#contact').valid() ) {
				ajaxSubmit();
		}
		else {
			$('label.error').hide().fadeIn('slow');
		}
	});
	
});

function ajaxSubmit() {
	$('#loading').show();
	$('#submit').attr('disabled', 'disabled');
	var firstName = $('#firstName').val();
	var lastName = $('#lastName').val();
	var phones = $('#phones').val();
	var email = $('#email').val();
	var message = $('#message').val();
	var hotel_cruise = $('#hotel_cruise').val();
	var filter_date_in = $('#filter_date_in').val();
	var country = $('#country').val();
	var tourtime = $('#tourtime').val();
	var passengers = $('#passengers').val();
	

	 
	/*alert( "Form's about to be submitted! \n" 
		+ firstName + "\n" 
		+ lastName + "\n" 
		+ email + "\n" 
		+ message + "\n" );*/

	
	var data = 'firstName=' +firstName+ '&lastName=' +lastName+ '&email=' +email+ '&message=' +message+ '&phones=' +phones+ '&hotel_cruise=' +hotel_cruise+ '&filter_date_in=' +filter_date_in+ '&country=' +country+ '&tourtime=' +tourtime+ '&passengers=' +passengers;
		
	$.ajax({
		url: 'process.php',
		type: 'get',
		dataType: 'json',
		data: data,
		cache: false,
		success: function(response) {
			if( response.error != 'true' ) {
				$('#loading, #contact, .message').fadeOut('slow');
				$('#response').html('<h3>Your reservation has been sent and will be confirmed within 24 hours. Once availability be confirmed, a PayPal link will be sent to you with your confirmation.</h3>').fadeIn('slow');
            }
			else {
					$('#loading').fadeOut('slow');
					$('#submit').attr('disabled', 'disabled');
					$('#response').html('<h3>There was a problem sending mail!</h3>').fadeIn('slow');
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
                                $('#loading').fadeOut('slow');
				$('#submit').removeAttr('disabled');
				$('#response').text('Error Thrown: ' +errorThrown+ '<br>jqXHR: ' +jqXHR+ '<br>textStatus: ' +textStatus ).show();
		}
	});
	return false;
}
