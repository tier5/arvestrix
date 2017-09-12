<?php 
/*Template Name: Product Details*/
get_header();
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
							<div class="item active">
								<div class="row">
									<div class="col-md-12 text-center">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/p1.png" class="img-responsive"  alt="image">
									</div>
								</div>
							</div>
							<!-- Quote 2 -->
							<div class="item">
								<div class="row">
									<div class="col-md-12 text-center">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/p2.png" class="img-responsive"  alt="image">
									</div>
								</div>
							</div>
							<!-- Quote 3 -->
							<div class="item">
								<div class="row">
									<div class="col-md-12 text-center">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/p3.png" class="img-responsive"  alt="image">
									</div>
								</div>
							</div>
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
					<h1>Men's shoes fashion</h1>
					<p>Dramatically maintain customized is metrics through tactical outsourcing Credibly synthesize.</p>
					<div class="box colors">
						<h2>available colors</h2>
						<ul>
							<li><a href="#" class="black"></a></li>
							<li><a href="#" class="blue"></a></li>
							<li><a href="#" class="green"></a></li>
							<li><a href="#" class="red"></a></li>
							<li><a href="#" class="orange"></a></li>
							<li><a href="#" class="pink"></a></li>
						</ul>
					</div>
					<div class="box">
						<h2>current price: <span class="price"> $30</span></h2>
					</div>
					<div class="box">
						<h2>offer price: <span class="offerprice"> $24</span></h2>
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
							<a href="#" class="add-to-cart">add to cart</a>
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
							<li><a href="#tabs-1">Review</a></li>
							<li><a href="#tabs-2">Product Details</a></li>
							<li><a href="#tabs-3">FAQ</a></li>
						</ul>
						<div id="tabs-1">
							<h3>Reviews</h3>
							<div class="row rating-top">
								<div class="col-sm-4">
									<h4>Rating Snapshot</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/review.png" class="img-responsive" alt="image">
								</div>
								<div class="col-sm-4">
									<h4>Average Customer Ratings</h4>
									<ul>
										<li>4</li>
										<li>|</li>
										<li>128 Reviews</li>
									</ul>
									<div class="ratings">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
									</div>
								</div>
								<div class="col-sm-4">
									<a href="#" class="writereview">Write a Review</a>
								</div>
							</div>
							<div class="row review-section">
								<div class="col-sm-12">
									<div class="each-review">
										<div class="ratings">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</div>
										<div class="review-title">This is a good quality product</div>
										<div class="author">By Shane, 10 days ago</div>
										<div class="review-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
									</div>
									<div class="each-review">
										<div class="ratings">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</div>
										<div class="review-title">This is a good quality product</div>
										<div class="author">By Shane, 10 days ago</div>
										<div class="review-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
									</div>
									<div class="each-review">
										<div class="ratings">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</div>
										<div class="review-title">This is a good quality product</div>
										<div class="author">By Shane, 10 days ago</div>
										<div class="review-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
									</div>
									<a href="#" class="seeall">See all 126 customer reviews (newest first)</a>
								</div>
							</div>
						</div>
						<div id="tabs-2">
							<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
						</div>
						<div id="tabs-3">
							<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
							<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>