<?php
	
	namespace Theme; 

	Theme::loadModule('header');

?>

<div class="single-post--content">

<?php 

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			Theme::loadModule('blog-post-full');

		}

	}

?>

</div>

<?php

	Theme::loadModule('footer');

?>