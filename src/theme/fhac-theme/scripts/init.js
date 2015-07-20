module.exports = function() {

	var $ = jQuery = require('jquery');

	require('foundation');
	
	require('foundation.topbar');

	require('matchHeight');

	$(document).ready(
		function() {
			
			$('.page-header > div').matchHeight();

			$('.page-main > div').matchHeight();

			$('.contact--tools .contact--tools--module').matchHeight();

			$(document).foundation();

			$('[data-google-directions]').on(
				'submit',
				function(e)
				{

					var from = $(this).find('[data-google-directions-from]').val();

					var to = $(this).find('[data-google-directions-to]').val();

					window.location = 'https://maps.google.com?f=d&saddr='+encodeURIComponent(from) + '&daddr='+encodeURIComponent(to);
					
					e.preventDefault();

				}
			);

		}
	);

}