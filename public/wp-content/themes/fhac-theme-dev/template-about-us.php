<?php /* Template Name: About Us */ ?>
<?php
	
	namespace Theme; 

	get_header();

?>	

<div class="about-us--content">

<?php 

	if(have_posts()) { 

		while(have_posts()) {

			the_post();

			the_content();

		}

	}

?>

</div>


<?php 

// check if the repeater field has rows of data
if( have_rows('doctors') ):

?>

<section class="about-us--doctors">

	<h1 class="about-us--doctors--title"><span>Our Doctors</span></h1>

	<ul class="about-us--doctors--list">

	<?php

	 	// loop through the rows of data
	    while ( have_rows('doctors') ) : the_row();

	?>

	<li class="about-us--doctors--list--item">
		
		<section class="about-us--doctor">
			
			<?php if($image = get_sub_field('photo')) printf('<img class="about-us--doctor--photo" src="%s" width="%s" height="%s" />', $image['sizes'][ImageSizes::SIZE_SQUARE], $image['sizes'][ImageSizes::SIZE_SQUARE.'-width'], $image['sizes'][ImageSizes::SIZE_SQUARE.'-height']); ?>
			
			<h1 class="about-us--doctor--name"><?php printf('%s %s',get_sub_field('first_name'), get_sub_field('last_name')); ?></h1>
			
			<?php if(get_sub_field('credentials')) printf('<h2 class="about-us--doctor--credentials">%s</h2>', get_sub_field('credentials')); ?>

			<?php if(get_sub_field('bio')) printf('<p class="about-us--doctor--bio">%s</p>', get_sub_field('bio')); ?>
		
		</section>

	</li>
 
	<?php
       

    	endwhile;

    ?>

	</ul>

</section>

<?php


endif;

?>

<?php 

// check if the repeater field has rows of data
if( have_rows('technicians') ):

?>

<section class="about-us--technicians">

	<h1 class="about-us--technicians--title"><span>Our Registered Veterinary Technicians</span></h1>

	<ul class="about-us--technicians--list">

	<?php

	 	// loop through the rows of data
	    while ( have_rows('technicians') ) : the_row();

	?>

	<li class="about-us--technicians--list--item">
		
		<section class="about-us--technician">
			
			<?php if($image = get_sub_field('photo')) printf('<img class="about-us--technician--photo" src="%s" width="%s" height="%s" />', $image['sizes'][ImageSizes::SIZE_SQUARE], $image['sizes'][ImageSizes::SIZE_SQUARE.'-width'], $image['sizes'][ImageSizes::SIZE_SQUARE.'-height']); ?>
			
			<h1 class="about-us--technician--name"><?php printf('%s %s',get_sub_field('first_name'), get_sub_field('last_name')); ?></h1>
			
			<?php if(get_sub_field('credentials')) printf('<h2 class="about-us--technician--credentials">%s</h2>', get_sub_field('credentials')); ?>

			<?php if(get_sub_field('bio')) printf('<p class="about-us--technician--bio">%s</p>', get_sub_field('bio')); ?>
		
		</section>

	</li>
 
	<?php
       

    	endwhile;

    ?>

	</ul>

</section>

<?php


endif;

?>

<?php 

// check if the repeater field has rows of data
if( have_rows('support_team') ):

?>

<section class="about-us--support-team">

	<h1 class="about-us--support-team--title"><span>Our Support Team</span></h1>

	<ul class="about-us--support-team--list">

	<?php

	 	// loop through the rows of data
	    while ( have_rows('support_team') ) : the_row();

	?>

	<li class="about-us--support-team--list--item">
		
		<section class="about-us--support-team-member">
			
			<?php if($image = get_sub_field('photo')) printf('<img class="about-us--support-team-member--photo" src="%s" width="%s" height="%s" />', $image['sizes'][ImageSizes::SIZE_SQUARE], $image['sizes'][ImageSizes::SIZE_SQUARE.'-width'], $image['sizes'][ImageSizes::SIZE_SQUARE.'-height']); ?>
			
			<h1 class="about-us--support-team-member--name"><?php printf('%s %s',get_sub_field('first_name'), get_sub_field('last_name')); ?></h1>
			
			<?php if(get_sub_field('credentials')) printf('<h2 class="about-us--support-team-member--credentials">%s</h2>', get_sub_field('credentials')); ?>

			<?php if(get_sub_field('bio')) printf('<p class="about-us--support-team-member--bio">%s</p>', get_sub_field('bio')); ?>
		
		</section>

	</li>
 
	<?php
       

    	endwhile;

    ?>

	</ul>

</section>

<?php


endif;

?>

<?php

	get_footer();

?>