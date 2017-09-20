<?php get_header(); ?>

<div class="home-about-sec">
<div class="container">
<?php if ( have_posts() ) : ?>
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php else : ?>
	<h1 class="page-title"><?php _e( 'Nothing Found' ); ?></h1>
<?php endif; ?>

<?php
if( have_posts() ):
	while( have_posts() ): the_post(); ?>

	<a href="<?php the_permalink(); ?>"><?php echo the_title();?></a>
	<?php
		the_excerpt();
	endwhile;	

else :
	echo "No search results found.";
endif;
?>
</div>
</div>
<?php get_footer();
