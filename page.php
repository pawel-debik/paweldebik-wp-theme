<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<div class="entry <?php echo strtolower($myCat); ?>">
			<div class="col-right">
				<h2><span><?php the_title(); ?></span></h2>
			</div>
			
			<?php echo $c = get_the_content_with_formatting(); ?>

			</div>
			
		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>