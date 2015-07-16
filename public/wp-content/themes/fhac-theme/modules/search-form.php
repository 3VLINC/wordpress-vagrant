<?php 

if(!isset($query)) $query = "";

?>

<form class="search-form" action="/" method="get">

	<div class="search-form--container">
	
		<input class="search-form--field" type="text" name="s" value="<?php echo $query; ?>" />

		<input type="hidden" name="post_type" value="post" />

		<button class="search-form--button" type="submit"><span>Search</span></button>

	</div>

</form>