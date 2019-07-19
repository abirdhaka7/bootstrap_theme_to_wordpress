<?php
/**
 * Template Name: Portfolio Page
 * 
 */
?>
<?php get_header();?>

<div class="container portfolio-page">
    <div class="row">
        <div class="col-md-12">

            <?php if( have_posts() ): while(have_posts()): the_post();?>
            <h2><?php the_title();?></h2>

            <?php the_content();?>

            <?php endwhile;else: ?>

            <h3>No content found</h3>

            <?php endif;?>   

        </div>
        <?php $args= array( 'post_type' => 'portfolio');
            
            $portfolio = new WP_Query( $args );

            if( have_posts() ): while( $portfolio->have_posts()): $portfolio->the_post(); 

            $image_id  = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src( $image_id, 'medium', true );
         

        ?>

        <div class="col-md-4 col-sm-6 portfolio-item">

        <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo $image_url[0];?>" alt="<?php the_title();?>"></a>
     
        
        <h5 class="text-center"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>


        </div>

       
        <?php
         //this condition will add a  new row after 3 post
            $counter = $portfolio->current_post + 1;
            if( $counter % 3 == 0 ): 
        ?>

            </div><div class="row">

            <?php endif;?>



<?php endwhile; endif; ?>

</div>

    </div><!---/.container--->
	

<?php get_footer();?>