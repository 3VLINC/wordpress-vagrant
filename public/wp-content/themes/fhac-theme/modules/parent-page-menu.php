<?php 

if( have_rows('page-sections') ) {

	$anchors = array();

	while(have_rows('page-sections')) {

		 the_row();

		 $anchors[] = sprintf('<li class="parent-page-menu--list-item"><a href="#%s">%s</a></li>', get_sub_field('anchor'), get_sub_field('title'));

	}

	if(!empty($anchors)) {

		printf('
			<div id="parent-page-sections-menu" class="parent-page-menu">
				
				<ul class="parent-page-menu--list">
				
					<li class="parent-page-menu--list-item parent-page-menu--list-label">Jump to: </li>

					%s

				</ul>

			</div>', implode('<li class="parent-page-menu--list-divider">&nbsp;|&nbsp;</li>', $anchors));

	}



}

?>