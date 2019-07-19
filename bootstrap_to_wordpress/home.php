<?php get_header();?>

<div class="container">
    <div class="row">
        <div class="col-md-9">

        
<div class="page-header">
<h2><?php wp_title("");?></h2>
</div>

<?php if( have_posts() ): while(have_posts()): the_post();?>

<article>
    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2> 
    <p class="post_meta">
        by: <?php the_author_posts_link();?>
        on: <?php the_time('F j, Y')?>
        category:  <?php the_category(',');?>
        <a href="<?php comments_link();?>"><?php comments_number();?></a>
    </p>
    <hr>


<?php //the_content('Continue reading...');?>
<?php the_excerpt();?>

<a href="<?php the_permalink()?>"><?php the_post_thumbnail();?></a>

</article>


<?php endwhile;else: ?>

<h3>No content found</h3>

<?php endif;?> 

<nav class="post-pagination">
    <ul>
        <li class="float-left"><?php previous_posts_link('New Posts')?></li>
        <li class="float-right"><?php next_posts_link('Older Post')?></li>
    </ul>
</nav>


        </div>

        <?php get_sidebar( 'blog' )?>
   



<?php get_footer()?>