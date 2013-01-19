<?php
/**
 * Content
 *
 * Displays content shown in the 'index.php' loop, default for 'standard' post format
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<!-- ORBIT --!>
<div class="panel callout radius" id="featuredContent">
		<?php if ( have_posts() ) : ?>
		<?php query_posts('category_name=featured'); ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<div>
			<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('orbit-slide'); ?></a>
			<?php endif; ?>
			
			<?php the_excerpt(); ?>
		</div>
		<?php endwhile ?>
		<?php endif ?>
</div>




