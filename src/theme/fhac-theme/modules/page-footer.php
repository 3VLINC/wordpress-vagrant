<?php namespace Theme; ?>

<footer class="page-footer">

	<div class="page-footer--content">

		<div class="page-footer--menus">
			
			<div class="page-footer--menu">
				
				<?php Theme::loadModule('main-menu', array('top_bar' => false)) ?>

			</div>

			<div class="page-footer--social-menu">

				<?php Theme::loadModule('social-menu'); ?>

			</div>

		</div>

		<div class="page-footer--contact">
			
			<div class="page-footer--extended-logo-area">
				
				<div class="page-footer--extended-logo">

					<span><?php echo get_bloginfo('title'); ?></span>

				</div>

			</div>

			<div class="page-footer--reach-out-area">

				<?php Theme::loadModule('reach-out'); ?>

			</div>

		</div>

		<div class="page-footer--credits">
			
			<div class="page-footer--credits--text">
				
				<p><?php echo get_field('copyright_notice', 'option'); ?>  |  Made in Toronto by <a href="http://ballyhoodesign.co" target="_blank">Ballyhoo Graphic Design</a></p>

			</div>

		</div>

	</div>

</footer>