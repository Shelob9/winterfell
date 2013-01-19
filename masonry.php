<!-- masonry-wrap -->
<div id="masonry-wrap">

	<?php 
    if (have_posts()) :
        get_template_part( 'loop' , 'entry');
    endif;
    ?>

</div>  
<!-- /masonry-wrap -->
