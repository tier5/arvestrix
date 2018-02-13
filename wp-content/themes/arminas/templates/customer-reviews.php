<?php
/*Template Name: Customer Reviews*/ 
get_header(); 

?>
<div class="home-about-sec" style="background: #fff;">
	<div class="row review-section1" >
		<div class="col-sm-12">
			<?php
			$args = array( 
			                'number'      => 5, 
			                'status'      => 'approve', 
			                'post_status' => 'publish', 
			                'post_type'   => 'product',
			                'post_id' 	  => $_GET['post_id']	
			        );

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
<?php
$comments_per_page = 1;
$current_page = max( 1, get_query_var('paged') );

global $current_user;
get_currentuserinfo();
$userid = $current_user->ID;

$args = array('user_id' => $userid, 'number' => 0);
$comments = get_comments($args);

$total_comments = count($comments);
$total_pages = (($total_comments - 1) / $comments_per_page) + 1;

$start = $comments_per_page * ($current_page - 1);
$end = $start + $comments_per_page;

// Might be good to test and make sure there are comments for the current page at this point!

if($total_pages > 1) {
    $args = array( 'total'=>$total_pages, 'current'=>$current_page );
    paginate_links($args);
}
?>
<?php get_footer(); ?>