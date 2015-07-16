<?php 

	namespace Theme; 

	Theme::loadModule('header');

	printf('<div class="four-oh-four--content">');

?>
	<h1 class="four-oh-four--heading">You seem to be lost.</h1>

	<p class="four-oh-four--sub-heading">Should we poster the neighbourhood?!</p>

	<p class="four-oh-four--text">This is a 404 error. It’s okay though. Take a walk back <a href="<?php echo home_url('/'); ?>">HOME</a> or <a href="mailto:<?php echo get_field('reception_email', 'option') ?>">REPORT THE ERROR</a> if a page is missing.  </p>

	<div class="four-oh-four--image">

		<img src="<?php echo get_template_directory_uri(); ?>/images/fhac-404.jpg" width="747" height="500" alt="" />

	</div>

<?php

	printf('</div>');

	Theme::loadModule('footer');

?>