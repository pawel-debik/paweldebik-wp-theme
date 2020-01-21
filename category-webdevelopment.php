<?php get_header(); ?>
<?php $blogPosts = new WP_Query('category_name=webdevelopment&posts_per_page=99'); ?>

	<div id="page-portfolio" class="webdevelopment">

		<?php while ($blogPosts->have_posts()) : $blogPosts->the_post(); ?>			
			<div class="blog-item col-right" id="post-<?php the_ID(); ?>">
				<a href="<?php echo get_permalink(); ?>">
					<div><small class="date"><?php echo $date =  get_the_date(); ?></small></div>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				</a>
			</div>
		<?php endwhile; ?>
		
	</div>
<?php get_footer(); ?>