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
<?php if ( have_posts() ) : ?>
<?php query_posts('category_name=special_cat&posts_per_page=10'); ?>
			<?php while ( have_posts() ) : the_post(); ?>

		
	<?php if ( has_post_thumbnail('orbit-slide')) : ?>
	<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>

	<?php the_excerpt(); ?>
	
	<?php endwhile ?>
		</div>




