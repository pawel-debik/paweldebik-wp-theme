		</div>
	</div>
	<footer class="footer">
		<?php if ( is_user_logged_in() ): ?>
			<div class="page-wrap">
				<div class="center-content">
					<!-- <span class="toggle-label">Dark theme: </span>
					<label class="switch">
						<input id="theme-selector-footer" class="theme-selector" type="checkbox" checked>
						<span class="slider round"></span>
					</label> -->
				</div>
			</div>
		<?php endif; ?>
		<button style="opacity: 0;" class="talk">talk</button>
	</footer>
	<?php wp_footer(); ?>
	<?php /*><div id="livebuild">I know my site looks broken! Why did I upload an unfinished site? <a href="http://mattkersley.com/development/screw-conventions-baby-this-is-my-site/" target="_blank">Matt Kersley</a> did it too, so I figured why not me as well.</div>*/?>
	<?php echo get_post_image(); ?>
</body>
</html>