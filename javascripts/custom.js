jQuery(function($){
	$(document).ready(function(){
		
		//masonry
		$('#masonry-wrap').masonry({
		  itemSelector: '.loop-entry',
			  isAnimated: true,
			    columnWidth: function( containerWidth ) {
    return containerWidth / 3;
  }
		});

		
	
	}); // END doc ready
}); // END function