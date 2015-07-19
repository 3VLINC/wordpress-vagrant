<section class="directions">
	
	<h1 class="directions--title">Get Directions</h1>

	<form class="directions--form" data-google-directions>
		
		<div class="directions--address directions--address--from">
			
			<label><span>From</span></label>
			
			<div class="directions--address--field">
			
				<input data-google-directions-from type="text" />

			</div>

		</div>

		<div class="directions--address directions--address--to">

			<label><span>To</span></label>
			
			<div class="directions--address--field">

				<input data-google-directions-to type="text" value="<?php printf(
					'%s, %s, %s, %s',
					get_field('street_address','option'), 
					get_field('city','option'),
					get_field('province','option'),
					get_field('postal_code','option')); ?>" readonly />
			
			</div>

		</div>

		<div class="directions--submit">
			
			<button class="directions--submit-button"><span>Submit</span></button>

		</div>

	</form>

</section>