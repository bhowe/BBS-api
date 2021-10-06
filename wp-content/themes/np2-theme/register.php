<?php
/**
 * Template Name: Register
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
				<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
					<div class="username">
						<input type="text" placeholder="Username" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
					</div>
					<div class="password">
						<input type="text" placeholder="Your Email Address" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
					</div>
					<div class="login_fields">
						<?php do_action('register_form'); ?>
						<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit" tabindex="103" />
						<?php $register = $_GET['register']; if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>
						<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?register=true" />
						<input type="hidden" name="user-cookie" value="1" />
					</div>
				</form>
				<div class="lost-links">
					<p class="question">Already a user? <a href="<?php echo site_url(); ?>/login">Click Here to Login</a></p>
					<p class="question">Lost Your Password? <a href="<?php echo site_url(); ?>/lost-password">Click Here to Reset</a></p>
				</div>
			<?php } ?>
		</div>

		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		
	</div>
</main>

<?php get_footer(); ?>