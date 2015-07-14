<?php 

 $image = get_sub_field('banner');

 $image_html = '';

 if($image = get_sub_field('banner'))
 {

 	$image_html = sprintf('<div class="parent-page-section--banner"><img src="%s" height="%s" width="%s" /></div>', $image['sizes']['banner'], $image['sizes']['banner-height'], $image['sizes']['banner-width']);

 }

printf('<section id="%s" class="parent-page-section">%s<h1 class="parent-page-section--title">%s</h1><div class="parent-page-section--content">%s</div><div class="parent-page-section--back"><a href="#parent-page-sections-menu">Back to top</a></div></section>', get_sub_field('anchor'), $image_html, get_sub_field('title'), get_sub_field('content'));

?>