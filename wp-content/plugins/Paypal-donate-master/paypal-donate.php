<?php
/*
Plugin Name: Paypal Donations
Plugin URI: 
Description: Set various pricing options and collect donations via paypal
Author: James Dvorak
Version: 1.0.10
Author URI: http://www.bmighty2.com
*/

// Make sure we don't expose any info if called directly
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*Some Set-up*/
define('DONATION_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define ("DONATION_VERSION", "1.0.10");
define( 'DONATION__MINIMUM_WP_VERSION', '5.0' );

register_activation_hook( __FILE__, 'plugin_activation' );
register_deactivation_hook( __FILE__, 'plugin_deactivation' );

/*Files to Include*/
require_once('inc/donate-shortcode.php');
require_once('inc/paypal-menu-page.php');
require_once('inc/paypal-customizer.php');
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

function plugin_activation() {
	global $wpdb;
	$table_name = $wpdb->prefix . "donation_list";
	$my_products_db_version = '1.0.1';
	$charset_collate = $wpdb->get_charset_collate();

	    $sql = "CREATE TABLE ".$table_name." (
	            	ID mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  		full_name tinytext NOT NULL,
			  		email_address text NOT NULL,
			  		mailing_address text NOT NULL,
			  		mailing_city text NOT NULL,
			  		mailing_state text NOT NULL,
			  		mailing_zip text NOT NULL,
			  		amount_donated text NOT NULL,
			  		date_submitted date,
			  		frequency text NOT NULL
	    ) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

	    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	    dbDelta( $sql );
	    add_option( 'my_db_version', $my_products_db_version );
}

function plugin_deactivation() {
	// if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
	//     global $wpdb;
	//     $table_name = $wpdb->prefix . "donation_list";
	// 	$my_products_db_version = '1.0.0';
	//     $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
	//     delete_option("my_db_version", $my_products_db_version);
}


function add_plugin_menu(){
	add_menu_page( 'Paypal Donation Form', 'Paypal Form', 'manage_options', 'paypal-donation-form', 'paypal_form_page', 'dashicons-analytics', 66 );
	add_submenu_page( 'paypal-donation-form', 'Donors List', 'Donor List', 'manage_options', 'paypal_donation_list', 'paypal_donation_sub_page' ); 
}
add_action('admin_menu', 'add_plugin_menu');

function donate_load_scripts() {
	wp_register_script( 'validate-cdn', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array('jquery'),'',true  );
	wp_enqueue_script( 'validate-cdn' );
	wp_register_script( 'validate-js', plugin_dir_url( __FILE__ ) . 'js/validation.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'validate-js' );
	// wp_enqueue_script(
	// 	'paypal-ajax',
	// 	plugin_dir_url( __FILE__ ) . 'js/paypal-ajax-form-save.js',
	// 	array('jquery')
	// );
	wp_localize_script( 'validate-js', 'save_form_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
	wp_enqueue_style( 'donate-front-style', plugin_dir_url( __FILE__ ) . 'css/paypal-frontend-style.css' );
	wp_enqueue_style( 'donate-front-custom-style', plugin_dir_url( __FILE__ ) . 'css/paypal-custom-style.css' );
}
add_action( 'wp_enqueue_scripts', 'donate_load_scripts');

/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function paypal_customizer_live_preview()
{
	wp_enqueue_script( 
		  'paypal-customizer',			//Give the script an ID
		  plugin_dir_url( __FILE__ ) .'/js/paypal-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'paypal_customizer_live_preview' );

function donate_admin_scripts($hook) {

	wp_enqueue_style( 'donate-style', plugin_dir_url( __FILE__ ) . 'css/paypal-style.css' );

	if($hook == 'paypal-form_page_paypal_donation_list') {
		wp_enqueue_style( 'tablesort-style', plugin_dir_url( __FILE__ ) . 'tablesorter/css/theme.default.min.css' );

		wp_enqueue_style( 'tablesort-pagerstyle', plugin_dir_url( __FILE__ ) . 'tablesorter/css/jquery.tablesorter.pager.min.css' );

		wp_register_script('tableSort', plugin_dir_url( __FILE__ ) . 'tablesorter/js/jquery.tablesorter.min.js', array('jquery'), '', true);
		wp_enqueue_script('tableSort');

		wp_register_script('tableSort-widgets', plugin_dir_url( __FILE__ ) . 'tablesorter/js/jquery.tablesorter.widgets.min.js', array('jquery'), '', true);
		wp_enqueue_script('tableSort-widgets');

		wp_register_script('tableSort-pager-js', plugin_dir_url( __FILE__ ) . 'tablesorter/js/widgets/widget-pager.min.js', array('jquery'), '', true);
		wp_enqueue_script('tableSort-pager-js');

		wp_register_script('paypal-donation-backend-js', plugin_dir_url( __FILE__ ) . 'js/donation-backend.js', array('jquery'), '', true);
		wp_enqueue_script('paypal-donation-backend-js');
	}
}
add_action('admin_enqueue_scripts', 'donate_admin_scripts');

function save_form_to_database() {
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $mailingAddress = $_POST['mailingAddress'];
    $cityVal = $_POST['cityVal'];
    $stateVal = $_POST['stateVal'];
    $zipVal = $_POST['zipVal'];
    $amountVal = $_POST['amountVal'];
    $dateVal = date('Y-m-d');
    $frequency = $_POST['frequency'];

    echo json_encode(array($fullName, $emailAddress, $mailingAddress, $cityVal, $stateVal, $zipVal, $amountVal, $dateVal));

	global $wpdb;

	$table_name = $wpdb->prefix . "donation_list";

	$wpdb->insert( $table_name, array(
	    'full_name' => $fullName,
	    'email_address' => $emailAddress,
	    'mailing_address' => $mailingAddress,
	    'mailing_city' => $cityVal,
	    'mailing_state' => $stateVal,
	    'mailing_zip' => $zipVal,
	    'date_submitted' => $dateVal,
	    'amount_donated' => $amountVal,
	    'frequency' => $frequency,
	) );

}

add_action( 'wp_ajax_nopriv_save_form_to_database', 'save_form_to_database');
add_action( 'wp_ajax_save_form_to_database', 'save_form_to_database');

/********* Initialize update checker *******/
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/bmighty2/Paypal-donate',
	__FILE__,
	'paypal-donate'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('18960f6fe790a1e9daec1bc585700b12799c5830');

function custom_blocks_init() {
	require_once 'blocks/donations-block.php';
}
add_action( 'plugins_loaded', 'custom_blocks_init' );