<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */
$options = get_option( 'Pronto_theme_settings' );
?>
<?php get_header(' '); ?>
<?php if (  is_home() ) {?>
	<div class="row">
		
				<?php get_template_part( 'slider'); ?>
		
	</div>
	<div class="row">
<?php } ?>
<div id="masonry-wrap">

	
		
		<?php 
		if (have_posts()) :
			get_template_part( 'loop' , 'entry');
		endif;
		?>
   		
 </div>	
<!-- /masonry-wrap -->
<hr />
	<div cass="row" style="margin-bottom:4px;">
		<div class="four columns centered panel radius">
			<?php if (function_exists("pagination")) { pagination(); } ?>
		</div>	
	</div>
<!-- /pagination -->

 <?php if (  is_home() ) {?>

</div>
<?php } ?>

 </div>
 <?php get_sidebar() ?>
<?php get_footer(' '); ?>