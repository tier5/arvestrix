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
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery-ui.css">
      <link href="<?php echo get_template_directory_uri(); ?>/assets/css/menu.css" rel="stylesheet">
      <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css">
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
      <?php wp_head(); ?>
   </head>
   <?php $body_class = (is_page('sign-up') || is_page('login'))? 'login-page' : 'all-page' ; ?>
   <body class="<?php echo $body_class; ?>">
   <div id="wrapper">
      <div class="overlay"></div>
      <header class="navbar navbar-default <?php if(is_front_page()): echo 'navbar-fixed-top'; endif; ?>">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-xs-3">
                  <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('HeaderLogo'); ?>" alt="img"></a></div>
               </div>
               <div class="col-md-6 col-xs-9 relative panel-menu">
                  <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
                  <span class="hamb-top"></span>
                  <span class="hamb-middle"></span>
                  <span class="hamb-bottom"></span>
                  </button>
                  <div class="cart-menu">
                  <?php
                  global $woocommerce;
                  $cart_url = $woocommerce->cart->get_cart_url();
                  $cart_contents_count = $woocommerce->cart->cart_contents_count;
                  ?>
                  <a href="<?php echo $cart_url; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a><span class="cart-count"><?php echo $cart_contents_count;?></span>
                  </div> 
                  <div class="log-sign">
                     <ul>
                     <?php if( is_user_logged_in() ) { ?>
                     <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
                     <?php } else { ?>
                     <li><a href="<?php echo site_url();?>/login">Login</a></li>
                     <li><a href="<?php echo site_url();?>/sign-up">Sign Up</a></li>
                     <?php } ?>                       
                     </ul>   
                  </div>
                  <div class="header-search">
                     <div class="header-search-main">
                     
                     <form action="<?php echo home_url( '/' ); ?>" method="get">
    
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <button><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper">
            <ul class="nav sidebar-nav">
               <li class="sidebar-brand">
                  <a href="#">
                  Menu
                  </a>
               </li>
               <?php wp_nav_menu( array( 'menu'=>'Main', 'container'=>'', 'items_wrap'=>'%3$s' ) );?>
            </ul>
         </nav>
      </header>