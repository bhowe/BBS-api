/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the options in real time...
	wp.customize( 'header_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'nav.off-canvas .menu-header ul li a, .off-canvas .widget_bm_connect_widget h3.widget-title, nav.off-canvas .close-button, nav.top-bar ul.menu li a' ).css('color', newval );
		} );
	} );

	wp.customize( 'header_icon_color', function( value ) {
		value.bind( function( newval ) {
			$( '.off-canvas .widget_bm_connect_widget a.connect-icon, .top-bar .widget_bm_connect_widget a.connect-icon' ).css('color', newval );
		} );
	} );

	wp.customize( 'header_nav_background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'nav.off-canvas, .sticky-container .sticky.is-anchored, .sticky-container .sticky.is-stuck' ).css('background', newval );
		} );
	} );

	wp.customize( 'footer_subscribe_header_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) .widget_cm_subscribe_form h3.widget-title' ).css('color', newval );
		} );
	} );

	wp.customize( 'footer_subscribe_button_background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm input[type="submit"], footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm .button.small' ).css('background', newval );
		} );
	} );

	wp.customize( 'footer_subscribe_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm input[type="submit"], footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm .button.small' ).css('color', newval );
		} );
	} );

	wp.customize( 'footer_border_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer)' ).css('border-top-color', newval );
		} );
	} );

	wp.customize( 'top_footer_background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer)' ).css('background', newval );
		} );
	} );

	wp.customize( 'top_footer_header_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title' ).css({'color': newval, 'border-color': newval} );
		} );
	} );

	wp.customize( 'top_footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) p, footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) li' ).css('color', newval );
		} );
	} );

	wp.customize( 'top_footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a' ).css('color', newval );
		} );
	} );

	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-bottom-widget-wrapper' ).css('background', newval );
		} );
	} );

	wp.customize( 'footer_widget_title_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title' ).css('color', newval );
		} );
	} );

	wp.customize( 'bottom_footer_header_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title' ).css('color', newval );
		} );
	} );

	wp.customize( 'bottom_footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) p, footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) li, footer:not(.entry-footer) #footer-bottom-widget-wrapper p' ).css('color', newval );
		} );
	} );

	wp.customize( 'bottom_footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a' ).css('color', newval );
		} );
	} );

	wp.customize( 'footer_icon_color', function( value ) {
		value.bind( function( newval ) {
			$( 'footer:not(.entry-footer) #footer-bottom-widget-wrapper a.connect-icon' ).css('color', newval );
		} );
	} );
	
} )( jQuery );