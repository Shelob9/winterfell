<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>


<!-- End Page -->





<!-- Footer -->
<footer>
	
	<div class="row">
		<div class="eight columns centered">
			<?php echo wf_copyright(); ?> by
			<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>.
		</div>
	</div>
		
	
</footer>
<!-- End Footer -->

</div><!--#Total-Wrap -->
<?php wp_footer(); ?>
</body>
</html>