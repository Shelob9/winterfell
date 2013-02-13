jQuery(function($){
	$(document).ready(function(){
		
		

  $(function(){
    
    $('#masonry-wrap').masonry({
      itemSelector: '.loop-entry',
      gutterWidth: '10',
      isFitWidth: 'false',
      isAnimated:true,
      columnWidth: function( containerWidth ) {
    return containerWidth / 4;
  }
      cornerStampSelector: '.sidebar'
      }
    });
    
  });
  
  
		
		jQuery(document).ready(function($) { //noconflict wrapper
    $('input#submit').addClass('button');
});//end noconflict


		
	
	}); // END doc ready
}); // END function