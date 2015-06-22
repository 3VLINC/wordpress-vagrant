<?php 

namespace Theme;

class Filters
{

	public function __construct()
	{

		add_filter('trim_bio', array($this, 'trimBio'));

	}

	public function trimBio($input) {
		
		$length = 200;

		$ellipses = true;

		$strip_html = true;

	    //strip tags, if desired
	    if ($strip_html) {
	        $input = strip_tags($input);
	    }
	  
	    //no need to trim, already shorter than trim length
	    if (strlen($input) <= $length) {
	        return $input;
	    }
	  
	    //find last space within length
	    $last_space = strrpos(substr($input, 0, $length), ' ');
	    $trimmed_text = substr($input, 0, $last_space);
	  
	    //add ellipses (...)
	    if ($ellipses) {
	        $trimmed_text .= '...';
	    }
	  
	   

		return $trimmed_text;

	}

}

?>