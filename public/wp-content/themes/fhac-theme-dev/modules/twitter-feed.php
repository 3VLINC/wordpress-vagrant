<?php 

if($twitter_widget_code = get_field('twitter_widget_code', 'option')) {

	printf('<div class="twitter-feed">%s</div>', $twitter_widget_code);

}

?>