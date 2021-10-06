<?php
/**
 * Registers blocks and ancillary settings.
 *
 * @package Huntington Hospital Blocks
 */

/**
 * Register blocks.
 */
add_action( 'init', 'block_acf_init' );
function block_acf_init() {

	$paypal = array(
		'name'            => 'paypal-block',
		'title'           => __( 'Paypal' ),
		'description'     => __( 'Paypal Form.' ),
		'category'        => 'common',
		'icon'            => 'layout',
		'keywords'        => array( 'paypal', 'form' ),
		'post_types'      => array( 'post', 'page' ),
		'mode'            => 'preview',
		'align'           => 'full',
		'render_template' => plugin_dir_path( __FILE__ ) . 'views/block-form.php',
		'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'assets/css/block.css',
	);

	$blocks = array(
		$paypal,
	);

	foreach ( $blocks as $block ) {
		register_block_type( $block );
	}
}
