<?php
/*
 * MightySites Connect Widget
 *
 * 
 *
 *
 * 
 */
class bm_connect_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'bm_connect_widget', // Base ID
			esc_html__( 'Social Icons Widget', 'bmighty2' ), // Name
			array( 
			'description' => esc_html__( 'Widget for displaying social icons, email, phone links.', 'bmighty2' ),
			'customize_selective_refresh' => true,
			) // Args
		);
	}

	function form($instance) {

		$heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
		$youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
		$vimeo = ! empty( $instance['vimeo'] ) ? $instance['vimeo'] : '';
		$flickr = ! empty( $instance['flickr'] ) ? $instance['flickr'] : '';
		$linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$yelp = ! empty( $instance['yelp'] ) ? $instance['yelp'] : '';
		$instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
		$pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
		$rss = ! empty( $instance['rss'] ) ? $instance['rss'] : '';
		$email = ! empty( $instance['email'] ) ? $instance['email'] : '';
		$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';

?>
	<p>
    <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Title:', 'bmighty2'); ?>
      <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>" />
    </label>
  </p>  
	
    <p>Enter the full url in the input boxes below, with 'http://' included.</p>
    <p>
      <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
      </label>
    </p>  
    <p>
      <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $vimeo; ?>" />
      </label>
    </p>  
    <p>
      <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $flickr; ?>" />
      </label>
    </p>  
    <p>
      <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
      </label>
    </p>
	<p>
      <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:', 'bmighty2'); ?> 
        	<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />

      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:', 'bmighty2'); ?> 
        	<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />

      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Rss:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
      </label>
    </p>
	<p>
      <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
      </label>
    </p>
	<p>
      <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'bmighty2'); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
      </label>
    </p>  

<?php
	}

	function update($new_instance, $old_instance) {  
		$instance = array();
		$instance['heading'] = sanitize_text_field( $new_instance['heading'] );
		$instance['facebook'] = sanitize_text_field( $new_instance['facebook'] );
		$instance['twitter'] = sanitize_text_field( $new_instance['twitter'] );
		$instance['youtube'] = sanitize_text_field( $new_instance['youtube'] );
		$instance['vimeo'] = sanitize_text_field( $new_instance['vimeo'] );
		$instance['flickr'] = sanitize_text_field( $new_instance['flickr'] );
		$instance['linkedin'] = sanitize_text_field( $new_instance['linkedin'] );
		$instance['instagram'] = sanitize_text_field( $new_instance['instagram'] );
		$instance['pinterest'] = sanitize_text_field( $new_instance['pinterest'] );
		$instance['rss'] = sanitize_text_field( $new_instance['rss'] );
		$instance['email'] = sanitize_text_field( $new_instance['email'] );
		$instance['phone'] = sanitize_text_field( $new_instance['phone'] );

		return $instance;
	}  

	
	public function widget( $args, $instance ) {

		$args['facebook'] = $instance['facebook'];
		$args['twitter'] = $instance['twitter'];
		$args['youtube'] = $instance['youtube'];
		$args['vimeo'] = $instance['vimeo'];
		$args['flickr'] = $instance['flickr'];
		$args['linkedin'] = $instance['linkedin'];
		$args['instagram'] = $instance['instagram'];
		$args['pinterest'] = $instance['pinterest'];
		$args['rss'] = $instance['rss'];
		$args['email'] = $instance['email'];
		$args['phone'] = $instance['phone'];
		$args['heading'] = $instance['heading'];

		echo $args['before_widget'];
		
		if ( ! empty( $instance['heading'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['heading'] ) . $args['after_title'];
		}

		?>

		<div class="connect-widget-render">
			<div class="grid-x">
			<?php if(!empty($instance['facebook'])) { ?>
				<a href="<?php echo $args['facebook']; ?>" aria-label="click to visit our facebook" target="_blank" class="connect-icon"><i class="fab fa-facebook-f"></i></a>
			<?php } ?>
			<?php if(!empty($instance['twitter'])) { ?>
				<a href="<?php echo $args['twitter']; ?>" aria-label="click to visit our twitter" target="_blank" class="connect-icon"><i class="fab fa-twitter"></i></a>
			<?php } ?>
			<?php if(!empty($instance['youtube'])) { ?>
				<a href="<?php echo $args['youtube']; ?>" aria-label="click to visit our youtube" target="_blank" class="connect-icon"><i class="fab fa-youtube"></i></a>
			<?php } ?>
			<?php if(!empty($instance['vimeo'])) { ?>
				<a href="<?php echo $args['vimeo']; ?>" aria-label="click to visit our vimeo" target="_blank" class="connect-icon"><i class="fab fa-vimeo"></i></a>
			<?php } ?>
			<?php if(!empty($instance['flickr'])) { ?>
				<a href="<?php echo $args['flickr']; ?>" aria-label="click to visit our flickr" target="_blank" class="connect-icon"><i class="fab fa-flickr"></i></a>
			<?php } ?>
			<?php if(!empty($instance['linkedin'])) { ?>
				<a href="<?php echo $args['linkedin']; ?>" aria-label="click to visit our linkedin" target="_blank" class="connect-icon"><i class="fab fa-linkedin-in"></i></a>
			<?php } ?>
			<?php if(!empty($instance['instagram'])) { ?>
				<a href="<?php echo $args['instagram']; ?>" aria-label="click to visit our instagram" target="_blank" class="connect-icon"><i class="fab fa-instagram"></i></a>
			<?php } ?>
			<?php if(!empty($instance['pinterest'])) { ?>
				<a href="<?php echo $args['pinterest']; ?>" aria-label="click to visit our pinterest" target="_blank" class="connect-icon"><i class="fab fa-pinterest"></i></a>
			<?php } ?>
			<?php if(!empty($instance['rss'])) { ?>
				<a href="<?php echo $args['rss']; ?>" aria-label="click to visit our rss feed" target="_blank" class="connect-icon"><i class="fas fa-rss"></i></a>
			<?php } ?>
			</div>
			<?php if(!empty($instance['email'])) { ?>
				<?php echo do_shortcode('[email]'. $args['email'] .'[/email]'); ?>
			<?php } ?>
			<?php if(!empty($instance['phone'])) { ?>
				<p><?php echo $args['phone']; ?></p>
			<?php } ?>
		</div>

		<?php
		
		echo $args['after_widget'];
	}
}

// register Foo_Widget widget
function register_bm_connect_widget() {
    register_widget( 'bm_connect_widget' );
}
add_action( 'widgets_init', 'register_bm_connect_widget' );