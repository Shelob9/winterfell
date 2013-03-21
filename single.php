<?php
/**
 * Single
 *
 * Loop container for single post content
 *
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>

    <!-- Main Content -->
    <div class="nine columns panel callout radius" role="content" style="background:#D8D2B1; border:1px solid #799E65;">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->
<div class="three columns panel">
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>