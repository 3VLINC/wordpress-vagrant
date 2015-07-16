<?php
	
	namespace Theme; 

	Theme::loadModule('header');

?>

<div class="search--content">

<?php 

	printf('<h1 class="search--heading">Search results for "%s":</h1>', get_search_query());

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			Theme::loadModule('blog-post-excerpt');

		}

	}
	else
	{

		printf(
			'<div class="search--no-results">

				<p>Sorry, no posts were found that match that query. Please try again!</p>

			</div>'
		);
		

	}

?>

</div>

<?php

	Theme::loadModule('footer');

?>