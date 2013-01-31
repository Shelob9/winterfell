<?php while (have_posts()) : the_post(); ?>  
<?php if(has_post_thumbnail() ) { ?>
<div class="loop-entry">
        <div class="loop-entry-thumbnail">
            <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
        </div>
  	<div class="loop-entry-details">
    	<h4><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
    	<?php  echo excerpt('15'); ?>
        <div class="loop-entry-cat">
       		<?php _e('Posted In', 'pronto'); ?>: <?php the_category(' '); ?>
        </div>
    </div>
    <!-- END loop-entry-details -->  
</div><!-- END entry -->

<?php } ?>
<?php endwhile; ?>
