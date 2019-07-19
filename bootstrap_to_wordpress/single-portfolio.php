<?php get_header();?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page_header_breadcrumb">
                <ul>
                    <li><a href="<?php bloginfo('url');?>">Home</a></li>
                    <li><a href="<?php bloginfo('url');?>/?p=131">Portfolio</a></li>
                    <li><a href=""><?php the_title();?></a></li>
                </ul>
          </div>
        </div>
        <div class="col-md-6">

        <div class="float-right">
           <?php next_post_link('<strong>%link</strong>', 'Next');?>
            <?php previous_post_link('<strong>%link</strong>', 'Back');?>
            </div>
        </div>
    </div><!----/.row--->
    <div class="row">
        <div class="col-md-9">
                <?php if( have_posts() ): while(have_posts()): the_post();

                $image_id  = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src( $image_id, 'medium', true );

                ?>
                <h2><?php the_title();?></h2>

                <img class="img-responsive" src="<?php echo $image_url[0];?>" alt="<?php the_title();?>">

                <?php the_content();?>

                <?php endwhile;else: ?>

                <h3>No content found</h3>

                <?php endif;?>   
        </div><!---/.col--->


        <div class="col-md-3">
            <?php 
            $clients_name  = get_post_meta( get_the_id(), 'clients_name',  true);
            $portfolio_url = get_post_meta( get_the_id(), 'portfolio_url', true);
            $skill_level   = get_post_meta( get_the_id(), 'skill_level',   true);

            ?>
            <h5>Project Name: <?php the_title();?></h5>

            <?php if( $clients_name ): ?>
            <p><strong>Clients Name:</strong> <?php echo $clients_name;?></p>
            <?php endif; ?>

            <?php if( $portfolio_url ): ?>
            <p><strong>Portfolio Url: </strong><a href="<?php echo $portfolio_url;?>" class="btn btn-success">Live Demo</a></p>
            <?php endif; ?>

            <?php if( $skill_level ): ?>
            <p><strong> Skill Level:</strong> <?php echo $skill_level;?></p>
            <?php endif; ?>

        </div>

    </div><!---/.row--->
</div><!---/.container-->
	

<?php get_footer()?>