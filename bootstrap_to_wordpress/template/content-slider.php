<main role="main">
		<div class="carousel slide" data-ride="carousel" id="myCarousel">
			
			<?php

			$args = array( 'post_type' => 'slider' );

			$slider_gallery = new WP_Query( ${args} );
			?>


			<ol class="carousel-indicators">

			<?php

			if( have_posts() ): while( $slider_gallery->have_posts() ): $slider_gallery->the_post();

			?>
			
			<li <?php if( $slider_gallery->current_post == 0 ): ?>class="active"<?php endif;?>  data-slide-to="<?php echo $slider_gallery->current_post;?>" data-target="#myCarousel"></li>


			<?php endwhile; endif;?>

			</ol>

			<!-- // if you have a one post query and based on it run a loop more then twice in a page then you should use this function between those loop // -->
			<?php rewind_posts();?>


			<div class="carousel-inner">

				<?php

				if( have_posts() ): while( $slider_gallery->have_posts() ): $slider_gallery->the_post();

					$image_id  = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src( $image_id, 'large', true );
					$image_alt_tag = get_post_meta($image_id, '_wp_attachment_image_alt', true);


				?>


				<div class="carousel-item <?php if( $slider_gallery->current_post == 0 ): ?>active<?php endif;?>">
					
			
					<img src="<?php echo $image_url[0];?>" height="100%" width="100%" alt="<?php echo $image_alt_tag;?>">

					<div class="container">
						<div class="carousel-caption">
							<h1><?php the_title();?></h1>
							<p><?php the_content();?></p>
							<p>
								<a class="btn btn-lg btn-primary" href="<?php the_field('button_url');?>" role="button"><?php the_field('button_text');?></a>
							</p>
						</div>
					</div>
				</div>

<?php endwhile; endif;?>

			</div><a class="carousel-control-prev" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#myCarousel" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>

		</div>