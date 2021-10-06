<?php

require_once( ABSPATH . 'wp-includes/pluggable.php' );
require_once('exporter.php');

function paypal_form_page() { ?>

<div class="export">

	<h1>Paypal Donations</h1>

	<p>Export a list of visitors who have donated through the donation form.</p>

	<a href="<?php echo admin_url( 'admin.php?page=paypal-donation-form' ) ?>&action=download_csv&_wpnonce=<?php echo wp_create_nonce( 'download_csv' )?>" class="export-button"><?php _e('Export Donations To A CSV','paypal-donation-form');?></a>

	<h3>Step 1</h3>
	<p>To add the form to any page, simply paste the shortcode <input class="shortcode" value="[donate_form]" onclick="this.select()" /> into the Gutenberg Shortcode Block on the page you want to display it.</p>

	<h3>Step 2</h3>
	<p>While logged in and on the front side of the site, click the 'Customize' link in the admin bar at the top of the page.</p>
	<p>Open the 'Donate Form Settings' tab.</p>
	<p>Enter your Paypal Email address into the Paypal Address field and enter your thank page url you want people being redirected to after completing the payment.</p>
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
				if($frequency == '_donations') {
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

