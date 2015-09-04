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

		<?php 

			if(($parking_heading = get_field('parking_heading')) && ($parking_information = get_field('parking_information')))
			{

				printf(
					'
					<div class="contact--tools--module contact--tools--module--parking">
						
						<div class="contact--tools--parking">
				
							<h1 class="contact--tools--parking--title">%s</h1>
							
							%s

						</div>

					</div>
					',
					$parking_heading,
					$parking_information
				);

			}

		?>
		

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
				
				<?php 

					if($email_heading = get_field('email_heading')) {

						printf(
							'<div class="contact--details--email"><h1><a href="mailto:%s"><span>%s</span></a></h1></div>',
							get_field('reception_email', 'option'),
							$email_heading
						);

					} 

				?>

				<?php 

					if(($emergency_information = get_field('emergency_information')) && ($emergency_heading = get_field('emergency_heading'))) {

						printf('<div class="contact--details--emergency"><h1>%s</h1>%s</div>', $emergency_heading, $emergency_information);

					}
				?>

				<?php 

					if(($pet_photo_information = get_field('pet_photo_information')) && ($pet_photo_heading = get_field('pet_photo_heading'))) {

						printf('<div class="contact--details--pet-photo"><h1>%s</h1>%s</div>', $pet_photo_heading, $pet_photo_information);

					}
				?>

			</section>

		</div>

		<div class="contact--info--module">
			
			<?php 

				$address = urlencode(
					sprintf(
						'%s %s %s %s',
						get_field('street_address','option'),
						get_field('city','option'),
						get_field('province','option'),
						get_field('postal_code','option')
					)
				);

				printf(
					'<a href="https://www.google.com/maps?f=d&saddr&daddr=%s">
						<img src="https://maps.googleapis.com/maps/api/staticmap?center=%s&zoom=14&size=500x500&markers=color:red%%7Clabel:A%%7C%s">
					</a>',
					$address,
					$address,
					$address
				);

			?>

		</div>

	</div>

<?php

	printf('</div>');

	Theme::loadModule('footer', array('hide_sidebar' => true));

?>