<?php 
/*Template Name: Write a Review*/
get_header();
?>
<!-- Page Content Start -->
      <section class="contact-page">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="contact">
                    <?php 
                    if( have_posts() ):
                    while( have_posts() ): the_post();
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php 
                    endwhile;
                    endif; 
                    ?>
                  </div>
                  <div class="review-form">
                  <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <form>
                      <div class="form-group">
                          <label>Name:</label>
                          <input class="form-control" type="text" name="" required="required">
                      </div>
                      <div class="form-group">
                          <label>Eemail:</label>
                          <input class="form-control" type="text" name="" required="required">
                      </div>
                      <div class="form-group">
                          <label>Phone:</label>
                          <input class="form-control" type="text" name="" required="required">
                      </div>
                      <div class="form-group">
                          <label>Message:</label>
                          <textarea class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <input type="submit" value="Submit">
                      </div>
                    </form>  
                    </div>
                    <div class="col-md-6 col-sm-6 align-center">
                      <div class="review-graphic">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/review.jpg">
                      </div>
                    </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Page Content End -->
<?php get_footer(); ?>
