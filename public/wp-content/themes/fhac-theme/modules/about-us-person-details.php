<?php namespace Theme; ?>

<?php if(!isset($id)) throw new \Exception('Missing ID'); ?>

<?php if(!isset($excerpt)) $excerpt = false ?>

<section class="about-us-person-details">
			
	<?php 
	
		if($image = get_sub_field('photo')) 
		{
			
			$image_content = sprintf(
				'<img class="about-us-person-details--photo" src="%s" width="%s" height="%s" />', 
				$image['sizes'][ImageSizes::SIZE_SQUARE],
				$image['sizes'][ImageSizes::SIZE_SQUARE.'-width'],
				$image['sizes'][ImageSizes::SIZE_SQUARE.'-height']
			);

			if($excerpt == true) {

				$image_content = sprintf('<a href="%s">%s</a>', '?field_name='.$field_name.'&id='.$id, $image_content);

			}

			printf(
				'<div class="about-us-person-details--photo-area">%s</div>',
					$image_content
				); 
			
		}

	?>

	<div class="about-us-person-details--content-area">

		<?php

			$name = array(get_sub_field('first_name'));
			if($last_name = get_sub_field('last_name')) $name[] = $last_name;

			$title_content = sprintf(implode(' ', $name));

			if($excerpt == true)
			{

				$title_content = sprintf(
					'<a href="%s">%s</a>', 
					'?field_name='.$field_name.'&id='.$id,
					$title_content
				);

			}

			printf('<h1 class="about-us-person-details--name">%s</h1>', $title_content);
			
			if(get_sub_field('credentials')) printf('<h2 class="about-us-person-details--credentials">%s</h2>', get_sub_field('credentials'));

			if($bio_content = get_sub_field('bio')) 
			{

				$read_more_link = '';

				if($excerpt == true) {
				
					$bio_content = apply_filters('trim_bio', $bio_content);
					
					$bio_content = sprintf(
						'%s <a class="about-us-person-details--read-more" href="%s"><span>Read More</span></a>',
						$bio_content, 
						'?field_name='.$field_name.'&id='.$id
					);

				}

				printf('<p class="about-us-person-details--bio">%s</p>', $bio_content); 

			}

		?>

	</div>

</section>