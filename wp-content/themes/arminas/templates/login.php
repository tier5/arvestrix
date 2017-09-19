<?php
/*Template Name: Login*/

if(is_user_logged_in()):
    wp_redirect(home_url());
    exit;
endif;

get_header("sign-up");
?>
<div class="half-left pink" style="background: url(<?php echo the_post_thumbnail_url(); ?>) no-repeat left; height: 100%; background-size: cover;">
	<!-- <img src="images/login-bg.jpg" alt="img"> -->
</div>
<div class="half orange">
	<div class="half-main">
		<?php
		$args = array(
		'echo'           => true,
		'remember'       => false,
		'redirect'       => home_url(),
		'form_id'        => 'loginform',
		'id_username'    => 'user_login',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'label_username' => __( 'E-MAIL ADDRESS' ),
		'label_password' => __( 'Password' ),
		'label_remember' => __( 'Keep me signed in.' ),
		'label_log_in'   => __( 'Sign In' ),
		'value_username' => '',
		'value_remember' => false
		); 
		wp_login_form($args); 
		?>
	</div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>