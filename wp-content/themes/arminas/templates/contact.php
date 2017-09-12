<?php 
/*Template Name: Contact*/
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
                  <div class="tabs text-center" id="tabs">
                    <ul>
                    <?php $tabs = explode( "|", get_field("tab_names") ); 
                    foreach ($tabs as $key => $value) :
                      echo '<li><a href="#tabs-'.($key+1).'">'.$value.'</a></li>';
                     endforeach; 
                     ?>
                    </ul>
                    <div id="tabs-1">
                      <span class="callus"><?php the_field("call_us_text"); ?></span>
                      <h2><?php the_field("phone_number"); ?></h2>
                      <p><?php the_field("call_description"); ?></p>
                    </div>
                    <div id="tabs-2">
                      <span class="callus"><?php the_field("email_us_text"); ?></span>
                      <h2><a href="mailto:<?php the_field("email"); ?>"><?php the_field("email"); ?></a></h2>
                      <p><?php the_field("email_description"); ?>
                      <span><?php the_field("postal_address"); ?></span>
                      </p>
                    </div>
                    <div id="tabs-3">
                      <span class="faq">frequently asked questions</span>
                      <div id="accordion" class="text-left">
                      <?php 
                      $args = array(
                        'post_type'      => 'arminas_faqs',
                        'posts_per_page' => -1,
                        );
                      $the_query = new WP_Query( $args );
                      while ( $the_query->have_posts() ) : 
                        $the_query->the_post();
                      ?>
                        <h3><?php the_title(); ?></h3>
                        <div>
                          <?php the_content(); ?>
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
      </section>
      <!-- Page Content End -->
<?php get_footer(); ?>