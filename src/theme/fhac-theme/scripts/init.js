module.exports = function() {

	var $ = jQuery = require('jquery');

	require('foundation');
	
	require('foundation.topbar');

	require('matchHeight');

	$(document).ready(
		function() {
			
			$('.page-header > div').matchHeight();

			$('.page-main > div').matchHeight();

			$('html').removeClass('no-js').addClass('js');

			$(document).foundation();

		}
	);

}