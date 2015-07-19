<?php namespace Theme; ?>

<?php if(!isset($field_name)) throw new \Exception('Missing Field Name'); ?>
<?php if(!isset($id)) throw new \Exception('Missing ID'); ?>
<?php if(!isset($the_id)) $the_id = false; ?>

<?php 

// check if the repeater field has rows of data
if( have_rows($field_name) ):

?>

<div class="about-us-person">

	<?php
			
		$the_id = 0;

	 	// loop through the rows of data
	    while ( have_rows($field_name) ) : the_row();

	    	$the_id++;

	    	if($the_id !== false && $the_id != $id) continue;

	    	Theme::loadModule(
	    		'about-us-person-details',
	    		array(
	    			'field_name' => $field_name,
	    			'id' => $id,
	    			'excerpt' => false
	    		)
	    	);
	   

		endwhile;

	?>

</div>

<?php

endif;

?>