<?php namespace Theme; ?>

<section class="blog-post blog-post--full">
	
	<h1 class="blog-post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

	<div class="blog-post--the-excerpt">

		<?php the_excerpt(); ?>
		
	</div>

	<?php 

		if($image = wp_get_attachment_image_src(get_post_thumbnail_id(), ImageSizes::SIZE_BANNER))
		{

			printf('<div class="blog-post--banner"><img src="%s" width="%s" height="%s" /></div>', $image[0], $image[1], $image[2]);

		}


	?>

	<div class="blog-post--the-content">

		<?php the_content(); ?>
		
		<div class="blog-post--tweet-this">
		
			<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><span>Tweet this</span></a>

		</div>

	</div>

	<div class="blog-post--meta">

		<span class="blog-post--author">

				<?php echo get_avatar(get_the_author_meta('email'), '45'); ?>

				<?php the_author(); ?>

		</span>
			
		<span class="blog-post--time"><?php echo get_the_date(); ?></span>

	</div>

</section>