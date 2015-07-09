<?php 

namespace Theme;

if( have_rows('page-sections') ) {

	printf('<div class="parent-page-sections">');

	while(have_rows('page-sections')) {

		the_row();

		printf('<div class="parent-page-sections--section-area">');

			Theme::loadModule('parent-page-section');

		printf('</div>');

	}

	printf('</div>');

}

?>