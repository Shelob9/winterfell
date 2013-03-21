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


<!-- End Page -->





<!-- Footer -->
<footer>
	<div class="row">
		
		<div class="twelve columns">
			<div class="row" id="footer-widgets">
				<div class="three columns panel radius">
					<?php if ( dynamic_sidebar('Sidebar Footer One')  ) : else : ?>
						<h5>Pages</h5>
						<ul>
						<?php wp_list_pages('title_li='); ?>
						</ul>
					<?php endif ?>
				</div>
	
				<div class="three columns panel radius">
					<?php if ( dynamic_sidebar('Sidebar Footer Two')  ) : else : ?>
						<h5>Tags</h5>
						<?php
						if(get_the_tag_list()) {
							echo get_the_tag_list('<p><span class="secondary label radius">','</span>&nbsp;<span class="secondary label radius">','</span></p>');
						}
						?>
					<?php endif ?>
				</div>

				<div class="three columns panel radius">
					<?php if ( dynamic_sidebar('Sidebar Footer Three')  ) : else : ?>
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
				
				<div class="three columns panel radius">
					<?php if ( dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>
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
		</div>
	</div>
	<div class="row">
		<div class="eight columns centered">
			<?php echo wf_copyright(); ?> by
			<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>.
		</div>
	</div>
		
	
</footer>
<!-- End Footer -->

</div><!--#Total-Wrap -->
<?php wp_footer(); ?>
</body>
</html>