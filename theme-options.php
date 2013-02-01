<?php

$home_slider = array(
	"name" => "home_slider",
	"title" => __("Home Page Slider","upfw"),
	'sections' => array(
		'color_scheme' => array(
			'name' => 'home_slider',
			'title' => __( 'Home Page Slider', 'upfw' ),
			'description' => __( 'Options.','upfw' )
		)
	)
);

register_theme_option_tab($home_slider);

 //*
// * The following example shows you how to register theme options and assign them to tabs:

$options = array(
  'theme_color_scheme' => array(
  	"tab" => "home_slider",
  	"name" => "theme_color_scheme",
  	"title" => "Theme Color Scheme",
  	"description" => __( "Select a color scheme for your website", "example" ),
  	"section" => "color_scheme",
  	"since" => "1.0",
      "id" => "color_scheme",
      "type" => "select",
      "default" => "light",
      "valid_options" => array(
      	"light" => array(
      		"name" => "light",
      		"title" => __( "Light", "example" )
      	),
      	"dark" => array(
      		"name" => "dark",
      		"title" => __( "Dark", "example" )
      	)
      )
  ),
  "theme_footertext" => array(
  	"tab" => "home_slider",
  	"name" => "theme_footertext",
  	"title" => "Theme Footer Text",
  	"description" => __( "Enter text to be displayed in your footer", "example" ),
  	"section" => "color_scheme",
  	"since" => "1.0",
      "id" => "color_scheme",
      "type" => "text",
      "default" => "Copyright 2012 UpThemes"
  )
);

register_theme_options($options);

/**
 * The different types of options you can define are: text, color, image, select, list, multiple, textarea, page, pages, category, categories
 * 
 **/

?>