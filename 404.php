<?php get_header(); ?>
<div class="col-right">
	<h2>Error 404 - Page Not Found</h2>
	<p>Can't find the page you are looking for? Perhaps I've moved it to another location. Sorry! Please try one of the pages below:</p>
		<p>Please try one of the links below:<br />
			- <a href="<?php echo get_bloginfo('url'); ?>/">Home</a> <br />
			- <a href="<?php echo get_bloginfo('url'); ?>/blog">Blog</a> <br />
			- <a href="<?php echo get_bloginfo('url'); ?>/photography">Photography</a> <br />
			- <a href="<?php echo get_bloginfo('url'); ?>/portfolio">Portfolio</a> <br />
			- <a href="<?php echo get_bloginfo('url'); ?>/about">About</a>
		</p>

		<p>Or contact me at <a href="mailto:me@paweldebik.com">me@paweldebik.com</a></p>
</div>
<?php get_footer(); ?>