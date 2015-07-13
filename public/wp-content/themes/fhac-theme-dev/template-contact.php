<?php 

	namespace Theme; 

	/* Template Name: Contact */

	Theme::loadModule('header');

	printf('<div class="contact--content">');

	Theme::loadModule('contact-tools');

	Theme::loadModule('contact-info');

	printf('</div>');

	Theme::loadModule('footer', array('hide_sidebar' => true));

?>