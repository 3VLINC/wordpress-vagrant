<?php 

namespace Theme;

class Menus
{

    const MENU_MAIN = 'main-menu';

    // const MENU_TOOLS = 'tools-menu';

	public function __construct()
	{
		
		add_action( 'after_setup_theme', array(get_class(), 'registerMenus'));

  //       add_filter( 'wp_nav_menu_items', array(get_class(), 'CustomizeMainMenuItems'), 1, 2 );

	}

	public static function registerMenus()
	{

        register_nav_menus( 
            array(
                self::MENU_MAIN => 'Main Menu',
                // self::MENU_TOOLS => __('Tools Menu', 'aurora'),
                // self::MENU_MORE => __('More Menu', 'aurora')
            )
        );


	}

    public static function MainMenu($depth)
    {

        wp_nav_menu(
            array(
                'theme_location'  => self::MENU_MAIN,
                'depth'           => $depth,
                'fallback_cb' => false,
                'menu_class' => 'main-menu'
            )
        );

    }

    public static function ToolsMenu()
    {

        wp_nav_menu(
            array(
                'theme_location'  => self::MENU_TOOLS,
                'depth'           => 1,
                'fallback_cb' => false
            )
        );

    }

   

    public static function CustomizeMainMenuItems($items, $args)
    {        

        $new_items = '';

        if ($args->theme_location == self::MENU_MAIN) {

            $new_items .= '<li class="mobile-only">'.ThemeTranslation::languageSwitcherLink().'</li>';
            $new_items .= '<li class="mobile-only"><a href="'. home_url('find-a-store') .'">'. __('Find a Store', 'aurora').'</a></li>';

        }
    
        return $new_items.$items;

    }

}

?>