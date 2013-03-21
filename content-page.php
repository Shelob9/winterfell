<?php
/**
 * Content Page
 *
 * Loop content in page template (page.php)
 *
 */
?>

<article>

	<header>
		<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>

	<?php if ( has_post_thumbnail()) : ?>
	<div class="post-thumb">
		<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
	</div>
	<?php endif; ?>
	<span style="color:#24221f;">
		<?php the_content(); ?>
	</span
</article>