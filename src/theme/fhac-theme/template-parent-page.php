<?php 

	namespace Theme;
	
	/* Template Name: Parent Page */

	get_header();

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			if(has_post_thumbnail()) {

				$id = get_post_thumbnail_id();

				$src = wp_get_attachment_image_src($id, ImageSizes::SIZE_BANNER);

				printf('<img class="parent-page--banner" src="%s" width="%s" height="%s">', $src[0],$src[1], $src[2]);

			}
			
			printf('<div class="parent-page--content">');

				printf('<h1 class="parent-page--title">%s</h1>', get_the_title());

				if($content = get_the_content())
				{

					printf('<div class="parent-page--entry">%s</div>', $content);

				}

				printf('<div class="parent-page--menu-area">%s</div>', Theme::loadModule('parent-page-menu', null, true));

				printf('<div class="parent-page--sections-area">%s</div>', Theme::loadModule('parent-page-sections', null, true));

			printf('</div>');

		}

	}

	get_footer();

?>