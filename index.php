<?php get_header(); ?>
<?php 
	$portfolio_items = "";
	$blog_items = "";
	$not_gallery_thumbnail = "";
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$r = new WP_Query(array('post_type' => 'post', 
							'post_status' => 'publish',
							'paged' => $paged));
?>
<?php // CHECK IF IT'S THE 80'S ?>
<?php $nostalgia = array_shift(explode(".",$_SERVER['HTTP_HOST'])); ?>
<?php /*if ( $nostalgia = "best-80s-cartoons" ): ?>
	<?php	// Get special 80's page content
	$page_id = 1177;
	$the80s = get_page( $page_id ); 
	?>
	<div class="blog">
		<div id="post-<?php $page_id; ?>">
			<?php // DISPLAY POST TITLE ?>
			<div><small class="date"><?php echo get_the_date(); ?></small></div>
			<h2><?php echo $the80s->post_name; ?></h2>
			<?php echo $the80s->post_content; ?>
		</div>
	</div>		
<?php else: // Aw, it's not the 80's ?>*/
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php 
		$post_tags = get_the_tags(get_the_ID());
		$category = get_the_category();
		$content = strip_tags(getShortDescription( get_the_content(), 350 ),'<img>'); 
	?>

	<?php if ( $post_tags[0]->name == 'wide' ): ?>
		<?php $portfolio_items .= '
		<div class="portfolio-item portfolio-image-wide-wrapper">
			<a class="portfolio-image-wide interactive-image" href="' . get_permalink() . '">
				<div>' . get_the_post_thumbnail(get_the_ID(), array( 680,680 ), array( 'class' => 'portfolio-image' )) . '</div>
			</a>
			<div>' . get_the_excerpt() . '</div>
		</div>' ?>
	<?php else: ?>
		<?php $blog_items .= '
		<div class="blog ' . $post_tags[0]->name . '">
			<div id="post-' . get_the_ID(). '">
				<div><small class="date">' . get_the_date() .'</small></div>
				<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
					<a class="blog-image-link interactive-image" href="' . get_permalink() . '">
			 			' . get_the_post_thumbnail(get_the_ID(), array( 570,300 ), array( 'class' => 'blog-image' )) . '
					</a>
				<p> ' . wrapLinkOnImg( $content, get_permalink() ) . '</p>
			</div>
	  </div>' ?>
	<?php endif; ?>
<?php endwhile; ?>
<div class="homepage-content">
	<div class="home-intro-header">
		<div class="large-text-wrapper">
			<p class="large-text">Hi, My name is Paweł. <br>I design and develop websites, and more.
			<br>Check it out:</p>
		</div>
		<img src="http://paweldebik.com/paweldebik/wp-content/uploads/2019/12/pawel-debik-blue-bg.png" alt="" width="298"  class="pawel-head alignnone size-full wp-image-3143">
	</div>
	<div class="just-portfolio-items">
		<?php echo $portfolio_items; ?>
	</div>

	<p class="large-text">Blogs</p>
	<div class="just-blog-items">
		<?php echo $blog_items; ?>
	</div>
</div><!-- end of homepage-content-->
	<div id="blog-nav">
		<?php /*
		<span class="next"><?php next_posts_link( '< Older posts', $post->max_num_pages ); ?> | </span>
		<span class="prev"><?php previous_posts_link( 'Newer posts >', $post->max_num_pages ); ?></span>
		*/ ?>
		<a href="/blog">All blogs</a>
	</div>
	<?php endif; wp_reset_query(); ?>

<?php /*endif; */?>

<?php get_footer(); ?>
<?php remove_filter( 'the_content', 'remove_images', 100 ); ?>