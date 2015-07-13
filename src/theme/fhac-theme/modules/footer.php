<?php 

	namespace Theme; 

	if(!isset($hide_sidebar)) $hide_sidebar = false; 

?>				

			</div>

			<?php if(!$hide_sidebar) Theme::loadModule('page-sidebar', array('class' => 'equalize')); ?>

		</main>
			
		<?php Theme::loadModule('page-footer'); ?>

		<?php wp_footer(); ?>

	</body>
	
</html>