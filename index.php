<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */

?>
<?php get_header(' '); ?>

	
<div class="row" id="mains">
	<div class="twelve columns">
		<div class="three columns panel sidebar" style="float:right;">
			<?php get_sidebar() ?>
		</div>
		<?php get_template_part( 'slider'); ?>

		<div id="masonry-wrap">	
			<?php 
			if (have_posts()) :
				get_template_part( 'loop' , 'entry');
			endif;
			?>

		</div>	
		<!-- /masonry-wrap -->



		
		<div cass="row" style="margin-bottom:14px;">
			<div class="four columns centered">
				<?php if (function_exists("pagination")) {
				pagination();
				} ?>
			</div>	
		</div>
		<!-- /pagination -->






<?php get_footer(' '); ?>