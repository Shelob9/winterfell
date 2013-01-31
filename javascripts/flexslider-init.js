(function($) {
    $(window).load(function() {
        $('.flexslider').flexslider({
	            animation: 'slide',
	            controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
		    	controlsContainer: '.flex-nav'
	    });
    });
})(jQuery)