<?php



function foundation_assets() {

	if (!is_admin()) {

		// Load JavaScripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array(), '1.0', true );
		wp_enqueue_script( 'app', get_template_directory_uri().'/javascripts/app.js', array('foundation'), '1.0', true );

		// Load Stylesheets
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/stylesheets/foundation.min.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array('foundation') );

		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	
	}

}
add_action( 'wp_enqueue_scripts', 'foundation_assets' );



?>