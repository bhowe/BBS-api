<?php
/*
 * MightMail Subscribe Widget
 *
 *  Takes the code from create send 
 *  and creates a widgetized form 
 *
 * 
 * 
 */
class ms_mailing_list extends WP_Widget {  

  function ms_mailing_list() {  
      parent::__construct(false, 'CM Subscribe Form');  
  }  
  function __construct() {
    parent::__construct(
      'cm_subscribe_form', // Base ID
      esc_html__( 'CM Subscribe Form', 'bmighty2' ), // Name
      array( 'description' => esc_html__( 'Widget for collection newsletter subscribers.', 'bmighty2' ), ) // Args
    );
  }

  function form($instance) {  
    $heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';
    $cm_id = ! empty( $instance['cm_id'] ) ? $instance['cm_id'] : '';
    $subscribe_text = ! empty( $instance['subscribe_text'] ) ? $instance['subscribe_text'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('cm_id'); ?>"><?php _e('Form Script Tag String:', 'bmighty2'); ?>
      <input class="widefat" id="<?php echo $this->get_field_id('cm_id'); ?>" name="<?php echo $this->get_field_name('cm_id'); ?>" type="text" value="<?php echo $cm_id; ?>" />
    </label>
  </p>  
 <p>
    <label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text:', 'bmighty2'); ?>
      <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Header Text:', 'bmighty2'); ?>
      <input class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="text" value="<?php echo $heading; ?>" />
    </label>
  </p>  
    <p>
      <label for="<?php echo $this->get_field_id('subscribe_text'); ?>"><?php _e('Mighty Mail Copy:', 'bmighty2'); ?></label> 
      <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('subscribe_text'); ?>" name="<?php echo $this->get_field_name('subscribe_text'); ?>"><?php echo $subscribe_text; ?></textarea>
    </p>


  <?php  
  }  

  function update($new_instance, $old_instance) {  
    return $new_instance;  
  }  

  function widget($args, $instance) {  
    $args['cm_id'] = $instance['cm_id'];
    $args['subscribe_text'] = $instance['subscribe_text'];
    $args['heading'] = $instance['heading'];
    $args['button_text'] = $instance['button_text'];
    echo $args['before_widget'];
    echo $args['before_title'] . $args['heading'] . $args['after_title'];
    ?>
        <div id="subscribe" class="clearfix">
            <?php if(!empty($args['subscribe_text'])) { ?><p><?php echo $args['subscribe_text']; ?></p><?php } ?>
            <form id="subForm" class="js-cm-form" action="https://www.createsend.com/t/subscribeerror?description=" method="post" data-id=<?php echo $args['cm_id']; ?> >
            
            <label for="fieldEmail">Enter Your Email</label>
            <input id="fieldEmail" name="email" placeholder="Email" type="email" class="js-cm-email-input"
            required />
              
            <button class="js-cm-submit-button small button" type="submit"><?php echo $args['button_text']; ?></button>
            
            </form>
            <script type="text/javascript" src="https://js.createsend1.com/javascript/copypastesubscribeformlogic.js"></script>
        </div>

    <?php
    echo $args['after_widget'];
  }  
}  

register_widget('ms_mailing_list');  
