jQuery(function($){
	$(document).ready(function(){
		
		//masonry
		$('#masonry-wrap').masonry({
		  itemSelector: '.loop-entry',
			  isAnimated: true,
			  animationOptions: {
				duration: 200,
				easing: 'linear',
				queue: false
			  }
			  
	

		});
		
		jQuery(document).ready(function($) { //noconflict wrapper
    $('input#submit').addClass('button');
});//end noconflict


		
	
	}); // END doc ready
}); // END function