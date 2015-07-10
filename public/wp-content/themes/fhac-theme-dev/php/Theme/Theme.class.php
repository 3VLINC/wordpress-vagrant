<?php 

namespace Theme;

class Theme {

	const HIDE_ADMIN_BAR = false;

	public function __construct()
	{

		new Actions();
		new Filters();
		new Menus();
		new WidgetAreas();
		new ThemeCustomizations();
		new AdvancedCustomFieldsConfiguration();
		new Accessibility();
		new ImageSizes();

		// Remove the default WordPress inline gallery styles
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_action('wp_enqueue_scripts', array(get_class(), 'enqueueScripts'));

		add_action('wp_enqueue_scripts', array(get_class(), 'enqueueStyles'));

		add_filter('body_class', array(get_class(),'addCustomBodyClasses'));
		
		add_action('init', array(get_class(), 'setupFeaturedImages'));

		if(true === self::HIDE_ADMIN_BAR)
		{
			
			add_filter( 'show_admin_bar', '__return_false' );

		}

	}

	public static function enqueueScripts()
	{

		wp_register_script('theme', self::getResourceUrl('scripts/theme-min.js'), array('jquery'),'1.0.0', true);

		wp_enqueue_script('theme');	
		
	}

	public static function enqueueStyles()
	{

		wp_enqueue_style( 'theme', self::getResourceUrl('styles/theme-min.css'), false, '1.0', 'all' );

	}

	public static function addHTMLClasses()
	{
		
		$classes = apply_filters('theme_html_class', array());

		return implode(' ', $classes);

	}

	public static function getResourceUrl($resource) {

		$resource = ltrim($resource, '/');

		$resource = '/'.$resource;

		return get_stylesheet_directory_uri().$resource;

	}

	public static function getResourcePath($resource) {

		$resource = ltrim($resource, '/');
		
		$resource = '/'.$resource;

		return get_stylesheet_directory().$resource;

	}

	public static function getSocialMediaChannels()
	{
		
		return array(

			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'plus' => 'Google',
			'feedly' => 'Feedly'
			
		);

	}

	public static function addCustomBodyClasses($classes)
	{
		
		return $classes;

	}
	
	public static function setupFeaturedImages() {
		
		add_theme_support( 'post-thumbnails' ); 
		
	}

	public static function loadModule($module_name, $args = null, $return = false) {

		if(isset($args) && is_array($args))
		{
		
			extract($args);

		}

		if($return) {

			ob_start();

		}

		require(get_template_directory().'/modules/'.$module_name.'.php');

		if($return) {

			$html = ob_get_contents();

			ob_end_clean();

			return $html;

		}

	}

}

?>