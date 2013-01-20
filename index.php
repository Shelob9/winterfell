<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */
$options = get_option( 'Pronto_theme_settings' );
?>
<?php get_header(' '); ?>
<?php get_sidebar(); ?>
<div id="masonry-wrap">

	<div class="nine columns">
		<div class="row">
		<?php 
		if (have_posts()) :
			get_template_part( 'loop' , 'entry');
		endif;
		?>
   		</div>
	</div>
 
<!-- /masonry-wrap -->
</div><!--clearfix? -->
<?php if (function_exists("pagination")) { pagination(); } ?>
</div> 
<?php get_footer(' '); ?>