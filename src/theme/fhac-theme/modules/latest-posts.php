<section class="latest-posts">

	<h1 class="latest-posts--title">Latest</h1>

	<?php 

		$query = new \WP_Query(array('posts_per_page' => 1));

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
				
				<h1 class="latest-posts--post--title"><a href="<?php the_permalink(); ?>">[BLOG] <?php the_title(); ?></a></h1>

				<div class="latest-posts--post--excerpt">
					
					<?php the_excerpt(); ?>

				</div>

				<a class="latest-posts--post--read-more" href="<?php the_permalink(); ?>"><span>Read more</span></a>

			</section>

		</li>

	<?php


			}

	?>

	</ul>

	<?php

		}

		wp_reset_postdata();

	?>

</section>