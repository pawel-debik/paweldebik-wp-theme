<?php get_header(); ?>
<?php 
	$portfolio_items = "";
	$blog_items = "";
	$width = 'regular';
?>
<?php $mypost = new WP_Query('category_name=portfolio'); ?>

	<div id="page-portfolio" class="page-portfolio">
		<? while ($mypost->have_posts()) : $mypost->the_post(); ?>
			<?php $post_tags = get_the_tags(get_the_ID()); ?>
			<?php if ( $post_tags[0]->name != 'wide' ): ?>
	<?php /* ?>
			<div class="portfolio-item subhome-item" id="post-<?php the_ID(); ?>">
				<a href="<?php echo get_permalink(); ?>">
					<h2><span><?php the_title(); ?></span></h2>
					<?php the_post_thumbnail(array( 450,200 ), array( 'class' => 'alignleft' )); ?>
					<span class="button round">></span>
				</a>
			</div>
	<?php */ ?>
			<?php else: ?>
			<?php $portfolio_items .= '<div class="portfolio-item portfolio-image-wide-wrapper">
										 <a class="portfolio-image-wide" href="' . get_permalink() . '">
										 	<div>' . get_the_post_thumbnail(get_the_ID(), array( 680,680 ), array( 'class' => 'portfolio-image' )) . '</div>
										 </a>
 										 <div>' . get_the_excerpt() . '</div>
									  </div>' ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<p class="large-text">Hi, My name is Paweł. <br>I design and develop websites and more.<br>Check it out:</p>
	<div class="just-portfolio-items">
		<?php echo $portfolio_items; ?>
	</div>
<?php /*
		<div class="nav view-more-portfolio"> <div class="menu-item "> <a href="#">View More</a> </div> </div> <div id="more-portfolio"> <div style="float:left; padding-top: 80px;"> <h2><span>Miscellaneous projects</span></h2> <div style="width:425px"> <p>Over the past couple of years, I've worked with a lot of cool people on a lot of cool projects. Unfortunately, I can almost never find the time to write down in detail all the processes that are involved in these cases. In the overview below you can see screenshots of some of the projects that I'll be documenting and adding to the portfolio soon.</p> </div> <!-- <div class="portfolio-item unordered"> <h2><span>TNO MIKK</span></h2> <div class="role"><p>HTML<br>Javascript<br>CSS</p></div> <img src="http://imageshack.us/a/img802/4815/mikk04.png" width="425" alt="" /> </div> --> <div class="portfolio-item unordered"> <h2><span>GIRO555 Actiesite</span></h2> <div class="role"><p>HTML<br>Javascript<br>CSS<br>Wordpress</p></div> <img src="http://imageshack.us/a/img585/2645/giro555actiesite04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Festival Classique</span></h2> <div class="role"><p>HTML<br>CSS</p></div> <img src="http://imageshack.us/a/img22/6910/rooster04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Cleverland</span></h2> <div class="role"><p>HTML<br>CSS<br>PHP</p></div> <img src="http://imageshack.us/a/img28/8170/cleverland04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Slim met geld</span></h2> <div class="role"><p>HTML<br>CSS<br>Wordpress</p></div> <img src="http://imageshack.us/a/img826/6003/slimmetgeld04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Achilles</span></h2> <div class="role"><p>HTML<br>CSS</p></div> <img src="http://imageshack.us/a/img526/217/achilles04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>SMP</span></h2> <div class="role"><p>HTML<br>Javascript<br>CSS<br>Wordpress</p></div> <img src="http://imageshack.us/a/img341/7192/smp04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>ITPH</span></h2> <div class="role"><p>HTML<br>CSS</p></div> <img src="http://imageshack.us/a/img94/6951/itph04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Koppig</span></h2> <div class="role"><p>Design<br>HTML<br>Javascript<br>CSS<br>PHP</p></div> <img src="http://imageshack.us/a/img10/4761/koppig04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>FMR</span></h2> <div class="role"><p>Content Updates</p></div> <img src="http://img829.imageshack.us/img829/1816/fmr04.png" alt="" /> </div> <div class="portfolio-item unordered"> <h2><span>Headline Mailing</span></h2> <div class="role"><p>HTML<br>CSS<br>Campaign Monitor</p></div> <img src="http://imageshack.us/a/img23/9654/headnemailing04.png" alt="" /> </div> </div> </div>
*/ ?>



	</div>
<?php get_footer(); ?>