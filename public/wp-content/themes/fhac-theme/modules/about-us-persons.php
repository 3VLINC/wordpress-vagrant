<?php 

	namespace Theme;

	if(!isset($title)) $title = "";
	if(!isset($field_name)) throw new \Exception('Missing field name');
	if(!isset($plural_css_class)) $plural_css_class = "about-us--persons";

?>

<?php 

// check if the repeater field has rows of data
if( have_rows($field_name) ):

?>

<section class="about-us-persons">

	<h1 class="about-us-persons--title"><span><?php echo $title; ?></span></h1>

	<ul class="about-us-persons--list">

	<?php
		
		$id = 0;

	 	// loop through the rows of data
	    while ( have_rows($field_name) ) : the_row();

	    	$id++;

	?>

	<li class="about-us-persons--list--item">
			
		<?php 

			Theme::loadModule(
				'about-us-person-details',
				array(
					'field_name' => $field_name,
					'id' => $id,
					'excerpt' => true
				)
			);

		?>

	</li>
 
	<?php
       

    	endwhile;

    ?>

	</ul>

</section>

<?php


endif;

?>