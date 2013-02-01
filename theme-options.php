$thistab = array(
    "name" => "colors_and_images",
    "title" => __("Colors and Images","upfw"),
    "sections" => array(
        "color_scheme" => array(
            "name" => "color_scheme",
            "title" => __( "Color Scheme", "upfw" ),
            "description" => __( "Select your color scheme.","upfw" )
        )
    )
);
register_theme_option_tab($thistab);
        
$options = array(
    "theme_color_scheme" => array(
        "tab" => $thistab["name"],
        "name" => "theme_color_scheme",
        "title" => "Theme Color Scheme",
        "description" => __( "Display header navigation menu above or below the site title/description?", "upfw" ),
        "section" => "color_scheme",
        "since" => "1.0",
        "id" => "color_scheme",
        "type" => "select",
        "default" => "light",
        "valid_options" => array(
            "light" => array(
                "name" => "light",
                "title" => __( "Light", "upfw" )
            ),
            "dark" => array(
                "name" => "dark",
                "title" => __( "Dark", "upfw" )
            )
        )
    )
    "theme_hyperlink_color" => array(
        "tab" => $thistab["name"],
        "name" => "theme_hyperlink_color",
        "title" => "Theme Hyperlink Color",
        "description" => __( "Default hyperlink color.", "upfw" ),
        "section" => "color_scheme",
        "since" => "1.0",
        "id" => "color_scheme",
        "type" => "color",
        "default" => "#ffffff"
    )
);
        
register_theme_options($options);