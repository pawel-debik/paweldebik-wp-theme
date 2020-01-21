<?php get_header(); ?>
<?php $mypost = new WP_Query('category_name=photography&posts_per_page=50'); ?>

	<div id="page-photography" class="page-photography">
		<?php 
			$i = 0;
			$gallery = array();
			$review = array();

			while ($mypost->have_posts()) : $mypost->the_post();

				$category = get_the_category();

				if ($category[0]->name != "Blog"):
					$gallery[$i]['id'] = get_the_ID();
					$gallery[$i]['category_name'] = $category;
					$gallery[$i]['permalink'] = get_permalink();
					$gallery[$i]['title'] = get_the_title();
					$gallery[$i]['thumbnail'] = get_the_post_thumbnail(get_the_ID(), array( 450,200 ), array( 'class' => 'photography-thumb' ));
					$gallery[$i]['content'] = get_the_content();
				endif;

				if ($category[0]->name == "Blog"):
					$review[$i]['id'] = get_the_ID();
					$review[$i]['category_name'] = $category;
					$review[$i]['permalink'] = get_permalink();
					$review[$i]['title'] = get_the_title();
					$review[$i]['thumbnail'] = get_the_post_thumbnail(get_the_ID(), array( 450,200 ), array( 'class' => 'photography-thumb' ));
					$review[$i]['content'] = get_the_content();
				endif;
			?>

		<?php $i++; endwhile; ?>



		<div class="photography-galleries">
		<?php foreach ($gallery as $key => $value): ?>
			<div class="photography-item subhome-item" id="post-<?php $value['id']; ?>">
				<a href="<?php echo $value['permalink']; ?>">
					<h2><span><?php echo $value['title']; ?></span></h2>
					<?php echo $value['thumbnail']; ?>
					<span class="button round">></span>
				</a>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="photography-reviews clearfix">
		<h2>Photography reviews</h2>
		<?php foreach ($review as $key => $value): ?>
			<div class="photography-related">
				<a href="<?php echo $value['permalink']; ?>">
					<h2><span><?php echo $value['title']; ?></span></h2>
				</a>
			</div>
			<?php endforeach; ?>
		</div>



	</div>
<?php get_footer(); ?>






<?php
/*
<?php get_header(); ?>
<?php $mypost = new WP_Query('category_name=photography'); ?>

	<div id="page-photography" class="col-right">
		<?php while ($mypost->have_posts()) : $mypost->the_post(); ?>
		<?php $category = get_the_category(); ?>
			<?php if ($category[0]->name != "Blog"): ?>
				<div class="photography-item subhome-item" id="post-<?php the_ID(); ?>">
					<a href="<?php echo get_permalink(); ?>">
						<h2><span><?php the_title(); ?></span></h2>
						<?php the_post_thumbnail(array( 450,200 ), array( 'class' => 'alignleft' )); ?>
					</a>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
<?php get_footer(); ?>
*/
?>