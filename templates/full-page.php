<?php

/*
 * Template Name: Full Page Template
 */

get_header(); ?>


    <!-- Main Content -->
    <div class="twelve columns panel callout radius" role="content" style="background:#D8D2B1; border:1px solid #799E65;">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->

<?php get_footer(); ?>