<?php get_header(); ?>


    <!-- Main Content -->
    <div class="nine columns" role="content">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->
<div class="three columns panel">
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>