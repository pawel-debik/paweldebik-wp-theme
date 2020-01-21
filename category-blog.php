<?php get_header(); ?>
<?php $blogPosts = new WP_Query('category_name=blog&posts_per_page=99'); ?>

	<div class="blog">

		<?php while ($blogPosts->have_posts()) : $blogPosts->the_post(); ?>			
			<div class="blog-item" id="post-<?php the_ID(); ?>">				
					<small class="date">
						<a class="link" href="<?php echo get_the_permalink(); ?>"><?php echo $date = get_the_date(); ?></a>
					</small>
					<h2>
						<a class="link" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>				
			</div>
		<?php endwhile; ?>
		
	</div>
<?php get_footer(); ?>