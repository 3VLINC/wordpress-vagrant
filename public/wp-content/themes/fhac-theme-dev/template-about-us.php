<?php namespace Theme;  ?>

<?php /* Template Name: About Us */ ?>

<?php

	get_header();

	if(!isset($_GET['field_name']) && !isset($_GET['id']))
	{

?>

	<div class="about-us--content">

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

		Theme::loadModule(
			'about-us-persons', 
			array(
				'field_name' => 'doctors',
				'title' => 'Our Doctors'
			)
		);

		Theme::loadModule(
			'about-us-persons', 
			array(
				'field_name' => 'technicians',
				'title' => 'Our Registered Veterinary Technicians'
			)
		);

		Theme::loadModule(
			'about-us-persons', 
			array(
				'field_name' => 'support_team',
				'title' => 'Our Support Team'
			)
		);

	}
	else
	{

		Theme::loadModule(
			'about-us-person',
			array(
				'field_name' => $_GET['field_name'],
				'id' => $_GET['id']
			)
		);

	}

?>

<?php

	get_footer();

?>