<?php
/*Template Name: Front Page */
get_header();?>

<?php get_template_part( 'template/content', 'slider' )?>
	
		<!-- Wrap the rest of the page in another container to center all the content. -->
		<div class="container marketing">
			<!-- Three columns of text below the carousel -->
			<div class="row">
				<div class="col-lg-4">
                    
                <?php if( dynamic_sidebar( 'front_left' ));?>

				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
                    
                <?php if( dynamic_sidebar( 'front_middle' ));?>
                
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
                    
                <?php if( dynamic_sidebar( 'front_right' ));?>
                
				</div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            
            <hr class="featurette-divider">

			<!-- START THE FEATURETTES -->
            
            <?php if( have_posts() ): while(have_posts() ) : the_post(); ?>
            
            <?php the_content();?>

            <?php endwhile; else: ?>
            
            <?php _e('No content available to show');?>

        <?php endif;?>
            

            <?php get_footer()?>