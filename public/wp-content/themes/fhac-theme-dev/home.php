<?php
	
	namespace Theme; 

	get_header();

?>

<div class="home--content">

<?php 

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			Theme::loadModule('blog-post-excerpt');

		}

	}

?>

</div>

<?php

	get_footer();

?>