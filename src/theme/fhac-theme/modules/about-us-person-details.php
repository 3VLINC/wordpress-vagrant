<?php namespace Theme; ?>

<?php if(!isset($id)) throw new \Exception('Missing ID'); ?>

<section class="about-us-person-details">
			
	<?php 
	
		if($image = get_sub_field('photo')) 
			printf(
				'<a href="%s"><img class="about-us-person-details--photo" src="%s" width="%s" height="%s" /></a>',
				'?field_name='.$field_name.'&id='.$id,
				$image['sizes'][ImageSizes::SIZE_SQUARE],
				$image['sizes'][ImageSizes::SIZE_SQUARE.'-width'],
				$image['sizes'][ImageSizes::SIZE_SQUARE.'-height']); 

		printf(
			'<h1 class="about-us-person-details--name"><a href="%s">%s</a></h1>',
			'?field_name='.$field_name.'&id='.$id,
			sprintf('%s %s',get_sub_field('first_name'), get_sub_field('last_name'))
		);
		
		if(get_sub_field('credentials')) printf('<h2 class="about-us-person-details--credentials">%s</h2>', get_sub_field('credentials'));

		if($bio = get_sub_field('bio')) 
		{

			if($excerpt) {
			
				$bio = apply_filters('trim_bio', $bio);

			}

			printf('<p class="about-us-person-details--bio">%s</p>', $bio); 

		}

	?>

</section>