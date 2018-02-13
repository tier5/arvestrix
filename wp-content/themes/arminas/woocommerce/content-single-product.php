<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;

$rating_1 = $product->get_rating_count(1);
$rating_2 = $product->get_rating_count(2);
$rating_3 = $product->get_rating_count(3);
$rating_4 = $product->get_rating_count(4);
$rating_5 = $product->get_rating_count(5);
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<section class="product-page">
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
			<div class="col-sm-6">
				<div class="product-view">
				
					<div class="carousel slide" data-ride="carousel" id="quote-carousel">
						<!-- Carousel Slides / Quotes -->
						<div class="carousel-inner">
							<!-- Quote 1 -->
							<?php
							$i = 0;
							$attachment_ids = $product->get_gallery_attachment_ids(); 
							foreach( $attachment_ids as $attachment_id ): $i++;
							$image_link = wp_get_attachment_url( $attachment_id ); 
							?>
							<div class="item <?php if($i==1):echo 'active'; endif; ?>">
								<div class="row">
									<div class="col-md-12 text-center">
										<img src="<?php echo $image_link; ?>" class="img-responsive"  alt="image">
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>

						<!-- Carousel Buttons Next/Prev -->
						<a data-slide="prev" href="#quote-carousel" class="left carousel-control">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" class="img-responsive a-left"  alt="image">
						</a>
						<a data-slide="next" href="#quote-carousel" class="right carousel-control">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow2.png" class="img-responsive a-right"  alt="image">
						</a>
					</div>  
				</div>
			</div>
			<div class="col-sm-6">
				<div class="product-details">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<div class="box colors">
						<h2>available colors</h2>
						<ul>
						<?php
						$terms = get_terms("pa_colors");
						foreach ( $terms as $term ) :
						echo '<li><a href="#" class="'. strtolower($term->name) .'"></a></li>';
						endforeach;
						?>
						</ul>
					</div>
					<div class="box">
						<h2>current price: <span class="price"> 
						<?php echo get_woocommerce_currency_symbol().$product->get_regular_price();?>
						</span></h2>
					</div>
					<div class="box">
						<h2>offer price: <span class="offerprice">
						<?php echo get_woocommerce_currency_symbol().$product->get_sale_price();?>
						</span></h2>
					</div>
					<div class="box quantity-section">
						<h2>quantity:</h2>
						<div class="col-md-6">
							<div class="row">
								<ul>
									<li class="minus">-</li>
									<li><input id="qty1" type="text" value="1" class="qty"/></li>
									<li class="add">+</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<input type="hidden" id="product_id" value="<?php the_ID();?>">
							<a href="<?php echo home_url().'/?add-to-cart='.get_the_ID().'&quantity=1'; ?>" class="add-to-cart">add to cart</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="pro-details">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div id="tabs">
						<ul>
							<?php 
							$tabs = apply_filters( 'woocommerce_product_tabs', array() );
							if ( ! empty( $tabs ) ) : 
							//print_r($tabs);
							$i=0;
							foreach ($tabs as $key => $value) : $i++;?>
							 	<li><a href="#tabs-<?php echo $i; ?>"><?php echo $value['title']; ?></a></li>
							<?php
							endforeach;
							endif; 
							?>
						</ul>
						<div id="tabs-1">
							<h3>Reviews</h3>
							<div class="row rating-top">
								<div class="col-sm-4">
									<h4>Rating Snapshot</h4>
									<!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/review.png" class="img-responsive" alt="image"> -->


							<div class="row">
								<div class="col-md-2 col-sm-2 align-center">
									5 <i class="fa fa-star"></i>
								</div>
								<div class="col-md-5 col-sm-5" style="padding: 0">
										
								<div class="pipe">
									<span style="width: <?php echo $rating_5;?>%;"></span>

								</div>

								</div>
								<div class="col-md-2 col-sm-2">
									<?php echo $rating_5;?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-sm-2 align-center">
									4 <i class="fa fa-star"></i>
								</div>
								<div class="col-md-5 col-sm-5" style="padding: 0">
										
								<div class="pipe">
									<span style="width: <?php echo $rating_4;?>%;"></span>

								</div>

								</div>
								<div class="col-md-2 col-sm-2">
									<?php echo $rating_4;?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-sm-2 align-center">
									3 <i class="fa fa-star"></i>
								</div>
								<div class="col-md-5 col-sm-5" style="padding: 0">
										
								<div class="pipe">
									<span style="width: <?php echo $rating_3;?>%;"></span>

								</div>

								</div>
								<div class="col-md-2 col-sm-2">
									<?php echo $rating_3;?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-sm-2 align-center">
									2 <i class="fa fa-star"></i>
								</div>
								<div class="col-md-5 col-sm-5" style="padding: 0">
										
								<div class="pipe">
									<span style="width: <?php echo $rating_2;?>%;"></span>

								</div>

								</div>
								<div class="col-md-2 col-sm-2">
									<?php echo $rating_2;?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-sm-2 align-center">
									1 <i class="fa fa-star"></i>
								</div>
								<div class="col-md-5 col-sm-5" style="padding: 0">
										
								<div class="pipe">
									<span style="width: <?php echo $rating_1;?>%;"></span>

								</div>

								</div>
								<div class="col-md-2 col-sm-2">
									<?php echo $rating_1;?>
								</div>
							</div>
							</div>
								<div class="col-sm-4">
									<h4>Average Customer Ratings</h4>
									<ul>
										<li>
										<?php 
										$args = array( 
											'number'      => '', 
											'status'      => 'approve', 
											'post_status' => 'publish', 
											'post_type'   => 'product',
											'post_id' 	  => get_the_ID() 
											);

										$comments = get_comments( $args );
										foreach($comments as $comment) :
											$rating =  get_comment_meta( $comment->comment_ID, 'rating' );
										$avgRating +=$rating[0];
										endforeach;
										if(get_comments_number()!=0){
										$finalAvgRating = round($avgRating/get_comments_number());	
										echo $finalAvgRating;
										} else {
											echo "0";
										}
										?>	
										</li>
										<li>|</li>
										<li><?php echo get_comments_number(); ?> Reviews</li>
									</ul>
									<div class="ratings">
										<?php
										for ( $i=0; $i<$finalAvgRating; $i++ ) { 
											echo '<i class="fa fa-star" aria-hidden="true"></i>';
										}

										for ( $i=0; $i<5-$finalAvgRating; $i++ ) { 
											echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
										}
										?>
									</div>
								</div>
								<div class="col-sm-4">
									<!-- <a href="#comments_post_template" class="writereview">Write a Review</a> -->
									<a href="#comments_post_template" class="writereview">Write a Review</a>


									 ‎
								</div>
								<div id="comments_post_template" style="dis">
									<?php comments_template( 'woocommerce/single-product-reviews' );?>
								</div>
								
							</div>
							<div class="clearfix"></div>
							<div class="row review-section">
								<div class="col-sm-12">
									<?php
									$args = array( 
									                'number'      => 5, 
									                'status'      => 'approve', 
									                'post_status' => 'publish', 
									                'post_type'   => 'product',
									                'post_id' 	  => get_the_ID()	
									        );

									$comments = get_comments( $args );
									foreach($comments as $comment) :
									//echo "<pre>";
									//print_r($comment);
									$date = new DateTime($comment->comment_date);
									$now = new DateTime();
									?>
									<div class="each-review">
										<div class="ratings">
										<?php $rating =  get_comment_meta( $comment->comment_ID, 'rating', true );
										for ( $i=0; $i<$rating; $i++ ) { 
											echo '<i class="fa fa-star" aria-hidden="true"></i>';
										}

										for ( $i=0; $i<5-$rating; $i++ ) { 
											echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
										}

										?>
										</div>
										<div class="review-title"><?php echo $comment->comment_content; ?></div>
										<div class="author">By <?php echo $comment->comment_author; ?>, <?php echo $date->diff($now)->format("%d days"); ?> ago</div>
									</div>
									<?php endforeach; ?>
									
									<a href="<?php
									if( get_comments_number() != 0 ):
									echo home_url().'/customer-reviews/?post_id='.get_the_ID(); else : echo "#"; endif; ?>" class="seeall">
									<?php comments_number( 'no responses', 'See 1 customer review', 'See all % customer reviews' ); ?>
									</a>
								</div>
							</div>
						</div>
						<div id="tabs-2">
							<p><?php
							$post_id = get_the_ID(); 
							the_field('product_details', $post_id);
							?></p>
						</div>
						<div id="tabs-3">
							<p><?php the_field('faq', $post_id);?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Product variations -->
	<?php
	if ( $product->is_type( 'variable' ) ) : 
	$variations = $product->get_available_variations();
	//echo "<pre>";
	//print_r($variations);
	?>
		<table border="1">
			<thead>
			    <tr>
			        <td>Color</td>
			        <td>Size</td>
			        <td>Regular price</td>
			        <td>Sale price</td>
			    </tr>
			</thead>
			<tbody>
			<?php foreach($variations as $variation): ?>

			    <tr>
			        <td><?php echo $variation['attributes']['attribute_pa_colors']; ?></td>
			        <td><?php echo $variation['attributes']['attribute_pa_size']; ?></td>
			        <td><?php echo $variation['display_regular_price'].get_woocommerce_currency_symbol(); ?></td>
			        <td><?php echo $variation['display_price']. get_woocommerce_currency_symbol(); ?></td>
			    </tr>
			<?php endforeach; ?>    
			</tbody>
		</table>
	<?php endif; ?>	
	<!--Product variations-->
</section>