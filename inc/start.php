<?php
/**
* Used in index.php, archive.php and /templates/sidebar-left.php 
* to set up column structure and call sidebar.
* Copypastaed in /templates/full-page.php
* to set up column structure WITHOUT a sidebar
**/
?>
<!-- Begin Page -->


<div class="row">

<?php if (  !is_home() ) {?>
<div class="nine columns " class="clearfix">
<?php } ?>
<?php if (  is_home() ) {?>
<div class="nine columns">
<?php } ?>