<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="" name="description">
	<meta content="Mark Otto, Jacob Thornton, and Bootstrap contributors" name="author">
	<meta content="Jekyll v3.8.5" name="generator">
	<link href="<?php bloginfo('template_directory');?>/assets/img/favicon.ico" rel="icon">
	<title>
		<?php 
		
		wp_title( '&raquo;', true, 'right' );//this function will show the current selective page name with title
		bloginfo('name');
		?>
	</title>

	<style>
	     .bd-placeholder-img {
	       font-size: 1.125rem;
	       text-anchor: middle;
	       -webkit-user-select: none;
	       -moz-user-select: none;
	       -ms-user-select: none;
	       user-select: none;
	     }

	     @media (min-width: 768px) {
	       .bd-placeholder-img-lg {
	         font-size: 3.5rem;
	       }
	     }
	</style><!-- Custom styles for this template -->
    
    
    <?php wp_head();?>
</head>
<body <?php body_class();?>>

	<header>

	<?php  
//this function will check if there is a menu or no menu if menu is set then show a message
if( has_nav_menu( 'primary_menu' ) ){ ?>

		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		
		<button aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarCollapse" data-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>

			
		<a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a> 

	
			
<?php 
$args = array(
		'theme_location'  => 'primary_menu',
		'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
		'menu'			  => 'primary_menu',
		'container' 	  => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'navbarCollapse',
		'menu_id'		  => 'header_menu',
		'menu_class'	  => 'nav navbar-nav mr-auto',
		'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
		'walker'          => new WP_Bootstrap_Navwalker()

);


wp_nav_menu( $args);

?>

		</nav>

		
	<?php }else {
	echo "<h5 class='text-center text-danger'>Please Add primary menu</h5>";
} ?>
	
	</header>
	
 