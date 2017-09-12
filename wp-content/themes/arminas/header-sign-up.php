<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title><?php bloginfo( 'name' ); ?></title>
      <!-- Bootstrap -->
      <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo get_template_directory_uri(); ?>/assets/css/menu.css" rel="stylesheet">
      <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css">
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <?php wp_head(); ?>
   </head>
   <?php $body_class = (is_page('sign-up') || is_page('login'))? 'login-page' : 'all-page' ; ?>
   <body class="<?php echo $body_class; ?>">
   <header class="navbar navbar-default ">
      <div class="container">
      <div class="row">
         <div class="col-md-6 col-xs-3">
            <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('HeaderLogo'); ?>" alt="img"></a></div>
         </div>
         <div class="col-md-6 col-xs-8 log-top">
         <?php if( is_page( "login" ) ): ?>
         Don't have an account? <a href="<?php echo site_url(); ?>/sign-up">SIGN UP</a>
         <?php else : ?>
         Already have account? <a href="<?php echo site_url(); ?>/login">Login</a>
         <?php endif; ?>
         </div>
      </div>
      </div>
</header>