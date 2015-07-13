<?php
	
	namespace Theme; 

	Theme::loadModule('header');

?>	

<div class="front-page--intro">
	
		<h1 class="front-page--intro--title">Welcome to the Forest Hill Animal Clinic family</h1>

		<p class="front-page--intro--tagline">Your trusted Toronto Veterinarian for more than 45 years.</p>

		<p class="front-page--intro--now-accepting">Now accepting new patients. Cats and dogs welcome.</p>


</div>

<div class="front-page--content">

<?php 

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			the_content();

		}

	}

?>

</div>

<?php

	Theme::loadModule('footer');

?>