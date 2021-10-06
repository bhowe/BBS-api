<?php
/**
 * Template Name: Login
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

	<div class="large-6" style="text-align: center;">

		<?php $args = array(
			'id_submit'      => 'button small',
		); ?>

		<?php if( is_user_logged_in() ) {
			printf( __( 'Hello %s,', 'bmighty' ), esc_html( $current_user->user_login ) ) . '</p>';
			echo '<p>You are already logged in</p><a class="button small loggedin" href="'.wp_logout_url().'">Click here to logout</a>';
		} else { ?>
			
		<?php $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
			if ( $login === "failed" ) {
				echo '<div data-alert class="alert-box alert"><p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p><a href="#" class="close">&times;</a></div>';
			} elseif ( $login === "empty" ) {
				//echo '<div data-alert class="alert-box alert"><p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p><a href="#" class="close">&times;</a></div>';
			} elseif ( $login === "false" ) {
				echo '<div data-alert class="alert-box success"><p class="login-msg">You are logged out.</p><a href="#" class="close">&times;</a></div>';
			}

			wp_login_form($args);
			echo '<div class="lost-links">
			<p class="question">Not a user? <a href="'.site_url().'/register">Click Here to Register</a></p>
			<p class="question">Lost Your Password? <a href="'.site_url().'/lost-password">Click Here to Reset</a></p>
			</div>';
		} ?>
	</div>

	<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>

</div>
</main>
<?php get_footer(); ?>