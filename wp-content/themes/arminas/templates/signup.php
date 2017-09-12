<?php
/*Template Name: Sign Up*/
global $wpdb;
get_header("sign-up");

if( $_POST['register'] == 'register' ):
  $username = $wpdb->escape(trim($_POST['username']));
  $password = $wpdb->escape(trim($_POST['password']));
  $email = $wpdb->escape(trim($_POST['email']));

  $user_id = wp_insert_user(
    array(
      'user_login'      =>  $username,
      'display_name'    =>  $username,
      'user_email'      =>  $email,
      'user_pass'       =>  $password,   
      )
    );
endif;
?>
<div class="half-left pink" style="background: url(<?php echo the_post_thumbnail_url(); ?>) no-repeat left; height: 100%; background-size: cover;">
        <!-- <img src="images/login-bg.jpg" alt="img"> -->
      </div>
      <div class="half orange">
         <div class="half-main">
            <h2>Create account</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                  <label>E-MAIL ADDRESS</label>
                  <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                  <label>RE-ENTER PASSWORD</label>
                  <input class="form-control" type="password" name="re-password">
                </div>
                <div class="form-group align-center">
                    <input type="hidden" name="register" id="register" value="register">
                    <input class="btn btn-submit" type="submit" value="Sign Up">
                </div> 
                <div class="form-group">
                <p>
                By creating an account, you agree to United Thermos's <a href="#">Conditions of Use</a> and 
                <a href="#">Privacy Notice</a>.
                </p>
                </div> 
            </form>
         </div>
      </div>
      <div class="clearfix"></div>
<?php get_footer(); ?>