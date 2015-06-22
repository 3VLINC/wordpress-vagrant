<?php 

namespace Theme;

class AdvancedCustomFieldsConfiguration
{

	const HIDE_ACF_UI = false;

	public function __construct()
	{

		if(!function_exists("register_field_group")) return;
		
		if(self::HIDE_ACF_UI)
		{	
		
			define( 'ACF_LITE' , true );
		
		}

	}

}

?>
