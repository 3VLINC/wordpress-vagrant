<div class="reach-out">
	
	<h1 class="reach-out--title">Reach Out</h1>

	<div class="reach-out--contacts">
		
		<div class="reach-out--contacts--reception">
			
			<p>
				Reception<br/>
				<a href="tel:<?php echo get_field('reception_phone','option'); ?>"><?php echo get_field('reception_phone','option'); ?></a><br/>
				<?php echo get_field('street_address','option'); ?><br/>
				<?php echo get_field('city','option'); ?>, <?php echo get_field('province','option'); ?> | <?php echo get_field('postal_code','option'); ?>
			</p>

		</div>

		<div class="reach-out--contacts--emergency">
			
			<p>
				Emergency<br/>
				<a href="tel:<?php echo get_field('emergency_phone','option'); ?>"><span class="reach-out--contacts--emergency--call">Call <?php echo get_field('emergency_phone','option'); ?></span></a>
			</p>

		</div>

	</div>

	<p class="reach-out--contact-us"><span class="reach-out--contact-us--label">Contact us:</span> <a href="mailto:<?php echo get_field('reception_email','option'); ?>" class="reach-out--contact-us--email"><span><?php echo get_field('reception_email','option'); ?></span></a>

</div>