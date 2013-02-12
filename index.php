<?php
/**
 * @package WordPress
 * @subpackage Pronto Theme
 */

?>
<?php get_header(' '); ?>
<?php
//Clearfix needed for Masonry to display right, but can not precede slider.
	
	if (  !is_home() ) {?>
	<div class="row id="main">
	<div class="nine columns" >
	<?php } ?>

<?php
//Do slider only if is home page.
if (  is_home() ) {?>
<div class="nine columns" >	
		<?php get_template_part( 'slider'); ?>

	
	
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
		<div class="four columns centered">
			<?php if (function_exists("pagination")) { pagination(); } ?>
		</div>	
	</div>
<!-- /pagination -->






</div>
<?php get_sidebar() ?>
<?php get_footer(' '); ?>