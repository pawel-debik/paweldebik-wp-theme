<?php get_header(); ?>
<?php $blogPosts = new WP_Query('category_name=about'); ?>
	

<div class="about-wrapper">
	<div class="profile-and-skill">
		<img style="justify-self: center;" src="http://paweldebik.com/paweldebik/wp-content/uploads/2019/12/pawel-debik-blue-bg.png" alt="Pawel Debik" width="298"  class="" />
		<div class="skillset">
			<?php 
			$key_1_values = get_post_meta( get_the_ID() ); 
			$test = $key_1_values['skill_set'];
			echo $test[0];
			?>
		</div>
	</div>

	<div id="page-about" class="about">

		<?php 
			$page_id = 24;
			$page_data = get_page( $page_id ); 
			$content = apply_filters('the_content', $page_data->post_content);
		?>
		<div class="blog-item" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>">Web designer turned web developer</a></h2>
			<?php echo $content; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>