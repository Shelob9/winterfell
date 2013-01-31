<div class="flex-container">
  <div class="flexslider">
	<ul class="slides">
	<?php
	query_posts(array('category_name' => 'home-slider', 'posts_per_page' => 5));
	if(have_posts()) :
	    while(have_posts()) : the_post();
	?>
		<li>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('thumb'); ?>
			<p class="flex-caption"><?php the_excerpt(); ?></p>
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