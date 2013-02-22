jQuery(function($){
	$(document).ready(function(){
	
	$.Mason.prototype.resize = function() {
    this._getColumns();
    this._reLayout();
  };
  
  $.Mason.prototype._reLayout = function( callback ) {
    var freeCols = this.cols;
    if ( this.options.cornerStampSelector ) {
      var $cornerStamp = this.element.find( this.options.cornerStampSelector ),
          cornerStampX = $cornerStamp.offset().left - 
            ( this.element.offset().left + this.offset.x + parseInt($cornerStamp.css('marginLeft')) );
      freeCols = Math.floor( cornerStampX / this.columnWidth );
    }
    // reset columns
    var i = this.cols;
    this.colYs = [];
    while (i--) {
      this.colYs.push( this.offset.y );
    }

    for ( i = freeCols; i < this.cols; i++ ) {
      this.colYs[i] = this.offset.y + $cornerStamp.outerHeight(true);
    }

    // apply layout logic to all bricks
    this.layout( this.$bricks, callback );
  };
});//end noconflict	
	}); // END doc ready
}); // END function


jQuery(function($){
	$(document).ready(function(){
		
		//masonry
		$('#masonry-wrap').masonry({
		
		  itemSelector: '.loop-entry',
		  cornerStampSelector: '.sidebar',
		  
			  isAnimated: true,
			  animationOptions: {
				duration: 200,
				easing: 'linear',
				queue: false
			  },
		columnWidth: function( containerWidth ) {
    	return containerWidth / 5;
		  }

			  
	

		});
		
		jQuery(document).ready(function($) { //noconflict wrapper
    $('input#submit').addClass('button');
});//end noconflict


		
	
	}); // END doc ready
}); // END function