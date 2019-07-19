<?php
/**Template Name: Full Width */
?>
<?php get_header();?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

<?php if( have_posts() ): while(have_posts()): the_post();?>
<h2><?php the_title();?></h2>

<?php the_content();?>

<?php endwhile;else: ?>

<h3>No content found</h3>

<?php endif;?>   
        </div>

    </div>
</div>
	

<?php get_footer()?>