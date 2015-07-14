<?php
	
	namespace Theme; 

	Theme::loadModule('header');

?>

<div class="index--content">

<?php 

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

?>

	<h1><?php the_title(); ?></h1>


	<?php the_content(); ?>

<?php

		}

	}

?>

</div>

<?php

	Theme::loadModule('footer');

?>