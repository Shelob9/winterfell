<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>
<?php $options = get_option( 'Pronto_theme_settings' ); ?>
    <!-- Main Content -->
    <div class="row" id="home-top">
    	<div class="three columns" id="home-social">
			<?php get_template_part( 'social'); ?>
		</div>
    
    	<div class="nine columns" id="home-orbit">
			<?php get_template_part( 'orbit'); ?>
		</div>
		

    </div>
    
    
    <!-- End Main Content -->
<!-- home footer -->
<div class="row" id="home-footer-widgets">

	<div class="twelve columns" id="home-footer-widgets">
		
			<div class="three columns offset-by-one home-widget">
				<?php if ( dynamic_sidebar('Home Widget One')  ) : else : ?>
					<h5>Pages</h5>
					<ul>
					<?php wp_list_pages('title_li='); ?>
					</ul>
				<?php endif ?>
			</div>
		
		<div class="three columns offset-by-one home-widget">
			<?php if ( dynamic_sidebar('Home Widget Two')  ) : else : ?>
				<h5>Tags</h5>
				<?php
				if(get_the_tag_list()) {
					echo get_the_tag_list('<p><span class="secondary label radius">','</span>&nbsp;<span class="secondary label radius">','</span></p>');
				}
				?>
			<?php endif ?>
		</div>

		<div class="three columns offset-by-one home-widget">
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


</div>


<?php wp_footer(); ?>
</body>
</html>