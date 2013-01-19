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
    <div class="nine columns" role="content">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<!-- masonry-wrap -->
<div id="masonry-wrap">

	<?php 
    if (have_posts()) : ?>
        
			<div class="loop-entry">
					<div class="loop-entry-thumbnail">
						<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
					</div>
				<div class="loop-entry-details">
					<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php  echo excerpt('15'); ?>
					<div class="loop-entry-cat">
						<?php _e('Posted In', 'pronto'); ?>: <?php the_category(' '); ?>
					</div>
				</div>
				<!-- END loop-entry-details -->  
			</div><!-- END entry -->

			
			

</div>  
<!-- /masonry-wrap -->
			

		

		<?php foundation_pagination(); ?>

    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>