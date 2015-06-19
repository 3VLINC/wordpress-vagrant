<?php namespace Theme; ?>

<?php if(!isset($top_bar)) $top_bar = false; ?>

<?php if($top_bar) { ?>

<nav class="top-bar" data-topbar role="navigation">
	            
	<ul class="title-area">

		<li class="name"><!-- Leave this empty --></li>
		
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>

	</ul>

	 <section class="top-bar-section">

<?php } ?>

<?php Menus::MainMenu($top_bar); ?>

<?php if($top_bar) { ?>

		</section>

</nav>
<?php } ?>