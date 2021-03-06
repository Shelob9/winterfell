<?php
/**
 * Author Box
 * @since Foundation, for WordPress 1.0
 */
?>

<section class="row">
	<div class="twelve columns">

		<div class="panel radius author-box">
			<a class="th" href="<?php get_the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'),'55' ); ?></a>
			<h5><?php _e('About', 'foundation' ); ?> <?php the_author_link(); ?></h5>
			<p>
				<?php echo get_the_author_meta('description'); ?>
			</p>
		</div>
		
	</div>
</section>