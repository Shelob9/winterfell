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
		<a href="<?php echo esc_url( __( 'http://wordpress.org/') ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform'); ?>"><?php printf( __( 'Powered by %s' ), 'WordPress,' ); ?></a>
		<a href="<?php echo esc_url( __( 'http://ComplexWaveform.com/jp?Winterfell/') ); ?>" title="<?php esc_attr_e( 'Winterfell WordPress Theme by Josh Pollock'); ?>"><?php printf( __( 'using the by %s' ), 'Winterfell Theme.' ); ?></a>
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