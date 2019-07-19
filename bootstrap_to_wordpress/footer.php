
				
	<?php if( is_front_page() ): ;?>

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactform">Request a quote
		</button>
	
	<?php endif;?>
				
		</div><!---/.row--->
	</div><!-- /.container -->

	<!-- FOOTER -->
		<footer class="container">

			<p class="float-right"><a href="#">Back to top</a></p>
			<p class="text-center">&copy; <?php echo date( 'Y' );?> <?php bloginfo( ' name' );?>  &middot;
			
			<?php
			wp_nav_menu('theme_location', 'footer_menu')
			?>


		</footer>
	</main>


	<!-- Modal -->
	<div class="modal fade" id="contactform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Contact Me</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<?php echo do_shortcode( '[contact-form-7 id="149" title="Contact form 1"]' )?>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		</div>
		</div>
	</div>
	</div>
		

    <?php wp_footer();?>
</body>
</html>