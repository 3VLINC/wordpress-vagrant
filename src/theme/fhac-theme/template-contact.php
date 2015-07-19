<?php 

	namespace Theme; 

	/* Template Name: Contact */

	Theme::loadModule('header');

	printf('<div class="contact--content">');

?>

	<div class="contact--tools">

		<div class="contact--tools--module contact--tools--module--hours">
			
			<?php Theme::loadModule('hours'); ?>

		</div>

		<div class="contact--tools--module contact--tools--module--directions">
			
			<?php Theme::loadModule('directions'); ?>

		</div>

		<div class="contact--tools--module contact--tools--module--parking">
			
			<div class="contact--tools--parking">
	
				<h1 class="contact--tools--parking--title">Parking</h1>
				
				<?php echo get_field('parking_information'); ?>

			</div>

		</div>

	</div>

	<div class="contact--info">
		
		<div class="contact--info--module">
			
			<section class="contact--details">
	
				<?php 

					if(have_posts())
					{

				?>
					
				<div class="contact--details--entry">

					<?php 

							while(have_posts()) {
								
								the_post();

								the_content();

							}

					?>

				</div>

				<?php


					}
				
				?>

				<?php if($policy_information = get_field('policy_information')) printf('<div class="contact--details--policies">%s</div>', $policy_information); ?>
				

				<div class="contact--details--email">
					
					<h1><a href="mailto:<?php echo get_field('reception_email', 'option'); ?>"><span>Email Us</span></a></h1>

				</div>


				<?php 

					if($emergency_information = get_field('emergency_information')) {

						printf('<div class="contact--details--emergency"><h1>Emergency</h1>%s</div>', $emergency_information);

					}
				?>

				<?php 

					if($pet_photo_information = get_field('pet_photo_information')) {

						printf('<div class="contact--details--pet-photo"><h1>Submit a Photo of Your Pet!</h1>%s</div>', $pet_photo_information);

					}
				?>

			</section>

		</div>

		<div class="contact--info--module">
			
			<?php Theme::loadModule('twitter-feed'); ?>

		</div>

	</div>

<?php

	printf('</div>');

	Theme::loadModule('footer', array('hide_sidebar' => true));

?>