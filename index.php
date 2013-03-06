<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */

?>
<?php get_header(' '); ?>

	
<div class="row" id="mains">
	<div class="twelve columns">
		
		<?php if (is_home() )
		{ get_template_part( 'slider'); }
		?>
	
		<div class="nine columns" id="masonry-wrap">	
			<?php 
			if (have_posts()) :
				get_template_part( 'loop' , 'entry');
			endif;
			?>
		</div>
		<!-- /masonry-wrap -->
			
		
		<!-- /pagination -->
		<div class="three columns panel radius sidebar">
			<?php get_sidebar() ?>
		</div>
		<hr />
		<div cass="row" style="margin-bottom:14px;">
				<div class="four columns centered">
					<?php if (function_exists("pagination")) {
					pagination();
					} ?>
				</div>	
			</div>
<?php get_footer(' '); ?>