
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
				<input type="hidden" name="no_note" value="0" />
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest" />
				<input type="hidden" name="address1" value="" />
				<input type="hidden" name="city" value="" />
				<input type="hidden" name="state" value="" />
				<input type="hidden" name="zip" value="" />
	
				<div class="grid-x align-center buttongroup">
					<h4>1. Your Contribution</h4>
					<div class="buttons-rows cell">
						<div class="buttons-flex">
							<label for="amount1" id="lamount1"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount1" value="<?php echo $block1; ?>.00">$<?php echo $block1; ?>.00</label>
							
						    <label for="amount2" id="lamount2"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount2" value="<?php echo $block2; ?>.00">$<?php echo $block2; ?>.00</label>                                             
						                            
							<label for="amount3" id="lamount3"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount3" value="<?php echo $block3; ?>.00">$<?php echo $block3; ?>.00</label> 
							
							<label for="amount4" id="lamount4"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount4" value="<?php echo $block4; ?>.00">$<?php echo $block4; ?>.00</label>
						</div>
						<div class="buttons-flex">				
							<label for="amount5" id="lamount5"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount5" value="<?php echo $block5; ?>.00">$<?php echo $block5; ?>.00</label>

							<label for="amount7" id="lamount7"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio"  name="os10" id="amount7" value="<?php echo $block6; ?>.00">$<?php echo $block6; ?>.00</label> 
							
							<label for="amount8" id="lamount8"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount8" value="<?php echo $block7; ?>.00">$<?php echo $block7; ?>.00</label>					 
													
							<label for="amount6" id="lamount6"><input <?php if($errorObj && in_array('designation', $errorObj->errorFields)) echo 'class="styled"'; ?> type="radio" name="os10" id="amount6" value="other"><input type="text" name="os10_other" id="os10_other" placeholder="Enter a custom amount" /></label>
						</div>
						<p class="notice">Please enter a donation amount before continuing</p>
						<a class="continue">Continue</a>	
					</div>
				</div>
	

				<div class="control-group medium-12" style="display:none;">
					<h4><span class="returnto">1. Your Contribution ></span> 2. Your Details</h4>
					<!--<input type="hidden" name="on0" value="Application-Type" />-->
					<div class="control-group-wrap">
						
						<label for="os1">Full Name</label>
						<input type="text" name="os1" id="os1"  size="30" />
						<input type="hidden" name="on1" value="Name" />
						
						<label for="os2">Email</label>
						<input type="email" name="os2" id="os2" size="30" />

						<label for="os3">Mailing Address</label>
						<input type="hidden" name="on3" value="Address" />
						<input type="text" name="os3" id="os3" size="30" />
						
						<div class="flex-inputs">
							<label for="os4">City
							<input type="hidden" name="on4" value="City" />
							<input type="text" name="os4" id="os4" size="30" />
							</label>

							<label for="os5">State
							<input type="hidden" name="on5" value="State" />
							<input type="text" name="os5" id="os5" size="30" />
							</label>

							<label for="os6">Zip
							<input type="hidden" name="on6" value="Postal-Code" />
							<input type="text" name="os6" id="os6" size="30" />
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
			              
						<input type="submit" name="submit" class="paypal-submit" value="Donate" />
					</div>
				</div>

		</form>
		
	</div>
	<div class="clear"></div>
</div>