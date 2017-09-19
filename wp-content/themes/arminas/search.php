<?php get_header(); ?>
<div class="home-about-sec">
<?php
if(have_posts()):
	while(have_posts()): the_post();
		the_title();
		the_excerpt();
	endwhile;	

else :
	echo "No search results found.";
endif;
?>
</div>
<?php get_footer();
