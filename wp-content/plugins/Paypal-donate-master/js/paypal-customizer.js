/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	wp.customize( 'donate_header', function( value ) {
		value.bind( function( newval ) {
			$( '.donate-headline h3.widget-title' ).html( newval );
		} );
	} );

	wp.customize( 'donate_header_color', function( value ) {
		value.bind( function( newval ) {
			$( '.donate-headline h3.widget-title' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'donate_email', function( value ) {
		value.bind( function( newval ) {
			$( '.donate-form input[name="business"]' ).val( newval );
		} );
	} );

	wp.customize( 'donate_label_color', function( value ) {
		value.bind( function( newval ) {
			$( '.donate-form .control-group.two-columns .control-group-wrap label, .donate-form .control-group.two-columns .control-group-wrap input[type="text"]::placeholder, .donate-form .control-group.two-columns .control-group-wrap input[type="email"]::placeholder' ).css( 'color', newval );
			$('.donate-form .control-group.two-columns .control-group-wrap input[type="text"], .donate-form .control-group.two-columns .control-group-wrap input[type="email"]').css('border-color', newval );
		} );
	} );

	// wp.customize( 'amount1', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount1' ).html( 
	// 			'<input type="radio" name="os10" id="amount1" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'block_text1', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex.two-columns .textgroup.block1text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'amount2', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount2' ).html( 
	// 			'<input type="radio" name="os10" id="amount2" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'block_text2', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block2text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'amount3', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount3' ).html( 
	// 			'<input type="radio" name="os10" id="amount3" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'block_text3', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block3text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'block_text4', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block4text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'block_text5', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block5text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'block_text6', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block6text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'block_text7', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex .textgroup.block7text p' ).text( newval );
	// 	} );
	// } );

	// wp.customize( 'amount4', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount4' ).html( 
	// 			'<input type="radio" name="os10" id="amount4" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'amount5', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount5' ).html( 
	// 			'<input type="radio" name="os10" id="amount5" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'amount6', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount7' ).html( 
	// 			'<input type="radio" name="os10" id="amount6" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );

	// wp.customize( 'amount7', function( value ) {
	// 	value.bind( function( newval ) {
	// 		$( '.donate-form .buttongroup .buttons-flex label#lamount8' ).html( 
	// 			'<input type="radio" name="os10" id="amount7" value="'+newval+'.00">' +
	// 			newval + '.00' );
	// 	} );
	// } );
	
} )( jQuery );