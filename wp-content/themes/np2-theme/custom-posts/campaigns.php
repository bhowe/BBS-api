<?php 
//////// Create campaign Custom Post
function my_campaign_custom_post() {
  $labels = array(
    'name'               => _x( 'Campaigns', 'post type general name' ),
    'singular_name'      => _x( 'Campaign', 'post type singular name' ),
    'add_new'            => _x( 'Add New Campaign', 'campaign' ),
    'add_new_item'       => __( 'Add New Campaign' ),
    'edit_item'          => __( 'Edit Campaign' ),
    'new_item'           => __( 'New Campaign' ),
    'all_items'          => __( 'All Campaigns' ),
    'view_item'          => __( 'View Campaigns' ),
    'search_items'       => __( 'Search Campaigns' ),
    'not_found'          => __( 'No Campaign found' ),
    'not_found_in_trash' => __( 'No Campaign found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Campaigns'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Menu area to add Campaigns',
    'public'        => true,
    'menu_position' => 22,
	'menu_icon'		=> 'dashicons-analytics',
    'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
    'has_archive'   => false,
    'show_in_rest' => true,
  );
  register_post_type( 'campaign', $args ); 
}
add_action( 'init', 'my_campaign_custom_post' );

function my_updated_messages_campaign( $messages ) {
  global $post, $post_ID;
  $messages['campaign'] = array(
    0 => '', 
    1 => sprintf( __('Campaign updated. <a href="%s">View Campaign</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Campaign updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Campaign restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Campaign published. <a href="%s">View Campaign</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Campaign saved.'),
    8 => sprintf( __('Campaign submitted. <a target="_blank" href="%s">Preview Campaign</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Campaign scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Campaign</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Campaign draft updated. <a target="_blank" href="%s">Preview Campaign</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_officers' );