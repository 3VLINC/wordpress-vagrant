<?php namespace Theme; ?>

<header class="page-header">

	<div class="page-header--contact">
		
		<p class="page-header--address">

			<a href="tel:416-782-1031">416-782-1031</a><br />

			1049 Eglinton Avenue West<br/>Toronto, Ontario | M6C 2C9

		</p>

		<p class="page-header--emergency-info">

			In case of emergency, call<br />

			<a href="tel:416-784-4444">416-784-4444</a>

		</p>

	</div>

	<div class="page-header--main">
	
		<div class="page-header--main--wrapper">

			<div class="page-header--title">
				
				<span>Forest Hill Animal Clinic</span>

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