<?php

// Add action hook only if action=download_csv
if ( isset($_GET['action'] ) && $_GET['action'] == 'download_csv' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'csv_export');
}

function csv_export() {

    // Check for current user privileges 
    if( !current_user_can( 'manage_options' ) ){ return false; }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'download_csv' ) ) {
        die( 'Security check error' );
    }
    
    ob_start();

    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'donations-' . $domain . '-' . time() . '.csv';
    
    $header_row = array(
        'Donation Amount',
        'Frequency',
        'Name',
        'Email',
        'Street Address',
        'City',
        'State',
        'Zip',
    );
    $data_rows = array();
    global $wpdb;
    $sql = 'SELECT * FROM ' . $wpdb->prefix.'donation_list';
    $donations = $wpdb->get_results( $sql, 'ARRAY_A' );
    foreach ( $donations as $donate) {
        $frequency = $donate['frequency'];
                if($frequency == '_donations') {
                    $donation_type = 'One Time';
                } else {
                    $donation_type = 'Recurring';
                }
        $row = array(
            $donate['amount_donated'],
            $donation_type,
            $donate['full_name'],
            $donate['email_address'],
            $donate['mailing_address'],
            $donate['mailing_city'],
            $donate['mailing_state'],
            $donate['mailing_zip'],
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );
    
    ob_end_flush();
    
    die();
}