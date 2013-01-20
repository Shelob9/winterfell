<?php while (have_posts()) : the_post(); ?>  


<div class="loop-entry four columns">
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


<?php endwhile; ?>