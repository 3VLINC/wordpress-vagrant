<?php namespace Theme; ?>

<header class="page-header">

	<div class="page-header--contact">
		
		<p class="page-header--address">

			<a href="tel:<?php echo get_field('reception_phone', 'option') ?>"><?php echo get_field('reception_phone', 'option') ?></a><br />

			<?php echo get_field('street_address','option'); ?><br/><?php echo get_field('city','option'); ?>, <?php echo get_field('province','option'); ?> | <?php echo get_field('postal_code','option'); ?>

		</p>

		<p class="page-header--emergency-info">

			In case of emergency, call<br />

			<a href="tel:<?php echo get_field('emergency_phone','option'); ?>"><?php echo get_field('emergency_phone','option'); ?></a>

		</p>

	</div>

	<div class="page-header--main">
	
		<div class="page-header--main--wrapper">

			<div class="page-header--title">
				
				<a href="<?php echo home_url(); ?>"><span><?php echo get_bloginfo('title'); ?></span></a>

			</div>

			<div class="page-header--social-menu">
				
				<?php Theme::loadModule('social-menu'); ?>

			</div>

			<div class="page-header--menu">

				<?php Theme::loadModule('main-menu', array('top_bar' => true)); ?>

			</div>

		</div>

	</div>

</header>