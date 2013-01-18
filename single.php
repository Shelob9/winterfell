<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post clearfix">

    <div class="post-meta">
    
		<div class="post-meta-next-prev">
       		<?php previous_post_link('%link', 'Prev'); ?><?php next_post_link('%link', ' - Next'); ?>
        </div>
    
    	<div class="post-meta-top">
        	<span class="meta-date"><?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></span>
        	<span class="meta-category"><?php the_category(' '); ?></span>
        	<span class="meta-author"><?php the_author_posts_link(); ?></span>
        </div>
        
    </div>
    <!-- END post-meta --> 

	<?php
    if (has_post_thumbnail() ) {
		//get full-sized image
		$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
	?>
		<div class="post-thumbnail">
			<a href="<?php echo $full_img[0]; ?>" title="<?php the_title(); ?>" class="prettyphoto-link"><?php the_post_thumbnail('post-full'); ?></a>
		</div>
		<!-- END post-thumbnail -->
	<?php } ?>

    <div class="entry clearfix">
        
	<h1><?php the_title(); ?></h1>
      
		<?php the_content(); ?>
        <div class="clear"></div>
        
        <?php wp_link_pages(' '); ?>
         
        <div class="post-bottom">
        	<?php the_tags('<div class="post-tags">',' , ','</div>'); ?>
        </div>
        <!-- END post-bottom -->
        
        
        </div>
        <!-- END entry -->
	
	<?php comments_template(); ?>
   
        
</div>
<!-- END post -->

<?php endwhile; ?>
<?php endif; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>