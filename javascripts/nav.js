    jQuery(document).ready(function() {
            
            // build <select> dropdown
            jQuery("<select />").appendTo("div.menu-main-menu-container");

            //Create deafult option "Go to..."
            jQuery("<option />", {
                "selected": "selected",
                "value": "",
                "text": "Go to..."  
            }).appendTo(".menu-main-menu-container select");

            //Populate
            jQuery(".menu-main-menu-container ul li a").each(function() {
                var el = jQuery(this);
                    if(el.parents('.menu-main-menu-container ul ul').length) {
                        // if there are ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text':  '- ' + el.text()
                    }).appendTo('.menu-main-menu-container select');
                    } else { // if no ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text': el.text()
                    }).appendTo('.menu-main-menu-container select');
                }
            });

            //make links work 
            jQuery(".menu-main-menu-container select").change(function() {
                window.location = jQuery(this).find("option:selected").val();
            });
    });