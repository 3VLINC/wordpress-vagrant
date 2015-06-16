<?php
	
	namespace Theme; 

	get_header();

?>	

<div class="index--intro">
	
		<h1 class="index--intro--title">Welcome to the Forest Hill Animal Clinic family</h1>

		<p class="index--intro--tagline">Your trusted Toronto Veterinarian for more than 45 years.</p>

		<p class="index--intro--now-accepting">Now accepting new patients. Cats and dogs welcome.</p>


</div>

<div class="index--content">

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

	get_footer();

?>