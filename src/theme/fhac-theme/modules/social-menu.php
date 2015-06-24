<?php namespace Theme; ?>

<?php 

foreach(Theme::getSocialMediaChannels() as $handle => $name)
{

    $url = get_theme_mod($handle);

    if(!empty($url))
    {

        $links[] = sprintf(
            '<li class="social-menu--network social-menu--network--%s"><a href="%s"><span>%s</span></a></li>',
            $handle,
            get_theme_mod($handle),
            $name
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