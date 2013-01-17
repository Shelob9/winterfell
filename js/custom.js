jQuery(function($){
	$(document).ready(function(){
		
		//masonry
		$('#masonry-wrap').masonry({
		  itemSelector: '.loop-entry',
			  isAnimated: true,
			  animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			  }
		});

		//prettyPhoto
		$(".prettyphoto-link").prettyPhoto({
				animation_speed:'normal',
				allow_resize: true,
				keyboard_shortcuts: true,
				show_title: false,
				social_tools: false,
				autoplay_slideshow: false
			});
	
	}); // END doc ready
}); // END function