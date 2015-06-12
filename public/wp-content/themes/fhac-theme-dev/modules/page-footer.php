<?php namespace Theme; ?>

<footer class="page-footer">

	<div class="page-footer--menus">
		
		<div class="page-footer--menu">
			
			<?php Menus::MainMenu(); ?>

		</div>

		<div class="page-footer--social-menu">

			<?php Theme::loadModule('social-menu'); ?>

		</div>

	</div>

	<div class="page-footer--contact">
		
		<div class="page-footer--extended-logo-area">
			
			<div class="page-footer--extended-logo">

				<span>Forest Hill Animal Clinic</span>

			</div>

		</div>

		<div class="page-footer--reach-out-area">

			<?php Theme::loadModule('reach-out'); ?>

		</div>

	</div>

	<div class="page-footer--credits">
		
		<div class="page-footer--credits--text">
			
			<p>2015 &copy; Forest Hill Animal Clinic  |  Made in Toronto by <a href="http://ballyhoodesign.co">Ballyhoo Graphic Design</a></p>

		</div>

	</div>

</footer>