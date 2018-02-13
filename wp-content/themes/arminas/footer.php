<div class="end-footer">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <?php echo get_option('edit_license_text'); ?>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <ul>
                           <li><a target="_blank" href="<?php echo get_option('edit_facebook_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="img"></a></li>
                           <li><a target="_blank" href="<?php echo get_option('edit_instagram_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="img"></a></li>
                           <li><a target="_blank" href="<?php echo get_option('edit_pinterest_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pin.png" alt="img"></a></li>
                           <li><a target="_blank" href="<?php echo get_option('edit_twitter_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tweet.png" alt="img"></a></li>
                           <li><a href="#"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
</div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <!-- <script src="<?php //echo get_template_directory_uri(); ?>/assets/js/creative.min.js"></script> -->

      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-ui.js"></script>
      <script src='https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js'></script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/validation.js"></script>
      <script>
        $( function() {
          $( "#tabs" ).tabs();
          $( "#accordion" ).accordion({
            collapsible: true,
            heightStyle: "content"  
          });
        });
      </script>
      <script>
         $(document).ready(function () {
         var trigger = $('.hamburger'),
           overlay = $('.overlay'),
          isClosed = false;
         
         trigger.click(function () {
           hamburger_cross();      
         });
         
         function hamburger_cross() {
         
           if (isClosed == true) {          
             overlay.hide();
             trigger.removeClass('is-open');
             trigger.addClass('is-closed');
             isClosed = false;
           } else {   
             overlay.show();
             trigger.removeClass('is-closed');
             trigger.addClass('is-open');
             isClosed = true;
           }
         }
         
         $('[data-toggle="offcanvas"]').click(function () {
             $('#wrapper').toggleClass('toggled');
         });  
         });
      </script>
      <!-- <script type="text/javascript">
         $(document).ready(function(){       
         var scroll_start = 0;
         var startchange = $('#startchange');
         var offset = startchange.offset();
         if (startchange.length){
         $(document).scroll(function() { 
         scroll_start = $(this).scrollTop();
         if(scroll_start > offset.top) {
           $(".navbar-default").css('background-color', '#000');
         } else {
           $('.navbar-default').css('background-color', 'transparent');
         }
         });
         }
         });
         
          
      </script> -->


      <script type="text/javascript">
            $(window).scroll(function() {    
                var scroll = $(window).scrollTop();

                if (scroll >= 500) {
                    $(".navbar-default").addClass("darkHeader");
                } else {
                    $(".navbar-default").removeClass("darkHeader");
                }
            });

      </script>









      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
      <script type="text/javascript">
         $(document).on('ready', function() {
           $(".regular").slick({
             dots: true,
             infinite: true,
             slidesToShow: 4,
             slidesToScroll: 4
           });
           $(".center").slick({
             dots: true,
             infinite: true,
             centerMode: true,
             slidesToShow: 3,
             slidesToScroll: 3
           });
           $(".variable").slick({
             dots: true,
             infinite: true,
             variableWidth: true
           });
         });
         $('.responsive').slick({
         dots: true,
         infinite: false,
         speed: 300,
         slidesToShow: 4,
         slidesToScroll: 4,
         responsive: [
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true,
             dots: true
           }
         },
         {
           breakpoint: 600,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         },
         {
           breakpoint: 480,
           settings: {
             slidesToShow: 1,
             slidesToScroll: 1
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
         ]
         });
      </script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/notify.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.add').on('click',function(){
            var $qty=$(this).parent().find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
            
            generate_add_to_cart_url(currentVal+1);

          });
          $('.minus').on('click',function(){
            var $qty=$(this).parent().find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $qty.val(currentVal - 1);
            }

            generate_add_to_cart_url(currentVal-1);

          });

        });

        function generate_add_to_cart_url(qty) {

            var product = $("#product_id").val();
            var addToCartUrl = "<?php echo home_url();?>";
            if (qty == 0) {
              $(".add-to-cart").attr("href","javascript:void(0)");
              $.notify("Please change quantity to 1 !");
            } else {
              $(".add-to-cart").attr("href",addToCartUrl+'/?add-to-cart='+product+'&quantity='+qty);
            }
            
        }
      </script>
      <?php wp_footer();?>
   </body>
</html>