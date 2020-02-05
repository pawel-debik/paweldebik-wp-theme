<?php _setcookies(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo pageTitle(); ?></title>	
	<meta name="description" content="Pawel Debik Web Design and Web Development Portfolio and Blog" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
	<!-- <link rel="stylesheet" href="<?php // bloginfo('stylesheet_url'); ?>" /> -->
	<?php wp_head(); ?>
	<?php // echo get_google_analytics(); /* Do I really need analytics at this point? :s I never look at them. It's just helping google track everyone that visits my site. It slows load times for my visitors. Maybe I'll look into Matomo again, though that inferface.. yikes */ ?>
</head>

<body <?php get_my_body_class(); ?> >
	<header id="header" class="header">	
		<div class="page-wrap crumbs-wrap">	

			<div class="header-inner center-content crumbs">
				<a href="/"><img class="website-logo" src="<?php echo logo_url() ?>" alt="Pawel Debik Logo" /></a>
				<h1><a class="blog-name" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><?php echo breadcrumbs(); ?></h1>
				<?php // if ( is_user_logged_in() ): ?>

					<a class="responsive-menu-toggle" href="#"><span></span><span></span><span></span><span></span></a>
					<div class="header-theme-toggle">
						<span class="toggle-label">Dark theme: </span>
						<label class="switch">
							<input id="theme-selector-header" class="theme-selector" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
					</div>
				<?php // endif; ?>
			</div>
		</div>
		<div class="page-wrap nav-wrap">	
			<nav class="header-inner center-content nav">
				<?php // wp_nav_menu( array('menu' => 'Nav' )); ?>
				<div class="extra-nav">
					<a class="menu-back hidden" href="#" onclick="history.go(-1);">Back</a>
					<?php
						if (is_single()){
							if (has_next_posts){
								next_post_link('<span class="menu-next">%link</span>', 'Next Blog>', TRUE);
							}
							if (has_previous_posts AND !has_next_posts){
								previous_post_link('<span class="menu-prev">%link</span>', '< Prev', TRUE);
							}
						}
					?> 
				</div>
				<ul>
					<li class="menu-item menu-portfolio">
						<a href="/portfolio/"><span>Portfolio</span></a>
					</li>
					<li class="menu-item menu-blog">
						<a href="/blog/"><span>Blog</span></a>
					</li>
					<li class="menu-item menu-photography">
						<a href="/photography/"><span>Photography</span></a>
					</li>
					<li class="menu-item menu-about last">
						<a href="/about/"><span>About</span></a>
					</li>
				</ul>
			</nav>
		</div>



	</header>
	
	<div class="content page-wrap">
		<div class="center-content">