module.exports = function() {

	var $ = require('jquery');

	require('matchHeight');

	$(document).ready(
		function() {
			
			$('.page-header > div').matchHeight();

			$('.page-main > div').matchHeight();

			$('html').removeClass('no-js').addClass('js');

			$('[data-menu-toggle]').on(
				'click',
				function(e) {
					
					var menu_id = $(this).data('menu-toggle');

					$('#'+menu_id).toggleClass('menu--active');

					e.preventDefault();

				}
			);

		}
	);

}