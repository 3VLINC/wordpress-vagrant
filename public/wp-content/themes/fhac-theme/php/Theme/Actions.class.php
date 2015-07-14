<?php 

namespace Theme;

class Actions
{

	public function __construct()
	{

		add_action('init', array($this, 'unregisterTaxonomies'));

	}

	public function unregisterTaxonomies()
	{
		
		register_taxonomy('post_tag', array());
		register_taxonomy('category', array());

	}

}

?>