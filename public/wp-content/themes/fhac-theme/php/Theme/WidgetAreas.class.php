<?php 

namespace Theme;

class WidgetAreas {

	const WA_SIDEBAR = 'sidebar';
	
	// const WA_BLOG = 'blog';

	// const WA_RECIPE = 'recipe';

	public function __construct()
	{
		
		add_action('widgets_init',array(get_class(),'register'),1,1);

	}

	public static function register()
	{
		
		$args = array(
			'name'          => 'Sidebar',
			'id'            => self::WA_SIDEBAR,
			'description'   => 'Sidebar widget area',
		    'class'         => '',
			'before_widget' => '<div id="%1$s" class="page-sidebar--widget %2$s"><div class="widget--wrapper"><section class="widget">',
			'after_widget'  => '</section></div></div>',
			'before_title'  => '<h1 class="page-sidebar--widget--title"><span>',
			'after_title'   => '</span></h1>' );
		
			register_sidebar( $args );
			
		// $args = array(
		// 	'name'          => 'Blog',
		// 	'id'            => self::WA_BLOG,
		// 	'description'   => 'Blog page widget area',
		//     'class'         => '',
		// 	'before_widget' => '<div id="%1$s" class="widget--container %2$s"><div class="widget--wrapper"><section class="widget">',
		// 	'after_widget'  => '</section></div></div>',
		// 	'before_title'  => '<h1 class="widget--title"><span>',
		// 	'after_title'   => '</span></h1>' );
		
		// 	register_sidebar( $args );	

		// $args = array(
		// 	'name'          => 'Recipe',
		// 	'id'            => self::WA_RECIPE,
		// 	'description'   => 'Recipe page widget area',
		//     'class'         => '',
		// 	'before_widget' => '<div id="%1$s" class="widget--container %2$s"><div class="widget--wrapper"><section class="widget">',
		// 	'after_widget'  => '</section></div></div>',
		// 	'before_title'  => '<h1 class="widget--title"><span>',
		// 	'after_title'   => '</span></h1>' );
		
		// 	register_sidebar( $args );		
		
	}

	public static function widgetArea($index)
	{
		
		if(is_active_sidebar($index ))
		{
			
			echo '<div class="widget-area">';

			dynamic_sidebar( $index );

			echo '</div>';

		}

	}

}

?>