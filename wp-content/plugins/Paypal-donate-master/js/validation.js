function has_id(id){try{var tmp=document.getElementById(id).value;}catch(e){return false;}
return true;}
function has_name(nm){try{var tmp=cfrm.nm.type;}catch(e){return false;}
return true;}
function $$(id){if(!has_id(id)&&!has_name(id)){alert("Field "+id+" does not exist!\n Form validation configuration error.");return false;}
if(has_id(id)){return document.getElementById(id).value;}else{return;}}
function $val(id){return document.getElementById(id);}
function trim(id){$val(id).value=$val(id).value.replace(/^\s+/,'').replace(/\s+$/,'');}
var required={field:[],add:function(name,type,mess){this.field[this.field.length]=[name,type,mess];},out:function(){return this.field;},clear:function(){this.field=[];}};var validate={check:function(cform){var error_message='Please fix the following errors:\n\n';var mess_part='';var to_focus='';var tmp=true;for(var i=0;i<required.field.length;i++){if(this.checkit(required.field[i][0],required.field[i][1],cform)){}else{error_message=error_message+required.field[i][2]+' must be supplied\n';if(has_id(required.field[i][0])&&to_focus.length===0){to_focus=required.field[i][0];}
tmp=false;}}
if(!tmp){alert(error_message);}
if(to_focus.length>0){document.getElementById(to_focus).focus();}
return tmp;},checkit:function(cvalue,ctype,cform){if(ctype=="NOT_EMPTY"){if(this.trim($$(cvalue)).length<1){return false;}else{return true;}}else if(ctype=="EMAIL"){exp=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;if($$(cvalue).match(exp)==null){return false;}else{return true;}}},trim:function(s){if(s.length>0){return s.replace(/^\s+/,'').replace(/\s+$/,'');}else{return s;}}};


jQuery(document).ready(function($) {

	$('input:radio[name=os10]').each(function () { $(this).prop('checked', false); });

	$('#submit').click(function(){
	    if ($("#paypal_form").valid() === true)
	    {
	        document.getElementById('submit').src = "http://www.example.com/images/loading.gif";
	    }
	});

	$('.textgroup').click(function(){
		var $this = $(this);
		// console.log($this);
		//$this.siblings('input:radio[name="os10"]').prop('checked', true);
		$('.textgroup').removeClass('selected');
		$this.toggleClass('selected').find('input').prop('checked', true);

		other_val = $this.find('[id="os10_other"]').val();
		val = $this.find('[name="os10"]:checked').val();

			$('input[name="amount"]').attr('value', val);
			$('input[name="a3"]').attr('value', val);
			console.log($('input[name="amount"]').val());

			$('p.notice').removeClass('shown');
	});

	$('input[name="os10"]').on('change',function(){
		var $this = $(this);
		 $('.buttons-flex').removeClass('selected');
	        $('label[for="'+ $this.attr('id') +'"]').toggleClass('selected');
	});

	$('input[name="frequency"]').on('change',function(){
		var $this = $(this);
		 $('label[for="'+ $this.attr('id') +'"]').siblings().removeClass('selected');
	        $('label[for="'+ $this.attr('id') +'"]').toggleClass('selected');
	});

	$('input[name="os10"]').on('change', function() {
		other_val = $('[id="os10_other"]').val();
		val = $('[name="os10"]:checked').val();

		$('input[name="amount"]').attr('value', val);
		$('input[name="a3"]').attr('value', val);

		$('p.notice').removeClass('shown');

	});

	$('input[name="os10_other"]').on('change',function(){
		var $this = $(this);
		var $other_val = $('[id="os10_other"]').val();
			$('input#amount6').prop( 'checked', true ).val($other_val);
			$('label').removeClass('selected');
			$('label[for="amount6"]').toggleClass('selected');
			val = $('[id="os10_other"]').val();
			$('input[name="amount"]').attr('value', val);
			$('input[name="a3"]').attr('value', val);
			$('p.notice').removeClass('shown');
	});

	$('a.continue:not(.two-columns)').on('click', function(e) {
		if ($("input:radio[name='os10']").is(":checked") && $("input:radio[name='frequency']").is(":checked")) {
		  	$('a.continue').attr('disabled', false);
		  	 	$('.buttongroup').fadeOut('2000', function(){
			        $('.control-group').fadeIn('2000');
			    });
		} else {
			$('a.continue').attr('disabled', true);
			$('p.notice').addClass('shown');
		}
	});

	$('a.continue.two-columns').on('click', function(e) {
		if ($("input:radio[name='os10']").is(":checked") && $("input:radio[name='frequency']").is(":checked")) {
		  	$('a.continue').attr('disabled', false);
		  	 	$('.buttongroup').fadeOut('2000', function(){
			        $('.control-group').fadeIn('2000');
			    });
		} else {
			$('a.continue').attr('disabled', true);
			$('p.notice').addClass('shown');
		}
	});

	$('span.returnto').click(function(e){
	    e.preventDefault();
	    $('.control-group').fadeOut('2000', function(){
	        $('.buttongroup').fadeIn('2000').css('display','block');
	    });
	});

	$('input[name="os3"]').on('change',function(){
		var $addressval = $('[id="os3"]').val();
		$('input[name="address1"]').val($addressval);
	});

	$('input[name="os4"]').on('change',function(){
		var $cityval = $('[id="os4"]').val();
		$('input[name="city"]').val($cityval);
	});

	$('input[name="os5"]').on('change',function(){
		var $stateval = $('[id="os5"]').val().toUpperCase();
		$('input[name="state"]').val($stateval);
	});

	$('input[name="os6"]').on('change',function(){
		var $zipval = $('[id="os6"]').val();
		$('input[name="zip"]').val($zipval);
	});

	//change donate frequency
	$('input[name="frequency"]').on('change', function() {
			var $frequency = $('[name="frequency"]:checked').val();
			$('input[name="cmd"]').attr('value', $frequency);
	});

	$.validator.addMethod("RegCodeRegex", function(value, element) {
	    return this.optional(element) || /^[bB][A-Za-z]{6}[-][A-Za-z][0-9]+$/i.test(value);
	}, "Invalid registration code!");

	$('#paypal_form').validate({

		rules: {
		      
			os1: {
		        required: true
		    },

		    os2: {
		        required: true
		 
		    },
			os3: {
		        required: true

		    },
			
			os4: {
		        required: true
		  
		    },
			os5: {
		        required: true
		  
		    },
			os6: {	
		        required: true
		  
		    },
			
		},


		show: {
		    event: 'focus'
		},
		hide:{
		    event: 'blur'
		},

		messages: {

			 os1: {
			 	required: "Please enter your name",
			 },
			 os2: {
			 	required: "Please enter your email address",
			 },
			 os3: {
			 	required: "Please enter your mailing address",
			 },
			 os4: {
			 	required: "Please enter your city",
			 },
			 os5: {
			 	required: "Please enter your state",
			 },
			 os6: {
			 	required: "Please enter your zip code",
			 },
		},


		errorPlacement: function(error, element) {
			error.insertBefore(element);
		},

		errorContainer: "#error_messages",
		errorLabelContainer: "#error_messages",

	});


		$("body").on("click", "#paypal_form input[name='send-form']", function () {
			if( $('#paypal_form').valid()) {
          amountVal = $('input[name="amount"]').val();
          fullName = $('[id="os1"]').val();
          emailAddress = $('[id="os2"]').val();
          mailingAddress = $('[id="os3"]').val();
          cityVal = $('[id="os4"]').val();
          stateVal = $('[id="os5"]').val().toUpperCase();
          zipVal = $('[id="os6"]').val();
          frequency = $('[name="frequency"]:checked').val();
          // if(frequency == null){
          // 	frequency == 'One Time';
          // }
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
}
		});


});