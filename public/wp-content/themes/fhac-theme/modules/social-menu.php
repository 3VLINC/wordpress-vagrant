<?php namespace Theme; ?>

<?php 

$networks = array();

$networks['facebook'] = array('name' => "Facebook", 'url' => get_field('facebook_url','option'));
$networks['twitter'] = array('name' => "Twitter", 'url' => get_field('twitter_url','option'));
$networks['plus'] = array('name' => "Google", 'url' => get_field('google_plus_url','option'));
$networks['feedly'] = array('name' => "Feedly", 'url' => get_field('feedly_url','option'));

foreach($networks as $handle => $info)
{

    if(!empty($info['url']))
    {

        $links[] = sprintf(
            '<li class="social-menu--network social-menu--network--%s"><a href="%s" target="_blank"><span>%s</span></a></li>',
            $handle,
            $info['url'],
            $info['name']
        );

    }

}

if(!empty($links)) {

?>

<div class="social-menu">

	<ul class="social-menu--container">
		
		<li class="social-menu--container--link">

			<a href="#"><span>Follow</span></a>
			
			<ul class="social-menu--networks" >

				<?php echo implode('', $links); ?>

			</ul>

		</li>

	</ul>

</div>

<?php

}

?>