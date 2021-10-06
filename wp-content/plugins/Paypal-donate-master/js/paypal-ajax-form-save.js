jQuery(document).ready(function($) {
	var fullName, emailAddress, mailingAddress, cityVal, stateVal, zipVal, dateVal, amountVal, frequency;

		$("body").on("click", "#paypal_form input[name='submit']", function () {
          amountVal = $('input[name="amount"]').val();
          fullName = $('[id="os1"]').val();
          emailAddress = $('[id="os2"]').val();
          mailingAddress = $('[id="os3"]').val();
          cityVal = $('[id="os4"]').val();
          stateVal = $('[id="os5"]').val().toUpperCase();
          zipVal = $('[id="os6"]').val();
          frequency = $('[name="frequency"]:checked').val();
			// console.log(amountVal);
		    $.ajax({
		    	type : "POST",
		    	url: save_form_ajax.ajaxurl,
		    	data: {
		    		action: 'save_form_to_database',
		    		fullName : fullName,
		    		emailAddress : emailAddress,
		    		mailingAddress : mailingAddress,
		    		cityVal : cityVal,
		    		stateVal : stateVal,
		    		zipVal : zipVal,
		    		amountVal : amountVal,
		    		frequency: frequency,
		    		//dateVal: dateVal,
		    	},
		    	success:function(data) {
		            // This outputs the result of the ajax request
		            fullName = fullName;
		            emailAddress = emailAddress;
		            mailingAddress = mailingAddress
		            cityVal = cityVal;
		            stateVal = stateVal;
		            zipVal = zipVal;
		            amountVal = amountVal;
		            frequency = frequency;
		            // dateVal = dateVal;
		         
		            console.log(data);
		        },
		        error: function(errorThrown, data){
		            console.log(errorThrown);
		            console.log(data);
		        },
		        complete: function(data){
		        	if(data.success == true) {
		            	$('.submit').click();
		            }
		        },
		    });
		    return true;

		});
});