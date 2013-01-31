<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>

</div>
<!-- End Page -->





<!-- Footer -->
<footer>
	<div class="row">
		
		<div class="twelve columns panel radius callout">
		<?php if (  !is_home() ) {?>
			<div class="row">
				<?php if ( dynamic_sidebar('Sidebar Footer One') && dynamic_sidebar('Sidebar Footer Two') && dynamic_sidebar('Sidebar Footer Three') && dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>
				<div class="twelve columns">
					<ul class="link-list">
						<?php wp_list_bookmarks('categorize=0&title_li='); ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		<?php }?>
		<?php if (  is_home() ) {?>
		<div class="row" id="home-footer-widgets">
				<div class="four columns   panel radius">
					<?php if ( dynamic_sidebar('Home Widget One')  ) : else : ?>
						<h5>Pages</h5>
						<ul>
						<?php wp_list_pages('title_li='); ?>
						</ul>
					<?php endif ?>
				</div>
		
			<div class="four columns  panel radius">
				<?php if ( dynamic_sidebar('Home Widget Two')  ) : else : ?>
					<h5>Tags</h5>
					<?php
					if(get_the_tag_list()) {
						echo get_the_tag_list('<p><span class="secondary label radius">','</span>&nbsp;<span class="secondary label radius">','</span></p>');
					}
					?>
				<?php endif ?>
			</div>

			<div class="four columns panel radius">
				<?php if ( dynamic_sidebar('Home Widget Two')  ) : else : ?>
					<h5>Recent Posts</h5>
						<ul>
						<?php
						$recent_posts = wp_get_recent_posts();
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
							}
						?>
						</ul>
				<?php endif ?>
			</div>
		</div>
	


		<?php }?>
	
			<div class="row">
				<div class="eight columns centered">
					<?php echo comicpress_copyright(); ?> by
					<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>.
					&#8226; Powered by <a href="http://WordPress.org" title="WordPress">WordPress</a>
					&#8226; <a href="http://ComplexWaveform.com/Winterfell" Title="Winterfell WordPress Theme: Winter Is Coming...">Winterfell Theme by <a href="http://ComplexWaveform.com" Title="Josh Pollock: ComplexwaveForm">Josh Pollock</a>.
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- End Footer -->

</div><!--#Total-Wrap -->
<?php wp_footer(); ?>
</body>
</html>