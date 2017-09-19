<?php get_header(); ?> 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<!-- Wrapper for slides -->

<div class="carousel-inner">
	<?php 
	$args = array(
		'post_type'      => 'arminas_sliders',
		'posts_per_page' => '1',
		);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : 
		$the_query->the_post();
	?>
	<div class="item active">
		<img src="<?php echo the_post_thumbnail_url(); ?>" alt="Los Angeles" style="width:100%;">
		<div class="header-text ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<?php the_content(); ?>
						<div class="">
							<a class="btn btn-theme btn-min-block" href="#">Buy Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /header-text -->
	</div>
	<?php 
	endwhile; 
	wp_reset_postdata();
	?>
	<?php 
	$args = array(
		'post_type'      => 'arminas_sliders',
		'offset'		 => '1'
		);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : 
		$the_query->the_post();
	?>
	<div class="item">
		<img src="<?php echo the_post_thumbnail_url(); ?>" alt="Los Angeles" style="width:100%;">
		<div class="header-text">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<h2>
							New look <span> new style</span>
						</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing<br> elit, sed do eiusmod tempor incididunt ut .</p>
						<div class="">
							<a class="btn btn-theme btn-min-block" href="#">Buy Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /header-text -->
	</div>
	<?php 
	endwhile; 
	wp_reset_postdata();
	?>
	<div class="call-btn "><a class="page-scroll" href="#about-sec"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/call-btn.png" alt="img"></a></div>
</div>
</div>
<!-- Page Content -->
<div class="bodypart" id="startchange">
<div class="home-about-sec" id="about-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="search-body">
					<form>
						<input placeholder="Search" type="text">
						<button><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>      
			</div> 
		</div>  
	</div>
	<div class="container">
		<div class="row">
			<?php
			if( have_posts() ):
				while( have_posts() ): the_post();
			?>
			<div class="col-md-6 col-sm-6">
				<?php the_content(); ?>
			</div>
			<div class="col-md-6 col-sm-6 bounceIn animated">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="img">
			</div>
			<?php
			endwhile;
			endif;
			?>
		</div>
	</div>
</div>
<div class="popular-products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>popular Products</h2>
				<div class="row">
					<?php
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 4	
						);
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
					$_product = wc_get_product( $post->ID );
					$regular_price = $_product->get_regular_price();
					$sale_price = $_product->get_sale_price();
					$percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
					?>
					<div class="col-md-3 col-sm-3">
						<a href="<?php the_permalink(); ?>">
							<div class="product-pic">
								<img src="<?php echo the_post_thumbnail_url(); ?>" alt="img">
							</div>
							<div class="product-txt">
								<h3><span><?php the_title(); ?></span></h3>
							</div>
							<div class="price">
								<ul>
									<li>-<?php echo $percentage; ?></li>
									<li><?php echo get_woocommerce_currency_symbol().$sale_price; ?></li>
								</ul>
							</div>
						</a>
					</div>
					<?php 
					endwhile; 
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="find-place">
	<a href="#">
		<img src="<?php the_field('amazon_image');?>" alt="img">
	</a>  
</div>
<div class="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Product</h2>
				<section class="responsive slider">
					<?php
					$args = array(
						'post_type'      => 'product',
						);
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
					$_product = wc_get_product( $post->ID );
					$regular_price = $_product->get_regular_price();
					$sale_price = $_product->get_sale_price();
					$percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
					?>
					<div class="product-box">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg" alt="img">
							<h3><?php the_title(); ?></h3>
							<div class="price">
								<ul>
									<li>-<?php echo $percentage; ?></li>
									<li><?php echo get_woocommerce_currency_symbol().$sale_price; ?></li>
								</ul>
							</div>
						</a>   
					</div>
					<?php 
					endwhile; 
					wp_reset_postdata();
					?>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="get-notice">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Get Notified</h2>
				<p>We'll keep you in the loop with Dop-in announcements, studio openings, exclusive content and more!</p>
				<form>
					<div class="form-group">
						<!-- <input class="zip" type="text" placeholder="Zip Code" required="required"> -->
						<input class="email" type="email"  placeholder="E-mail" required="required">
						<input type="submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<footer>
	<div class="instagram">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon" alt="img"> <span>Follow us on Instagram</span> 
					</a>   
				</div>
			</div>
		</div>
	</div>
	<div class="pic-panel">
		<div class="row">
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic1.png" alt="img">
				</div>
			</div>
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic2.png" alt="img">
				</div>
			</div>
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic3.png" alt="img">
				</div>
			</div>
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic4.png" alt="img">
				</div>
			</div>
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic3.png" alt="img">
				</div>
			</div>
			<div class="col-sm-2 col-xs-2">
				<div class="pics-holder fadeIn animated">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/f-pic2.png" alt="img">
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>      