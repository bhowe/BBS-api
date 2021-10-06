<?php

require_once( ABSPATH . 'wp-includes/pluggable.php' );
require_once('exporter.php');

if(isset($_POST['paypal_client_id'])) {
	update_option('paypal_client_id',$_POST['paypal_client_id']);
}

if(isset($_POST['paypal_secret_key'])) {
	update_option('paypal_secret_key',$_POST['paypal_secret_key']);
}

if(isset($_POST['paypal_environment'])) {
	update_option('paypal_environment',$_POST['paypal_environment']);
}

function paypal_form_page() { ?>

<div class="export">

	<h1>Paypal Donations</h1>

	<p>Export a list of visitors who have donated through the donation form.</p>

	<a href="<?php echo admin_url( 'admin.php?page=paypal-donation-form' ) ?>&action=download_csv&_wpnonce=<?php echo wp_create_nonce( 'download_csv' )?>" class="export-button"><?php _e('Export Donations To A CSV','paypal-donation-form');?></a>

	<h3>Connect to Paypal API</h3>
	<p>In order to use the Paypal API, you must have a business account and get a Client ID and Secret Key for the API.<p>
	<p>To get these credentials follow these steps</p>
		<ol>
			<li><a href="https://www.paypal.com/signin?returnUri=https%3A%2F%2Fdeveloper.paypal.com%2Fdeveloper%2Fapplications" target="_blank">Log in to the Developer Dashboard</a> with your PayPal account.</li>
			<li>Under the DASHBOARD menu, select My Apps & Credentials.</li>
			<li>Choose Live Mode to use on your live donation form or Sandbox Mode to use during testing</li>
			<li>Under the Live App Credentials section, copy the Client ID and Secret Key and save them in the corrosponding fields here;</li>
				<form method="post" action="">
				    <?php /*settings_fields( 'paypal_api_key_fields_group' ); ?>
				    <?php do_settings_sections( 'paypal_api_key_fields_group' );*/ ?>
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Paypal Client ID</th>
				        <td><input type="text" name="paypal_client_id" value="<?php echo esc_attr( get_option('paypal_client_id') ); ?>" /></td>
				        </tr>
				         
				        <tr valign="top">
				        <th scope="row">Paypal Secret Key</th>
				        <td><input type="password" name="paypal_secret_key" value="<?php echo esc_attr( get_option('paypal_secret_key') ); ?>" /></td>
				        </tr>

				        <tr valign="top">
				        <th scope="row">Paypal Environment</th>
				        <td><?php $options = get_option('paypal_environment'); ?>
				        	<select name='paypal_environment'>
						        <option value='1' 
						        	<?php selected( $options['paypal_environment'], 1 ); ?>>Live</option>
						        <option value='2' <?php selected( $options['paypal_environment'], 2 ); ?>>Sandbox</option>
						    </select>
				        </td>
				        </tr>
				    </table>
				    
				    <?php submit_button(); ?>

				</form>
		</ol>

	<h3>Step 1</h3>
	<p>To add the form to any page, simply paste the shortcode <input class="shortcode" value="[donate_form]" onclick="this.select()" /> into the Gutenberg Shortcode Block on the page you want to display it.</p>

	<h3>Step 2</h3>
	<p>While logged in and on the front side of the site, click the 'Customize' link in the admin bar at the top of the page.</p>
	<p>Open the 'Donate Form Settings' tab.</p>
	<p>Enter your thank page url you want people being redirected to after completing the payment.</p>
	<p>Change other options as you need. You can edit the form's title, set each default amount, and change the background colors.</p>

</div>

<?php }

function paypal_donation_sub_page() {

global $wpdb;
$table_name = $wpdb->prefix . "donation_list";
$customers = $wpdb->get_results("SELECT * FROM $table_name");
?>

<div class="export">

<h1>Donor List</h1>

<a href="<?php echo admin_url( 'admin.php?page=paypal-donation-form' ) ?>&action=download_csv&_wpnonce=<?php echo wp_create_nonce( 'download_csv' )?>" class="export-button"><?php _e('Export Donations To A CSV','paypal-donation-form');?></a>

<table class="table table-hover tablesorter" id="donation-list">
	<thead>
		<tr>
			<th>Amount Donated</th>
			<th>Frequency</th>
			<th>Full Name</th>
			<th>Email Address</th>
			<th>Mailing Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Date</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($customers as $customer){ 
			$dateString = strtotime($customer->date_submitted);
			$newDate = $dateString ? date("m-d-Y", $dateString) : '';
			$frequency = $customer->frequency;
				if($frequency == 'One Time') {
					$donation_type = 'One Time';
				} else {
					$donation_type = 'Recurring';
				}
		?>
		<tr>
		 <td><?php echo $customer->amount_donated; ?></td>
		 <td><?php echo $donation_type; ?></td>
		 <td><?php echo $customer->full_name; ?></td>
		 <td><?php echo $customer->email_address; ?></td>
		 <td><?php echo $customer->mailing_address; ?></td>
		 <td><?php echo $customer->mailing_city; ?></td>
		 <td><?php echo $customer->mailing_state; ?></td>
		 <td><?php echo $customer->mailing_zip; ?></td>
		 <td><?php echo $newDate; ?></td>
		</tr>

		<?php } ?>

	</tbody>

</table>

<div id="pager" class="pager tablesorter-pager">
  <form>
    <img src="<?php echo plugins_url( ) ?>/paypal-donate/tablesorter/images/first.png" class="first"/>
    <img src="<?php echo plugins_url( ) ?>/paypal-donate/tablesorter/images/prev.png" class="prev"/>
    <!-- the "pagedisplay" can be any element, including an input -->
    <span class="pagedisplay" data-pager-output-filtered="{startRow:input} &ndash; {endRow} / {filteredRows} of {totalRows} total rows"></span>
    <img src="<?php echo plugins_url( ) ?>/paypal-donate/tablesorter/images/next.png" class="next"/>
    <img src="<?php echo plugins_url( ) ?>/paypal-donate/tablesorter/images/last.png" class="last"/>
    <select class="pagesize">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="30">30</option>
      <option value="40">40</option>
      <option value="all">All Rows</option>
    </select>
  </form>
</div>
</div>

<?php }

