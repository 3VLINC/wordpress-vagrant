<?php namespace Theme; ?>

<div class="page-sidebar <?php echo $class; ?>">

	<div class="page-sidebar--module">
		
		<?php Theme::loadModule('search-form', array('query' => get_search_query())); ?>

	</div>

	<div class="page-sidebar--module">
		
		<?php Theme::loadModule('hours'); ?>

	</div>

	<div class="page-sidebar--module">
		
		<?php Theme::loadModule('latest-posts'); ?>

	</div>

	<?php WidgetAreas::widgetArea(WidgetAreas::WA_SIDEBAR); ?>

</div>