<?php
/**
 * Template Name: Lost Password
 *
 * @package WordPress
 */

get_header(); ?>

<main id="primary" class="site-main grid-container">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="grid-x align-center">

		<?php
		while ( have_posts() ) : the_post();

			the_content();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		
		
		<div class="large-6" style="text-align: center;">
			<?php $args = array(
				'id_submit'      => 'button small',
			); ?>
			
			<?php if( is_user_logged_in() ) {
				printf( __( 'Hello %s,', 'bmighty' ), esc_html( $current_user->user_login ) ) . '</p>';
				echo '<p>You are already logged in</p><a class="button small loggedin" href="'.wp_logout_url().'">Click here to logout</a>';
			} else { ?>
				        
				    <h3 style="margin:0 0 2rem;"><?php _e( 'Forgot Your Password?', 'personalize-login' ); ?></h3>
				 
				    <p>
				        <?php
				            _e(
				                "Enter your email address and we'll send you a link you can use to pick a new password.",
				                'personalize_login'
				            );
				        ?>
				    </p>
				 
				    <form method="post" id="lostpasswordform" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
						<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
						
							<?php do_action('login_form', 'resetpass'); ?>
							<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
				
					</form>
				
					<div class="lost-links">
						<p class="question">Already a user? <a href="<?php echo site_url(); ?>/login">Click Here to Login</a></p>
						<p class="question">Not a user? <a href="<?php echo site_url(); ?>/register">Click Here to Register</a></p>
					</div>
			<?php } ?>
		</div>

		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		
	</div>
</main>

<?php get_footer(); ?>