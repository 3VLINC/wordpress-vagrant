<?php
	
	namespace Theme; 

	Theme::loadModule('header');

?>

<div class="index--content">

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

	Theme::loadModule('footer');

?>