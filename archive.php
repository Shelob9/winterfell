<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */

?>
<?php get_header(' '); ?>


	<div id="masonry-wrap">
		<?php 
		if (have_posts()) :
			get_template_part( 'loop' , 'entry');
		endif;
		?>
		
	
		<!-- /masonry-wrap -->

		<?php if (function_exists("pagination")) { pagination(); } ?>
	 </div>

 </div>
 
<?php get_sidebar() ?>
<?php get_footer(' '); ?>