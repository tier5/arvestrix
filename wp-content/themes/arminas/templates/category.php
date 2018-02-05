<?php 
/*Template Name: Category*/
get_header();
?>
<div class="inner-banner product-banner">
	<a href="#">
		<img src="<?php echo the_post_thumbnail_url(); ?>" alt="img">
	</a>  
</div>
<div class="bodypart category-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php 
		if( have_posts() ):
		while( have_posts() ): the_post();
		?>
		<h2><?php the_title(); ?></h2>
		<?php woocommerce_product_subcategories(); ?>
		<?php 
		endwhile;
		endif; 
		?>
				<div class="search-body">
					<form>
						<input placeholder="Search" type="text">
						<button><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>      
			</div> 
		</div>  
	</div>
	<div class="inner-heading">
		<?php 
		if( have_posts() ):
		while( have_posts() ): the_post();
		?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<?php 
		endwhile;
		endif; 
		?>
	</div>  

	<div class="product-part">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
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
						<div class="col-md-4 col-sm-4">
							<div class="product-box-single">
								<a href="<?php echo site_url("products"); ?>">
									<!-- <h3 class="price"><?php echo get_woocommerce_currency_symbol().$sale_price; ?></h3> -->
									<div class="single-pro-pic"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="img"></div>
									<!-- <?php the_content(); ?> -->
									<h5><?php the_title(); ?></h5>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>

								</a>    
							</div>
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

</div>  
<?php get_footer();?>