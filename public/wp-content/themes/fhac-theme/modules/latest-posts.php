<section class="latest-posts">

	<h1 class="latest-posts--title">Latest</h1>

	<?php 

		$query = new \WP_Query(
			array(
				'posts_per_page' => 1,
				'orderby' => 'date',
				'order'   => 'DESC'
			)
		);

		if($query->have_posts())
		{

	?>
	
	<ul class="latest-posts--list">

	<?php
			while($query->have_posts())
			{


				$query->the_post();

	?>

		<li class="latest-posts--post">
			
			<section>
				
				<h1 class="latest-posts--post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<div class="latest-posts--post--excerpt">
					
					<?php the_excerpt(); ?>

				</div>

				<div class="latest-posts--post--read-more">
				
					<a href="<?php the_permalink(); ?>"><span>Read more</span></a>

				</div>

			</section>

		</li>

	<?php


			}

	?>

	</ul>

	<?php

		}

		wp_reset_postdata();

		wp_reset_query();

	?>

</section>