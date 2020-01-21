<?php 
	get_header();
	$catsy = get_the_category();
	$cat_id = $catsy[0]->cat_ID;
	$myCat = get_cat_name( $cat_id );
	$template = "default";
?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		// For specific blogpost
		if( $post->ID == 908 ){
			echo '<style>#navi-example ul {list-style: none outside none; background: black; } #navi-example li {float: left; } #navi-example a {color: white; line-height: 50px; padding: 16px 20px; text-decoration: none; text-transform: uppercase; } #navi-example a:hover { background-color: #3c89c8; }</style>'; 
		}
	?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			


<?php   
// Set template to newsingle if that's one of the posts categories
foreach ($catsy as $key => $value) {
	if ($value->name == 'newsingle'){
		$template = "newsingle";
	}
}
?>

<?php if ( $template == "default" ): ?>
	
			<div class="entry <?php echo strtolower($myCat); ?>">
				<?php // DISPLAY POST TITLE ?>
				<div class="post-header">
					<div class="col-right">
						<span class="date-wrapper">
							<small class="date"><a class="link" href="<?php the_permalink() ?>"><?php echo get_the_date(); ?></a></small>
						</span>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					</div>
				</div>
				<?php
					// if cat = blog get formatting, else, do nog get formatting
					if($myCat=='Blog'){						
						the_content();
						// echo $c = get_the_content_with_formatting();
					} else {
						the_content();
						// echo $c = get_the_content_with_formatting();
						//echo $c = get_the_content(); 
					}
				?>


				<?php /*
				<?php $meta_values = get_post_meta( $post->ID ); ?>
				<?php $next_in_line_title = $meta_values[next_post_in_line][0];

				$my_post = get_page_by_title( $next_in_line_title, OBJECT, 'post' );
				echo "<h2>" . get_the_title( $my_post->ID ) . "</h2>";
				echo apply_filters('the_content', $my_post->post_content);
				*/?>
			</div>


<?php // Use this part to create a new html that allows for large image blogposts  ?>
<?php else:  ?>
				<div class="entry <?php echo strtolower($myCat); ?>">
					<?php // DISPLAY POST TITLE ?>
					<div><small class="date"><?php echo get_the_date(); ?></small></div>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php the_content(); ?>
				</div>

<?php endif; ?>





















			
		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>