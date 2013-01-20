<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */
$options = get_option( 'Pronto_theme_settings' );
?>
<?php get_header(' '); ?>

<!-- Main Content -->
    <div class="nine columns" role="content">
		<?php if ( ! is_single() ) {?>

			<ul class="block-grid six-up mobile-two-up">

		<?php }?>

<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php endwhile; ?>
		
		<?php else : ?>

			<h2><?php _e('No posts.', 'foundation' ); ?></h2>
			<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
			
		<?php endif; ?>

		<?php foundation_pagination(); ?>

    </div>
<?php if ( ! is_single() ) {?>

			</ul>

		<?php }?>		
		
    <!-- End Main Content -->
    <?php get_sidebar(); ?>
<?php get_footer(' '); ?>