<?php
/*Template Name: Customer Reviews*/ 
get_header(); 

?>
<div class="home-about-sec" style="background: #fff;">
	<div class="container">
	<div class="row review-section1" >
		<div class="col-sm-12">
			<?php
			define('DEFAULT_COMMENTS_PER_PAGE',5);
			
			$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			$uri_segments = explode('/', $uri_path);

			$page = (int) (empty($uri_segments[3]) ? 1 : $uri_segments[3]);

			$limit = DEFAULT_COMMENTS_PER_PAGE;
			$offset = ($page * $limit) - $limit;

			$args = array( 
			                'number'      => $limit, 
			                'status'      => 'approve',
			                'offset'	  => $offset, 
			                'post_status' => 'publish', 
			                'post_type'   => 'product',
			                'post_id' 	  => $_GET['post_id']	
			        );

			$total_comments = get_comments(array('status'=>'approve'));
			$pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);
			
			$comments = get_comments( $args );
			foreach($comments as $comment) :
			
			$date = new DateTime($comment->comment_date);
			$now = new DateTime();
			?>
			<div >
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
			</div>
		</div>
	</div>
	</div>
</div>
<div class="pagi">
<?php
$args = array(
'base'         => '%_%',
'format'       => '?page=%#%',
'total'        => ($pages-1),
'current'      => $page,
'prev_next'    => True,
'prev_text'    => __('&laquo; Previous'),
'next_text'    => __('Next &raquo;'),
'type'         => 'plain');
// ECHO THE PAGENATION 
echo paginate_links( $args );
?>
</div>
<?php get_footer(); ?>