<?php 

namespace Theme;

class ImageSizes
{

	// const SIZE_SEARCH = 'search';
	// const SIZE_ARCHIVE = 'archive';
	// const SIZE_BANNER = 'banner';
	// const SIZE_SQUARE = 'square';

	public function __construct() {

		add_action('init', array(get_class(), 'registerImageSizes'));

	}

	public static function registerImageSizes() {

		// add_image_size( self::SIZE_SEARCH, 375, 225, true );
		
		// add_image_size( self::SIZE_ARCHIVE, 780, 350, true );

		// add_image_size( self::SIZE_BANNER, 1920, 600, true );

		// add_image_size( self::SIZE_SQUARE, 600, 600, true );

	}

}

?>