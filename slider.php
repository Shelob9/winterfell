

<div class="flex-container">
  <div class="flexslider">
	<ul class="slides">
	<?php
	$cat = get_option('winterfell_theme_options');
  	$cat['slide-cat'];
  	$args = array(
		'category'=> $cat
		
	);
	query_posts( $args );
	if(have_posts()) :
	    while(have_posts()) : the_post();
	?>
		<li>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('thumb'); ?>
			<?php the_excerpt(); ?>
			</a>
		</li>
	<?php
	endwhile;
	endif;
	wp_reset_query();
	?>
	</ul>
  </div>
</div>