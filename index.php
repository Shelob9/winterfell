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
			<div class="four columns centered">
				<?php if (function_exists("pagination")) { pagination(); } ?>
			</div>	
		</div>
		<!-- /pagination -->




<<<<<<< HEAD

</div>
<?php get_sidebar() ?>
=======
		
	</div>
</div>
>>>>>>> mason3

<?php get_footer(' '); ?>