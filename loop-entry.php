<?php while (have_posts()) : the_post(); ?>  


<div class="loop-entry four columns panel bubbler" style="background:white;" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        <div class="loop-entry-thumbnail">
            <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
        </div>
  	<div class="loop-entry-details">
    	<h5><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><span style="color:#5D5D5B;"><?php the_title(); ?></span></a></h5>
    	<span style="color:#799E65"><?php  echo excerpt('15'); ?></span>
        <div class="loop-entry-cat">
       		<?php _e('Posted In', 'pronto'); ?>: <?php the_category(' '); ?>
        </div>
    </div>
    <!-- END loop-entry-details -->  

</div><!-- END entry -->


<?php endwhile; ?>