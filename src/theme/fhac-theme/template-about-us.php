<?php 

	namespace Theme; 

	/* Template Name: About Us */

	get_header();

	printf('<div class="about-us--content">');

	if(!isset($_GET['field_name']) && !isset($_GET['id']))
	{
		
		if(have_posts()) { 

			while(have_posts()) {

				the_post();

				the_content();

			}

		}

		printf('<div id="our-doctors" class="about-us--doctors-area">%s</div>',
			Theme::loadModule(
				'about-us-persons', 
				array(
					'field_name' => 'doctors',
					'title' => 'Our Doctors'
				), 
				true
			)
		);

		printf('<div id="our-technicians" class="about-us--technicians-area">%s</div>',
			Theme::loadModule(
				'about-us-persons', 
				array(
					'field_name' => 'technicians',
					'title' => 'Our Registered Veterinary Technicians'
				), 
				true
			)
		);

		printf('<div id="our-support-team" class="about-us--support-team-area">%s</div>',
			Theme::loadModule(
				'about-us-persons', 
				array(
					'field_name' => 'support_team',
					'title' => 'Our Support Team'
				), 
				true
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

	printf('</div>');

	get_footer();

?>