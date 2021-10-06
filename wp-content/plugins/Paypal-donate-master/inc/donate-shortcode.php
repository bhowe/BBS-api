<?php

/**
 * Donate form shortcode
 */
 add_shortcode('donate_form', function()
{

	# PP Live
	$paypal_layout = get_theme_mod( 'donate_layout', 'two_page');
	$paypal_url = 'https://www.paypal.com/us/cgibin/';

	$redirect_url = get_theme_mod( 'donate_redirect',  '' );
	$redirect_cancel = get_theme_mod( 'donate_cancel_redirect',  '' );
	$notify_url = home_url();
	$site_name = get_bloginfo('name');

	// Get theme options if set by user in customizer
	$user_email =  get_theme_mod( 'donate_email', 'email@email.com' );
	$form_header = get_theme_mod( 'donate_header', '');
	$amount1 =  get_theme_mod( 'amount1', '10' );
	$amount2 =  get_theme_mod( 'amount2', '25' );
	$amount3 =  get_theme_mod( 'amount3', '50' );
	$amount4 =  get_theme_mod( 'amount4', '100' );
	$amount5 =  get_theme_mod( 'amount5', '250' );
	$amount6 =  get_theme_mod( 'amount6', '500' );
	$amount7 =  get_theme_mod( 'amount7', '1000' );
	$block1Text =  get_theme_mod( 'block_text1', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block2Text =  get_theme_mod( 'block_text2', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block3Text =  get_theme_mod( 'block_text3', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block4Text =  get_theme_mod( 'block_text3', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block5Text =  get_theme_mod( 'block_text3', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block6Text =  get_theme_mod( 'block_text3', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );
	$block7Text =  get_theme_mod( 'block_text3', 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.' );


	$email = (empty($user_email)) ? '' : $user_email;
	$redirect = (empty($redirect_url)) ? site_url().'/donate' :  site_url().$redirect_url;
	$redirectCancel = (empty($redirect_cancel)) ? site_url().'/donate' :  site_url().$redirect_cancel;
	$formtitle = (empty($form_header)) ? 'Contribute to '.$site_name.'!' : $form_header;
	$block1 = (empty($amount1)) ? '10' : $amount1;
	$block2 = (empty($amount2)) ? '25' : $amount2;
	$block3 = (empty($amount3)) ? '50' : $amount3;
	$block4 = (empty($amount4)) ? '100' : $amount4;
	$block5 = (empty($amount5)) ? '250' : $amount5;
	$block6 = (empty($amount6)) ? '500' : $amount6;
	$block7 = (empty($amount7)) ? '1000' : $amount7;

	$errorObj = null;

	$client_id = get_option('paypal_client_id');
	$secret_key = get_option('paypal_secret_key');
	$paypalEnv = get_option('paypal_environment');
	if($paypalEnv == '1') {
		$apiUrl = 'https://api.paypal.com';
	}
	else {
		$apiUrl = 'https://api-m.sandbox.paypal.com';
	}
	
	ob_start();

	// var_dump($block1P);
?>

<style type="text/css">
 input.error { border: 1px solid red; }
</style>

<?php if( $paypal_layout === 'two_columns') { ?>
<div class="grid-container grid-x">
<div class="donate-form medium-6 cell">

	<div class="donate-wrapper">
		
			<form id="paypal_form" action="https://www.paypal.com/cgi-bin/webscr" method="post" class="membership-form rpf-form grid-container" name="paypal_donation">	
	
				<input type="hidden" id="paypalSend" action="https://www.paypal.com/cgi-bin/webscr" method="post" name="form_name" value="special-donation">
				<div class="errors"><?php if (isset($errorObj) && $errorObj->hasError === true){ echo $errorObj->errorHtml; }; ?></div>
						
				<input type="hidden" name="cmd" value="_donations" />
				<input type="hidden" name="business" value="<?php echo $email; ?>" />
				<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>" />
				<input name="return" type="hidden" value="<?php echo $redirect; ?>" />
				<input name="cancel_return" type="hidden" value="<?php echo $redirectCancel; ?>" />
				<input name="paypal_url" type="hidden" value="<?php echo $paypal_url; ?>" />
				<input type="hidden" name="item_name" value="Donation to <?php echo $site_name; ?>" />
				<input type="hidden" name="currency_code" value="USD" />
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest" />
				<input type="hidden" name="address1" value="" />
				<input type="hidden" name="city" value="" />
				<input type="hidden" name="state" value="" />
				<input type="hidden" name="zip" value="" />
				<input type="hidden" name="a3" value="" />
				<input type="hidden" name="p3" value="1" />
				<input type="hidden" name="t3" value="M" />
				<input type="hidden" name="src" value="1">
				<input type="hidden" name="sra" value="1">

	
				<div class="grid-x align-center buttongroup">
					<h4>Choose a donation amount.</h4>
					<div class="buttons-rows cell two-columns">
						<div class="buttons-flex two-columns">
							<?php if(!empty($amount1)) { ?>
								<div class="textgroup block1text">
									<label for="amount1" id="lamount1"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount1" value="<?php echo $block1; ?>.00" />$<?php echo $block1; ?>.00</label>
									<?php if(!empty($block1Text)) { ?>
										<p><?php echo $block1Text; ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<?php if(!empty($amount2)) { ?>
								<div class="textgroup block2text">
							    	<label for="amount2" id="lamount2"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount2" value="<?php echo $block2; ?>.00" />$<?php echo $block2; ?>.00</label>
							    	<?php if(!empty($block2Text)) { ?>
							    		<p><?php echo $block2Text; ?></p>
							    	<?php } ?>
								</div>                                             
						    <?php } ?>
							<?php if(!empty($amount3)) { ?>
							    <div class="textgroup block3text">                       
									<label for="amount3" id="lamount3"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount3" value="<?php echo $block3; ?>.00" />$<?php echo $block3; ?>.00</label>
									<?php if(!empty($block3Text)) { ?>
							    		<p><?php echo $block3Text; ?></p>
							    	<?php } ?>
								</div>
							<?php } ?>
							<?php if(!empty($amount4)) { ?>
								<div class="textgroup block4text">
									<label for="amount4" id="lamount4"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount4" value="<?php echo $block4; ?>.00">$<?php echo $block4; ?>.00</label>
									<?php if(!empty($block4Text)) { ?>
							    		<p><?php echo $block4Text; ?></p>
							    	<?php } ?>
								</div>
							<?php } ?>
							<?php if(!empty($amount5)) { ?>	
								<div class="textgroup block5text">		
									<label for="amount5" id="lamount5"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount5" value="<?php echo $block5; ?>.00">$<?php echo $block5; ?>.00</label>
									<?php if(!empty($block5Text)) { ?>
							    		<p><?php echo $block5Text; ?></p>
							    	<?php } ?>
								</div>
							<?php } ?>
							<?php if(!empty($amount6)) { ?>
								<div class="textgroup block6text">
									<label for="amount7" id="lamount7"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount7" value="<?php echo $block6; ?>.00">$<?php echo $block6; ?>.00</label> 
									<?php if(!empty($block6Text)) { ?>
							    		<p><?php echo $block6Text; ?></p>
							    	<?php } ?>
								</div>
							<?php } ?>
							<?php if(!empty($amount7)) { ?>
								<div class="textgroup block7text">
									<label for="amount8" id="lamount8"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount8" value="<?php echo $block7; ?>.00">$<?php echo $block7; ?>.00</label>
									<?php if(!empty($block7Text)) { ?>
							    		<p><?php echo $block7Text; ?></p>
							    	<?php } ?>
								</div>
							<?php } ?>
							<div class="textgroup blockOthertext">
								<label for="amount6" id="lamount6"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount6" value="other" /><input type="text" name="os10_other" id="os10_other" placeholder="Enter a custom amount" /></label> 
							</div>	
						</div>
						
						
					</div>
					
					<div class="frequency buttongroup">
						<h4>Choose a donation frequency</h4>
							<div class="buttons-flex two-columns">
								<label for="frequency1" id="one-time"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency" id="frequency1" value="_donations">One Time</label>

								<label for="frequency2" id="recurring"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency" id="frequency2" value="_xclick-subscriptions">Recurring</label>
							</div>
					</div>
					<p class="notice">Please choose a donation amount and frequency before continuing</p>

					<a class="continue two-columns">Continue</a>
				</div>
	

				<div class="control-group medium-12 two-columns" style="display:none;">
					<h4><span class="returnto">Back to donation amount ></span> Your Information</h4>
					<!--<input type="hidden" name="on0" value="Application-Type" />-->
					<div class="control-group-wrap">
						
						<label for="os1">Full Name</label>
						<input type="text" name="os1" id="os1"  size="30" placeholder="Full Name" />
						<input type="hidden" name="on1" value="Name" />
						
						<label for="os2">Email</label>
						<input type="email" name="os2" id="os2" size="30" placeholder="Email Address" />

						<label for="os3">Mailing Address</label>
						<input type="hidden" name="on3" value="Address" />
						<input type="text" name="os3" id="os3" size="30" placeholder="Mailing Address" />
						
						<div class="flex-inputs">
							<label for="os4">City
							<input type="hidden" name="on4" value="City" />
							<input type="text" name="os4" id="os4" size="30" placeholder="City" />
							</label>

							<label for="os5">State
							<input type="hidden" name="on5" value="State" />
							<input type="text" name="os5" id="os5" size="30" placeholder="State" />
							</label>

							<label for="os6">Zip
							<input type="hidden" name="on6" value="Postal-Code" />
							<input type="text" name="os6" id="os6" size="30" placeholder="Zip Code" />
							</label>
						</div>
						

						<!-- <div class="flex-inputs2">
							<label for="os7">Occupation
							<input type="hidden" name="on7" value="Occupation" />
							<input type="text" name="os7" id="os7" size="30" />
							</label>

							<label for="os8">Employer
							<input type="hidden" name="on8" value="Employer" />
							<input type="text" name="os8" id="os8" size="30" />
							</label>
						</div> -->

						
						<input type="hidden" name="amount" value="">
			              
						<!-- <input type="submit" name="submit" class="paypal-validate" value="Donate" /> -->
						<input type="submit" name="send-form" class="paypal-submit" />
					</div>
				</div>

		</form>
		
	</div>
	<div class="clear"></div>
</div>
<div class="title-div cell medium-6">
	<div class="donate-headline"><h3 class="widget-title"><?php echo $formtitle; ?></h3></div>
</div>
</div>
<?php } else { ?>
<div class="donate-form grid-container">

	<div class="donate-wrapper">
		<div class="donate-headline"><h3 class="widget-title"><?php echo $formtitle; ?></h3></div>
			<form id="paypal_form" action="https://www.paypal.com/cgi-bin/webscr" method="post" class="membership-form rpf-form grid-container" name="paypal_donation">	
	
				<input type="hidden" action="https://www.paypal.com/cgi-bin/webscr" name="form_name" value="special-donation">
				<div class="errors"><?php if (isset($errorObj) && $errorObj->hasError === true){ echo $errorObj->errorHtml; }; ?></div>
						
				<input type="hidden" name="cmd" value="_donations" />
				<input type="hidden" name="business" value="<?php echo $email; ?>" />
				<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>" />
				<input name="return" type="hidden" value="<?php echo $redirect; ?>" />
				<input name="cancel_return" type="hidden" value="<?php echo $redirectCancel; ?>" />
				<input name="paypal_url" type="hidden" value="<?php echo $paypal_url; ?>" />
				<input type="hidden" name="item_name" value="Donation to <?php echo $site_name; ?>" />
				<input type="hidden" name="currency_code" value="USD" />
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest" />
				<input type="hidden" name="address1" value="" />
				<input type="hidden" name="city" value="" />
				<input type="hidden" name="state" value="" />
				<input type="hidden" name="zip" value="" />
				<input type="hidden" name="a3" value="" />
				<input type="hidden" name="p3" value="1" />
				<input type="hidden" name="t3" value="M" />
				<input type="hidden" name="src" value="1">
				<input type="hidden" name="sra" value="1">

				<div class="grid-x align-center buttongroup">
					<h4>1. Your Contribution</h4>
					<div class="buttons-rows cell">
						<div class="buttons-flex">
						<?php if(!empty($amount1)) { ?>
							<label for="amount1" id="lamount1"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount1" value="<?php echo $block1; ?>.00">$<?php echo $block1; ?>.00</label>
						<?php } ?>
						<?php if(!empty($amount2)) { ?>
						    <label for="amount2" id="lamount2"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount2" value="<?php echo $block2; ?>.00">$<?php echo $block2; ?>.00</label>                      
						<?php } ?>
						<?php if(!empty($amount3)) { ?>                      
							<label for="amount3" id="lamount3"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount3" value="<?php echo $block3; ?>.00">$<?php echo $block3; ?>.00</label> 
						<?php } ?>
						<?php if(!empty($amount4)) { ?>
							<label for="amount4" id="lamount4"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount4" value="<?php echo $block4; ?>.00">$<?php echo $block4; ?>.00</label>
						<?php } ?>
						</div>
						<div class="buttons-flex">	
						<?php if(!empty($amount5)) { ?>			
							<label for="amount5" id="lamount5"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount5" value="<?php echo $block5; ?>.00">$<?php echo $block5; ?>.00</label>
						<?php } ?>
						<?php if(!empty($amount6)) { ?>
							<label for="amount7" id="lamount7"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount7" value="<?php echo $block6; ?>.00">$<?php echo $block6; ?>.00</label> 
						<?php } ?>
						<?php if(!empty($amount7)) { ?>
							<label for="amount8" id="lamount8"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount8" value="<?php echo $block7; ?>.00">$<?php echo $block7; ?>.00</label>					 
						<?php } ?>					
							<label for="amount6" id="lamount6"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount6" value="other"><input type="text" name="os10_other" id="os10_other" placeholder="Enter a custom amount" /></label>
						</div>
						<div class="frequency buttongroup control-width">
							<h4>Choose a donation frequency</h4>
							<div class="buttons-flex two-columns">
								<label for="frequency1" id="one-time"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency" id="frequency1" value="_donations">One Time</label>

								<label for="frequency2" id="recurring"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency" id="frequency2" value="_xclick-subscriptions">Recurring</label>
							</div>
							<div class="buttons-flex two-columns frequency_types">
								<label for="frequency_number">
									<select name="frequency_number" id="frequency_number">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</label>

								<!-- <label for="frequency_types"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency_types" id="frequency_month" value="Monthly">Monthly</label>

								<label for="frequency_year" id="recurring"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="frequency_types" id="frequency_year" value="Yearly">Yearly</label> -->

								<label for="frequency_types">
									<select name="frequency_types" id="frequency_types">
										<option value="Monthly">Monthly</option>
										<option value="Yearly">Yearly</option>
									</select>
								</label>
							</div>
						</div>
						<input type="hidden" name="amount_val" id="amount_val">
						<p class="notice">Please enter a donation amount and frequency before continuing</p>
						<a class="continue">Continue</a>	
					</div>
				</div>
	

				<div class="control-group medium-12" style="display:none;">
					<h4><span class="returnto">1. Your Contribution ></span> 2. Your Details</h4>
					<!--<input type="hidden" name="on0" value="Application-Type" />-->
					<div class="control-group-wrap">

						<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $client_id; ?>&currency=USD" data-sdk-integration-source="button-factory"></script>

						<textarea name="pay_note" id="pay_note" placeholder="Please Enter Note"></textarea>
					  	<div id="paypal-button-container"></div>

					  	<script>

					  		function initPayPalButton() {
						  		var amountVal = document.getElementById('os10_other').value;
						  		var desc = document.getElementById('pay_note').value;

							    var purchase_units = [];
							    purchase_units[0] = {};
							    purchase_units[0].amount = {};

							    console.log('amount - '+amountVal);

						        purchase_units[0].amount.value = amountVal;

						  		paypal.Buttons({

								    createOrder: function(data, actions) {

								      // This function sets up the details of the transaction, including the amount and line item details.

								      return actions.order.create({

								        purchase_units: [{

								          amount: {

								            value: document.getElementById('amount_val').value

								          },

								          description : document.getElementById('pay_note').value

								        }]

								      });

								    },

								    onApprove: function(data, actions) {

								      // This function captures the funds from the transaction.

								      return actions.order.capture().then(function(details) {

								        // This function shows a transaction success message to your buyer.

								        alert('Transaction completed by ' + details.payer.name.given_name);

								        /*actions.redirect('thank_you.html');*/

								      });

								    },

								    onError: function (err) {
								        console.log(err);
							      	}

							  	}).render('#paypal-button-container');
						  	}

						  	//This function displays Smart Payment Buttons on your web page.

						  	initPayPalButton();
					  	</script>

						
						<!-- <input type="hidden" name="amount" value="">
			              
						<input type="submit" name="send-form" class="paypal-submit" value="Donate" /> -->
					</div>
				</div>

		</form>
		
	</div>
	<div class="clear"></div>
</div>
<?php } ?>
<?php
	$form = ob_get_clean();
	return $form;
});