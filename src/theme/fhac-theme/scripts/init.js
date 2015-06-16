module.exports = function() {

	var $ = require('jquery');

	require('matchHeight');

	$(document).ready(
		function() {
			
			$('.page-header > div').matchHeight();

			$('.page-main > div').matchHeight();

		}
	);

}