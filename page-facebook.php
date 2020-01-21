<!DOCTYPE html>
<html>
<head>	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php echo get_the_excerpt(); ?>" />
	<meta property="fb:admins" content="{paweldebik}"/>

	<title><?php pageTitle(); ?></title>	
</head>

<body style="overflow:hidden; width:400px;">
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({appId: '293587777387023', status: true, cookie: true, xfbml: true, oauth: true});
			FB.Canvas.setSize({ width: 410, height: 2800 }); // this seems to work well for H
		};


		(function() {
			var e = document.createElement('script');
			e.type = 'text/javascript';
			e.src = document.location.protocol +
				'//connect.facebook.net/en_US/all.js';
			e.async = true;
			document.getElementById('fb-root').appendChild(e);
		}());
	</script> 




	<?php $blogPosts = new WP_Query('category_name=blog&posts_per_page=20'); ?>
	<div id="page-portfolio" class="blog" style="border:solid red; width:300px;">
	<?php while ($blogPosts->have_posts()) : $blogPosts->the_post(); ?>
		<div class="blog-item col-right" id="post-<?php the_ID(); ?>">
			<a href="<?php echo get_permalink(); ?>">
				<div><small class="date"><?php echo $date =	get_the_date(); ?></small></div>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			</a>
		</div>
	<?php endwhile; ?>


	<div class="fb-comments" data-num-posts="2" data-width="760" data-colorscheme="light"></div>

			





		
		
	</div>
</body>