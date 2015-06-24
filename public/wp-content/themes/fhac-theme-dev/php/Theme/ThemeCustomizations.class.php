<?php

namespace Theme;

class ThemeCustomizations
{

	const S_SOCIAL = 'social-links';

	public function __construct()
	{

		add_action( 'customize_register', array(get_class(), 'register') );

	}

	public static function register( $wp_customize ) {

		$wp_customize->add_section(
			self::S_SOCIAL,
			array(
				'title' => 'Social Media Links',
				'description' => 'Set up the links for the social media icons in the footer',
				'priority' => 35
			)
		);

		foreach(Theme::getSocialMediaChannels() as $handle => $name)
		{

			$wp_customize->add_setting( $handle , 
				array(
					'default'     => 'http://',
					'sanitize_callback' => array(get_class(), 'filterPrependHttp')
				) 
			);

			$wp_customize->add_control(
				$handle,
				array(
					'label' => $name,
					'section' => self::S_SOCIAL,
					'type' => 'text'
				)
			);

		}

	}

	public static function filterPrependHttp($val)
	{

		if(empty($val)) return $val;
		
		return self::httpify($val);

	}

	public static function filterIntval($val)
	{
		return intval($val);
	}

	public static function httpify($link, $append = 'http://', $allowed = array('http://', 'https://'))
    {

        $found = false;
        
        foreach($allowed as $protocol)
        {
        
            if(strpos($link, $protocol) === 0)
            {
                
                return $link;

            }

        }

        return $append.$link;

    }

	

}

?>